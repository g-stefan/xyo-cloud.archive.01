<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_mod_ds_User";

class xyo_mod_ds_user_Info {

	public $id;
	public $name;
	public $username;
	public $password;
	public $session;
	public $rnd;
	public $language;
	public $authorizedBy;
	public $captcha;
	public $key;

}

class xyo_mod_ds_User extends xyo_Module {

	var $info;
	//
	//
	var $modAcl;
	//
	var $dsUser;
	var $dsLanguage;
	//
	var $mode;
	var $doCheck;
	var $useAction;
	var $useCaptcha;
	var $authorized;
	//
	var $isInGroupCache;
	var $excludeModuleFromAction_;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->info = new xyo_mod_ds_user_Info();

		$this->useAction = 1*$this->cloud->get("user_action", false);
		$this->useCaptcha= 1*$this->cloud->get("user_captcha", false);

		$this->mode = false;
		$this->doCheck = false;
		$this->info->id = 0;

		$this->info->authorizedBy = "none";
		$this->authorized = false;

		$this->modAcl = &$this->cloud->getModule("xyo-mod-ds-acl");

		$this->reloadDataSource();

		$this->isInGroupCache = array();

		$this->excludeModuleFromAction_=array();
		if ($this->isBase("xyo_mod_ds_User")) {
			$this->includeConfig($this->name);
		};

