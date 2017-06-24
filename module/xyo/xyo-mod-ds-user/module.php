<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

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

}

class xyo_mod_ds_User extends xyo_Module {

	var $info;
	//
	//
	var $modAcl;
	//
	var $dsUser;
	var $dsCore;
	var $dsUserXCore;
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
		}

		$this->doLogin();
		$this->generateAutoCookie();

	}

	function reloadDataSource() {
		$this->dsUser = &$this->getDataSource("db.table.xyo_user");
		$this->dsCore = &$this->getDataSource("db.table.xyo_core");
		$this->dsUserXCore = &$this->getDataSource("db.table.xyo_user_x_core");
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
					if (strncmp($password, "md5:", 4) == 0) {
						$password = substr($password, 4);
					}
				}


				if ($username && $password && $rnd && $captcha) {

					$this->info->username = $username;
					$this->info->password = $password;
					$this->info->rnd = $rnd;
					if($this->useCaptcha) {
						$this->info->captcha = $captcha;
					} else {
						$this->info->captcha = null;
					};
					$this->mode = false;

					$this->authorized = $this->performUserCheck();
				}
			}
		}
		if ($this->authorized) {
			return true;
		}

		if (!$authorization) {
			$session = $this->cloud->getRequest("user_session");
			if ($session) {
				$rnd = $this->cloud->getRequest("user_rnd");
				if ($rnd) {
					$this->info->session = $session;
					$this->info->rnd = $rnd;
					$this->mode = true;
					$this->authorized = $this->performUserCheck();
				}
			}
		}

		return $this->authorized;
	}

	function performUserCheck() {
		$this->authorized = false;

		if ($this->dsUser) {

		} else {
			return false;
		};

		$this->dsUser->clear();
		$this->dsUser->enabled = 1;

		if ($this->mode) {
			$this->dsUser->session = $this->info->session;
		} else {
			$this->dsUser->username = $this->info->username;
		};

		$this->dsUser->id_xyo_core=$this->modAcl->getAclSysCore();

		if ($this->dsUser->load(0, 1)) {

			// check if user allowed on this core
			$coreAuthFail=true;
			$this->dsCore->clear();
			$this->dsCore->name = $this->cloud->get("core");
			$this->dsCore->enabled = 1;
			if ($this->dsCore->load(0, 1)) {
				$this->dsUserXCore->clear();				
				$this->dsUserXCore->id_xyo_user=$this->dsUser->id;
				$this->dsUserXCore->id_xyo_core=array(0,$this->dsCore->id); // any core or core
				$this->dsUserXCore->enabled=1;
				if ($this->dsUserXCore->load(0, 1)) {
					$coreAuthFail=false;	
				};
			};
			
			if($coreAuthFail){
				return false;	
			};

			// check credentials

			$password = "unknown";
			$pwd = explode(":", $this->dsUser->password);
			if ($pwd[0] === "md5") {
				$password = $pwd[1];
			} else if ($pwd[0] === "reco") {
				$password = md5($this->recoDecode($pwd[1], pack("H*", md5($this->dsUser->username))));
			} else if ($pwd[0] === "plain") {
				$password = md5($pwd[1]);
			} else {
				return false;
			};
			                        
			$checkPasword = md5(md5($this->dsUser->username . $password) . $this->info->rnd);
			$chk = "";

			$captchaOk=false;
			if ($this->mode) {
				$captchaOk=true;
				$chk = "session";
			} else {
				if($this->useCaptcha) {
					$captchaKey=md5($this->info->rnd.md5($this->info->captcha));
					if(isset($_SESSION["user_captcha_key"])) {
						if($captchaKey===$_SESSION["user_captcha_key"]) {
							$captchaOk=true;
						}
					};

					//
					// Check service key
					//
					if(!$captchaOk){
						$serviceKey=md5($this->info->rnd.md5($this->cloud->get("service_key","")));
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
				$chk = "password";
			};
		
			if (($this->info->$chk === $checkPasword)&&($captchaOk)) {

				$this->info->id = $this->dsUser->id;
				$this->info->username = $this->dsUser->username;
				$this->info->session = $checkPasword;
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

				if ($this->mode) {
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
				} else {
					//
					// update session only on authorization
					//

					//
					// allow secondary requests (from services)
					// that will not unauthorize current session 
					//
					if($this->cloud->getRequest("user_service",0)){
					}else{
						if(strlen($this->dsUser->session)==0){
							$this->dsUser->session = $this->info->session;
							$this->dsUser->session_rnd = $this->info->rnd;
						}else{
							//
							// set session from database to allow multiple browser sessions							
							// logout from one session, force logoff to all
							//
							 
							// first verify if user/password changed
							$checkPasword = md5(md5($this->dsUser->username . $password) . $this->dsUser->session_rnd);
							if($checkPasword!=$this->dsUser->session){
								// update new credentials
								$this->dsUser->session=$this->info->session;
								$this->dsUser->session_rnd=$this->info->rnd;
							}else{
								$this->info->session=$this->dsUser->session;
								$this->info->rnd=$this->dsUser->session_rnd;							
							};
						};
					};
					//
					//
					//
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
					$this->dsUser->session="";
					$this->dsUser->action_on = "NOW";
					$this->dsUser->action = 0;
					$this->dsUser->logged_in = 0;
					$this->dsUser->save();
				}
			}
		}		                        

		$this->doReset();

	}

	function getAuthorizationRequestDirect($user=null) {
		if ($this->dsUser) {

		} else {
			return null;
		};
		if ($this->info->id) {

		} else {
			if ($user) {

			} else {
				return null;
			}
		}
		$this->dsUser->clear();
		if ($user) {
			$this->dsUser->username = $user;
		} else {
			$this->dsUser->id = $this->info->id;
		}
		$this->dsUser->enabled = 1;
		if ($this->dsUser->load(0, 1)) {
			$password = "unknown";
			$pwd = explode(":", $this->dsUser->password);
			if ($pwd[0] === "md5") {
				$password = $pwd[1];
			} else if ($pwd[0] === "reco") {
				$password = md5($this->recoDecodeMd5($pwd[1], $this->dsUser->username));
			} else if ($pwd[0] === "plain") {
				$password = md5($pwd[1]);
			} else {
				return null;
			};
			$rnd = md5("".rand());

			if($this->useCaptcha) {
				$capctha=md5("".rand());
				$_SESSION["user_captcha_rnd"]=$rnd;
				$_SESSION["user_captcha_key"]=md5($rnd.md5($capctha));
				return array(
					       "user_username" => $this->dsUser->username,
					       "user_password" => "md5:".md5(md5($this->dsUser->username . $password) . $rnd),
					       "user_rnd" => $rnd,
					       "user_authorization" => "true",
					       "user_captcha"=>$capctha
				       );
			};
			return array(
				       "user_username" => $this->dsUser->username,
				       "user_password" => "md5:".md5(md5($this->dsUser->username . $password) . $rnd),
				       "user_rnd" => $rnd,
				       "user_authorization" => "true"
			       );
		};
		return null;
	}

	function makeCookie() {
		if ($this->authorized) {
			setcookie("user_session", $this->info->session);
			setcookie("user_rnd", $this->info->rnd);
			return true;
		};
		return false;
	}

	function makeResetCookie() {
		setcookie("user_session", "", mktime(0, 0, 1, 1, 1, 1970));
		setcookie("user_rnd", "", mktime(0, 0, 1, 1, 1, 1970));
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

	function ejsMakeScript() {
		if ($this->authorized) {
			echo "document.cookie=\"user_session=\"+escape(\"" . $this->info->session . "\")+\";\";";
			echo "document.cookie=\"user_rnd=\"+escape(\"" . $this->info->rnd . "\")+\";\";";
			return true;
		}
		return false;
	}

	function ejsMakeResetScript() {
		echo "document.cookie=\"user_session=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";";
		echo "document.cookie=\"user_rnd=;expires=Thu, 01-Jan-1970 00:00:01 GMT;\";";
	}

	function generateAutoScript() {
		$authorization = $this->cloud->getRequest("user_authorization");
		if ($authorization) {
			if ($authorization === "true") {
				$this->ejsBegin();
				if (!$this->ejsMakeScript()) {
					$this->ejsMakeResetScript();
				};
				$this->ejsEnd();
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

	function recoDecodeMd5($in, $key_) {
		return recoDecode($in, pack("H*", md5($key_)));
	}

	function recoEncodeMd5($in, $key_) {
		return recoEncode($in, pack("H*", md5($key_)));
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
						header("Location: http://".$_SERVER["SERVER_NAME"].$path_.$this->requestUri(array("stamp"=>md5(time().rand()))));
					};
					$this->cloud->setIsInitOk(false);
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
			if($this_){
			}else{			
				$session_=$this->cloud->getRequest("user_session", null);
				$rnd_=$this->cloud->getRequest("user_rnd", null);
				if($rnd_&&$session_){
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
						header("Location: http://".$_SERVER["SERVER_NAME"].$path_.$this->requestUri(array("stamp"=>md5(time().rand()))));
					};
					$this->cloud->setIsInitOk(false);
				};
			};
		};

	}
}