		$this->doLogin();
		$this->generateAutoCookie();

	}

	function reloadDataSource() {
		$this->dsUser = &$this->getDataSource("db.table.xyo_user");
		$this->dsLanguage = &$this->getDataSource("db.table.xyo_language");
		$this->dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");	
	}

	function updateSysAcl() {
		$this->modAcl->setAclSysUserId($this->info->id);
	}

	function excludeModuleFromAction($name,$flag_=true) {
		if($flag_) {
			$this->excludeModuleFromAction_[$name]=$flag_;
		} else {
			if(array_key_exists($name,$this->excludeModuleFromAction_)) {
				unset($this->excludeModuleFromAction_[$name]);
			};
		};
	}	

	function tryAuthorize() {

		$this->info->id = 0;
		$this->info->name = "Guest";
		$this->info->username = "guest";
		$this->info->password = null;
		$this->info->session = null;
		$this->info->rnd = null;
		$this->info->language = null;
		$this->info->authorizedBy = null;
		$this->info->captcha=null;
		$this->info->key=null;

		$this->authorized = false;

		$authorization = $this->cloud->getRequest("user_authorization");
		if ($authorization) {
			if ($authorization === "true") {
				$authorization = false;

				$username = $this->cloud->getRequest("user_username");
				$password = $this->cloud->getRequest("user_password");
				$rnd = $this->cloud->getRequest("user_rnd");

				if($this->useCaptcha) {
					$captcha = $this->cloud->getRequest("user_captcha");
				} else {
					$captcha = true;
				};

				if ($password) {
					$algorithmX="hash:";
					if (strncmp($password, $algorithmX, strlen($algorithmX)) == 0) {
						$password = substr($password, strlen($algorithmX));
					}else{
						return false;
					};
				};

				if ($username && $password && $rnd && $captcha) {

					$this->info->username = $username;
					$this->info->password = $password;
					$this->info->rnd = $rnd;
					if($this->useCaptcha) {
						$this->info->captcha = $captcha;
					} else {
						$this->info->captcha = null;
					};

					$this->authorized = $this->performUserCheckLogin();
				};
			};
		};
		if ($this->authorized) {
			return true;
		};

		if (!$authorization) {
			$id = $this->cloud->getRequest("user_id");
			if ($id) {
				$key = $this->cloud->getRequest("user_key");
				if ($key) {
					$session = $this->cloud->getRequest("user_session");
					if ($session) {
						$rnd = $this->cloud->getRequest("user_rnd");
						if ($rnd) {
							$this->info->id = $id;
							$this->info->key = $key;
							$this->info->session = $session;
							$this->info->rnd = $rnd;
							$this->authorized = $this->performUserCheckSession();
						};
					};
				};
			};
		};

		if(!$this->authorized){
			$this->info->id = 0;
			$this->info->name = "Guest";
			$this->info->username = "guest";
			$this->info->password = null;
			$this->info->session = null;
			$this->info->rnd = null;
			$this->info->language = null;
			$this->info->authorizedBy = null;
			$this->info->captcha=null;
			$this->info->key=null;
			$this->updateSysAcl();
		};

		return $this->authorized;
	}

	function getPasswordHash($username,$password,$rnd){
		if(is_null($rnd)){
			$rnd = hash("sha512",date("Y-m-d H:i:s")." - ".rand(),false);
		};

		// sha256[salt].sha512[sha256[salt].sha512[password]]
		$pwd = explode(":", $password);
		if ($pwd[0] === "hash") {
			return $pwd[1];
		};
		if ($pwd[0] === "reco") {
			$key=hash("sha512",hash("sha512",strtolower($username),true).hash("sha512",$this->cloud->get("user_reco_salt","unknown"),false),false);
			$salt=hash("sha256",$rnd,false);
			return $salt.".".hash("sha512",$salt.hash("sha512",$this->recoDecode($pwd[1], pack("H*", $key))),false);
		};
		if ($pwd[0] === "plain") {
			$salt=hash("sha256",$rnd,false);
			return $salt.".".hash("sha512",$salt.hash("sha512",$pwd[1]),false);
		};
	
		return "";	
	}

	function setPasswordHash($username,$passwordPlain,$mode){

		if($mode === "hash"){
			$salt=hash("sha256",date("Y-m-d H:i:s")." - ".rand(),false);
			return "hash:".$salt.".".hash("sha512",$salt.hash("sha512",$passwordPlain),false);
		};
		if($mode === "reco"){
			$key=hash("sha512",hash("sha512",strtolower($username),true).hash("sha512",$this->cloud->get("user_reco_salt","unknown"),false),false);
			return "reco:".$this->recoEncode($passwordPlain, pack("H*", $key));
		};
		if($mode === "plain"){
			return "plain:".$passwordPlain;
		};

		return "";
	}

	function changePasswordHashUsername($usernameNew,$usernameOld,$password,$mode){
		$pwd = explode(":", $password);
		if($mode === "reco"){
			if($pwd[0] === "reco"){
				$key=hash("sha512",hash("sha512",strtolower($usernameOld),true).hash("sha512",$this->cloud->get("user_reco_salt","unknown"),false),false);
				$passwordPlain=$this->recoDecode($pwd[1], pack("H*", $key));
				$key=hash("sha512",hash("sha512",strtolower($usernameNew),true).hash("sha512",$this->cloud->get("user_reco_salt","unknown"),false),false);
				return "reco:".$this->recoEncode($passwordPlain, pack("H*", $key));
			};
		};
		return $password;
	}

	function recoDecodePassword($username,$password,$mode){
		$pwd = explode(":", $password);
		if($mode === "reco"){
			if($pwd[0] === "reco"){
				$key=hash("sha512",hash("sha512",strtolower($username),true).hash("sha512",$this->cloud->get("user_reco_salt","unknown"),false),false);
				return $this->recoDecode($pwd[1], pack("H*", $key));
			};
		};
		return "";
	}

	function hex2x($hex){
		$retV=array();
		for ($i = 0; $i < strlen($hex); $i += 2){
        		array_push($retV,hexdec(substr($hex,$i, 2)));
		};
		return $retV;		
	}

	function zeroPad($x){
		if(strlen($x)<2){
			return "0".$x;
		};
		return $x;
	}

	function x2hex($x) {
		$retV = array();
		for ($i = 0; $i < count($x); ++$i) {
			array_push($retV,$this->zeroPad(dechex($x[$i])));
		};
		return implode("",$retV);
	}

	function x2xor($x,$y,$z){
		$retV = array();
		for ($i = 0; $i < count($x); ++$i) {
			array_push($retV,$x[$i]^$y[$i]^$z[$i]);
		};
		return $retV;
	}

	function x2combo($x,$y,$z){
		if(strlen($x)!=strlen($y)){
			return "";
		};
		if(strlen($x)!=strlen($z)){
			return "";
		};
		return $this->x2hex($this->x2xor($this->hex2x($x),$this->hex2x($y),$this->hex2x($z)));
	}

	function performUserCheckLogin() {
		$this->authorized = false;

		if (!$this->dsUser) {
			return false;
		};

		$this->dsUser->clear();
		$this->dsUser->enabled = 1;

		$this->dsUser->username = $this->info->username;

		if ($this->dsUser->load(0, 1)) {
			// check credentials			               

			$password=$this->getPasswordHash($this->dsUser->username,$this->dsUser->password,$this->info->rnd);
			if(strlen($password)==0){
				return false;
			};
			$passwordX=explode(".",$password);

			$inputPassword = $this->info->password;
			        
			$checkPasword = $this->x2combo(hash("sha512",strtolower($this->dsUser->username).".".$this->info->rnd,false),$inputPassword,$this->info->rnd);
			if(strlen($checkPasword)==0){
				return false;
			};
			$checkPasword = $passwordX[0].".".hash("sha512",$passwordX[0].$checkPasword,false);

			// check system generated authorization (password is sha512[passowordHash])
			$checkPasword2X = $this->x2combo(hash("sha512",strtolower($this->dsUser->username).".".$this->info->rnd,false),$this->info->password,$this->info->rnd);

			if(strlen($checkPasword2X)==0){
				return false;
			};
			$checkPasword2Y = hash("sha512",$password,false);

			$captchaOk=false;
			if($this->useCaptcha) {
				$captchaKey=hash("sha512",$this->info->rnd.hash("sha512",$this->info->captcha,false),false);
				if(isset($_SESSION["user_captcha_key"])) {
					if($captchaKey===$_SESSION["user_captcha_key"]) {
						$captchaOk=true;
					};
				};

				//
				// Check service key
				//
				if(!$captchaOk){
					$serviceKey=hash("sha512",$this->info->rnd.hash("sha512",$this->cloud->get("service_key","unknown"),false),false);
					$captcha = $this->cloud->getRequest("user_captcha");
					if(strlen($captcha)>0){
						if(strcmp($captcha,$serviceKey)==0){
							$captchaOk=true;
						};
					};
				};

			} else {
				$captchaOk=true;
			}

			if (((strcmp($password,$checkPasword)==0)||(strcmp($checkPasword2X,$checkPasword2Y)==0))&&($captchaOk)) {

				$this->info->id = $this->dsUser->id;
				$this->info->username = $this->dsUser->username;
				$this->info->name = $this->dsUser->name;
				$this->info->authorizedBy = "datasource";
				// key is allways system authorized => password = sha512[passowordHash]
				$this->info->key = $this->x2combo(hash("sha512",strtolower($this->dsUser->username).".".$this->info->rnd,false),$checkPasword2Y,$this->info->rnd);
				if(strlen($this->dsUser->session)==0){
					$this->dsUser->session=hash("sha512",$this->info->key,false);
				};
				$this->info->session = $this->dsUser->session;

				$this->language = null;
				$dsLanguage = &$this->dsLanguage->copyThis();
				if ($dsLanguage) {
					$dsLanguage->id = $this->dsUser->id_xyo_language;
					$dsLanguage->enabled = 1;
					if ($dsLanguage->load(0, 1)) {
						$this->info->language = $dsLanguage->name;
					};
				};
			
				unset($_SESSION["user_captcha_force"]);
				//
				// allow secondary requests (from services)
				// that will not unauthorize current session 
				//
				if(!$this->cloud->getRequest("user_service",0)){
					$this->dsUser->logged_on = "NOW";
					$this->dsUser->logged_in = 1;
					$this->dsUser->action_on = "NOW";
					$this->dsUser->action = 1;
					$this->dsUser->save();
					return true;
				}
			}
		}
		return false;
	}

	function performUserCheckSession() {
		$this->authorized = false;

		if (!$this->dsUser) {
			return false;
		};

		$this->dsUser->clear();
		$this->dsUser->id = $this->info->id;
		$this->dsUser->session = $this->info->session;
		$this->dsUser->enabled = 1;
		$this->dsUser->logged_in = 1;

		if ($this->dsUser->load(0, 1)) {
			// check credentials

			$password=$this->getPasswordHash($this->dsUser->username,$this->dsUser->password,$this->info->rnd);
			if(strlen($password)==0){
				return false;
			};

			// key is allways system authorized => password = sha512[passowordHash]
			$checkPasword2X = $this->x2combo(hash("sha512",strtolower($this->dsUser->username).".".$this->info->rnd,false),$this->info->key,$this->info->rnd);
			if(strlen($checkPasword2X)==0){
				return false;
			};
			$checkPasword2Y = hash("sha512",$password,false);

			if (strcmp($checkPasword2X,$checkPasword2Y)==0) {

				$this->info->id = $this->dsUser->id;
				$this->info->username = $this->dsUser->username;
				$this->info->name = $this->dsUser->name;
				$this->info->authorizedBy = "datasource";

				$this->language = null;
				$dsLanguage = &$this->dsLanguage->copyThis();
				if ($dsLanguage) {
					$dsLanguage->id = $this->dsUser->id_xyo_language;
					$dsLanguage->enabled = 1;
					if ($dsLanguage->load(0, 1)) {
						$this->info->language = $dsLanguage->name;
					};
				};
			
				unset($_SESSION["user_captcha_force"]);

				if ($this->useAction) {

					$do_=true;
					$module_=$this->cloud->getModuleNameFromRequest();
					if($module_) {
						if(array_key_exists($module_,$this->excludeModuleFromAction_)) {
							$do_=false;
						};
					};

					if($do_) {
						$this->authorized=true;
					        $this->updateAction();
					};

				};
				return true;
			};
		};
		return false;
	}

	function doReset(){
		$this->info->id = 0;
		$this->info->name = "Guest";
		$this->info->username = "guest";
		$this->info->password = null;
		$this->info->session = null;
		$this->info->rnd = null;
		$this->info->language = null;
		$this->info->authorizedBy = null;
		$this->info->captcha = null;
		$this->info->key = null;

		$this->authorized = false;

		if ($this->cloud->isRequest("user_authorization")) {
			$this->cloud->setRequest("user_authorization", null);
		};
		if ($this->cloud->isRequest("user_username")) {
			$this->cloud->setRequest("user_username", null);
		};
		if ($this->cloud->isRequest("user_password")) {
			$this->cloud->setRequest("user_password", null);
		};
		if ($this->cloud->isRequest("user_rnd")) {
			$this->cloud->setRequest("user_rnd", null);
		};
		if ($this->cloud->isRequest("user_session")) {
			$this->cloud->setRequest("user_session", null);
		};
		if ($this->cloud->isRequest("user_id")) {
			$this->cloud->setRequest("user_id", null);
		};
		if ($this->cloud->isRequest("user_key")) {
			$this->cloud->setRequest("user_key", null);
		};

		if($this->useCaptcha) {
			if ($this->cloud->isRequest("user_captcha")) {
				$this->cloud->setRequest("user_captcha", null);
			};

			$_SESSION["user_captcha_rnd"]="";
			$_SESSION["user_captcha_key"]="";
		};

		$this->updateSysAcl();
	}

	function doLogin() {
		$this->tryAuthorize();
		$this->updateSysAcl();
	}

	function doLogout() {

		if($this->authorized) {
			if($this->info->id) {
				$this->dsUser->clear();
				$this->dsUser->id = $this->info->id;
				if ($this->dsUser->load(0, 1)) {
					$this->dsUser->action_on = "NOW";
					$this->dsUser->action = 0;
					$this->dsUser->logged_in = 0;
					$this->dsUser->session = hash("sha512",date("Y-m-d H:i:s")." - ".rand().".".$this->dsUser->session,false);
					$this->dsUser->save();
				}
			}
		}

		$this->doReset();

	}

	function getAuthorizationRequestDirect($user=null) {
		if (!$this->dsUser) {
			return null;
		};
		if (!$this->info->id) {
			if (!$user) {
				return null;
			};
		};
		$this->dsUser->clear();
		if ($user) {
			$this->dsUser->username = $user;
		} else {
			$this->dsUser->id = $this->info->id;
		};
		$this->dsUser->enabled = 1;
		if ($this->dsUser->load(0, 1)) {

			$rnd = hash("sha512",date("Y-m-d H:i:s")." - ".rand(),false);
			$password = $this->getPasswordHash($this->dsUser->username,$this->dsUser->password,$rnd);
			if(strlen($password)==0){
				return null;
			};
			$password = hash("sha512",$password,false);
			$passwordHash = $this->x2combo(hash("sha512",strtolower($this->dsUser->username).".".$rnd,false),$password,$rnd);
			if(strlen($passwordHash)==0){
				return null;
			};

			if($this->useCaptcha) {
				$captcha=hash("sha512",date("Y-m-d H:i:s")." - ".rand(),false);
				$_SESSION["user_captcha_rnd"]=$rnd;
				$_SESSION["user_captcha_key"]=hash("sha512",$rnd.hash("sha512",$captcha,false),false);
				
				return array(
					       "user_username" => $this->dsUser->username,
					       "user_password" => "hash:".$passwordHash,
					       "user_rnd" => $rnd,
					       "user_authorization" => "true",
					       "user_captcha"=>$captcha
				       );
			};
			return array(
				       "user_username" => $this->dsUser->username,
				       "user_password" => "hash:".$passwordHash,
				       "user_rnd" => $rnd,
				       "user_authorization" => "true"
			       );
		};
		return null;
	}

	function makeCookie() {
		if ($this->authorized) {
			setcookie("user_id", $this->info->id);
			setcookie("user_session", $this->info->session);
			setcookie("user_rnd", $this->info->rnd);
			setcookie("user_key", $this->info->key);
			return true;
		};
		return false;
	}

	function makeResetCookie() {
		setcookie("user_id", "", mktime(0, 0, 1, 1, 1, 1970));
		setcookie("user_session", "", mktime(0, 0, 1, 1, 1, 1970));
		setcookie("user_rnd", "", mktime(0, 0, 1, 1, 1, 1970));
		setcookie("user_key", "", mktime(0, 0, 1, 1, 1, 1970));
	}

	function generateAutoCookie() {
		$authorization = $this->cloud->getRequest("user_authorization");
		if ($authorization) {
			if ($authorization === "true") {
				if (!$this->makeCookie()) {
					$this->makeResetCookie();
				};
			}
		}
	}

	function jsMakeScript() {
		if ($this->authorized) {
			return "document.cookie=\"user_id=\"+escape(\"" . $this->info->id . "\")+\";\";".
			"document.cookie=\"user_session=\"+escape(\"" . $this->info->session . "\")+\";\";".
			"document.cookie=\"user_rnd=\"+escape(\"" . $this->info->rnd . "\")+\";\";".
			"document.cookie=\"user_key=\"+escape(\"" . $this->info->key . "\")+\";\";";
		}
		return null;
	}

	function jsMakeResetScript() {
		return "document.cookie=\"user_id=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";".
		"document.cookie=\"user_session=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";".
		"document.cookie=\"user_rnd=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";".
		"document.cookie=\"user_key=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";";
	}

	function setSessionScript() {
		$script=$this->jsMakeScript();
		if (is_null($script)) {
			$script=$this->jsMakeResetScript();
		};
		$this->setHtmlJsSourceOrAjax($script);		
	}

	function generateAutoScript() {
		$authorization = $this->cloud->getRequest("user_authorization");
		if ($authorization) {
			if ($authorization === "true") {
				$this->setSessionScript();
			};
		};
	}

	function isAuthorized() {
		return $this->authorized;
	}

	function clearCache() {
		$this->isInGroupCache = array();
	}

	function isInGroup($name) {
		if (array_key_exists($name, $this->isInGroupCache)) {
			return $this->isInGroupCache[$name];
		};

		$acl = $this->modAcl->getAclSys();


		$this->dsUserGroup->clear();
		$this->dsUserGroup->name = $name;
		$this->dsUserGroup->enabled = 1;
		if ($this->dsUserGroup->load(0, 1)) {
			if (in_array($this->dsUserGroup->id, $acl->aclUserGroup)) {
				$this->isInGroupCache[$name] = true;
				return true;
			}
		}
		return false;
	}

	function recoEncode($in, $key_) {
		$out = array();
		$seed = strlen($in);

		for ($k = 0; $k < $seed; ++$k) {
			$out[$k] = ord($in[$k]);
		};
		for ($k = 1; $k < $seed; ++$k) {
			$out[$k] = ($out[$k] ^ $out[$k - 1] ^ $k) & 0xFF;
		};

		$k_ln = strlen($key_);
		if ($k_ln > 0) {
			$k_k = 0;
			for ($k = 0; $k < $seed; ++$k) {
				$out[$k] = $out[$k] ^ ord($key_[$k_k]);
				++$k_k;
				if ($k_k == $k_ln) {
					$k_k = 0;
				};
			};
		};

		for ($k = 0; $k < $seed; ++$k) {
			$out[$k] = sprintf("%02X", $out[$k]);
		};
		return implode("", $out);
	}

	function recoDecode($in, $key_) {
		$out = array();
		$in = pack("H*", $in);
		$seed = strlen($in);

		for ($k = 0; $k < $seed; ++$k) {
			$out[$k] = ord($in[$k]);
		};

		$k_ln = strlen($key_);
		if ($k_ln > 0) {
			$k_k = 0;
			for ($k = 0; $k < $seed; ++$k) {
				$out[$k] = $out[$k] ^ ord($key_[$k_k]);
				++$k_k;
				if ($k_k == $k_ln) {
					$k_k = 0;
				};
			};
		};

		$in = $out;

		$out[0] = chr($in[0]);
		for ($k = 1; $k < $seed; ++$k) {
			$out[$k] = chr(($in[$k] ^ $in[$k - 1] ^ $k) & 0xFF);
		};

		return implode("", $out);
	}

	function updateAction(){
	
		$minutes=60*$this->cloud->get("user_logoff_after_idle_time",15);
		$this_=false;
		$dsUser=&$this->dsUser->copyThis();
		$dsUser->clear();
		$dsUser->logged_in=1;
		for($dsUser->load();$dsUser->isValid();$dsUser->loadNext()){		
			if(time()-mktime(
					substr($dsUser->action_on,11,2),	
					substr($dsUser->action_on,14,2),
					substr($dsUser->action_on,17,2),
					substr($dsUser->action_on,5,2),
					substr($dsUser->action_on,8,2),
					substr($dsUser->action_on,0,4)
				)>=$minutes){

				if($this->info->id==$dsUser->id){
					$this_=true;
					$this->doLogout();
					$this->makeResetCookie();
					if(1*$this->cloud->getRequest("ajax-js",0)){
						echo "document.location.assign(\"".$this->requestUri()."\");";
					}else					
					if(1*$this->cloud->getRequest("ajax",0)){
						$this->ejsBegin();
						echo "document.location.assign(\"".$this->requestUri()."\");";
						$this->ejsEnd();
					}else{
						$path_=$_SERVER["SCRIPT_NAME"];
						$x=strrpos($_SERVER["SCRIPT_NAME"],"/");
						if($x===false){
						}else{
							$path_=substr($path_,0,$x+1);
						};
						header("Location: http://".$_SERVER["SERVER_NAME"].$path_.$this->requestUri(array("stamp"=>hash("sha512",time().rand(),false))));
					};
					$this->cloud->setInitOk(false);
				};

				$dsUser->logged_in=0;
				$dsUser->session=null;
				$dsUser->save();

			};
		};


		if($this->isAuthorized()){
			$this->dsUser->action_on = "NOW";
			$this->dsUser->action = $this->dsUser->action + 1;
			$this->dsUser->save();

		}else{
			if(!$this_){
				$id_=$this->cloud->getRequest("user_id", null);
				$session_=$this->cloud->getRequest("user_session", null);
				$rnd_=$this->cloud->getRequest("user_rnd", null);
				$key_=$this->cloud->getRequest("user_key", null);
				if($id_&&$rnd_&&$session_&&$key_){
					$this->makeResetCookie();
					if(1*$this->cloud->getRequest("ajax-js",0)){
						echo "document.location.assign(\"".$this->requestUri()."\");";
					}else
					if(1*$this->cloud->getRequest("ajax",0)){
						$this->ejsBegin();
						echo "document.location.assign(\"".$this->requestUri()."\");";
						$this->ejsEnd();
					}else{
						$path_=$_SERVER["SCRIPT_NAME"];
						$x=strrpos($_SERVER["SCRIPT_NAME"],"/");
						if($x===false){
						}else{
							$path_=substr($path_,0,$x+1);
						};
						header("Location: http://".$_SERVER["SERVER_NAME"].$path_.$this->requestUri(array("stamp"=>hash("sha512",time().rand(),false))));
					};
					$this->cloud->setInitOk(false);
				};
			};
		};

	}
}


