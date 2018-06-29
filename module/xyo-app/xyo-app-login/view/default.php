<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$languageSelector=$this->cloud->get("login_has_select_language",0);
if($languageSelector==1){
	$languageSelector=!$this->getParameter("no_language_selector",0);
};

if($languageSelector){

	$language = $this->getSystemLanguage();
	$languageList = array();
	$languageList["*"] = $this->getFromLanguage("lang_default");
	$dsLanguage = &$this->getDataSource("db.table.xyo_language");
	if ($dsLanguage) {
	    $dsLanguage->enabled = 1;
	    $dsLanguage->setOrder("name", 1);
	    for ($dsLanguage->load(); $dsLanguage->isValid(); $dsLanguage->loadNext()) {
	        $languageList[$dsLanguage->name] = $dsLanguage->description;
	    }
	}

	$this->setParameter("select_language",$languageList);
};

$rnd=$this->getElementValueString("rnd","");
if(strlen($rnd)<strlen(hash("sha512","x",true))){
	$rnd=hash("sha512",date("Y-m-d H:i:s")." - ".rand(),false);
	$this->setElementValue("rnd",$rnd);
};

$parameters=array("user_authorization"=>"true");

$sysCaptcha=$this->cloud->get("user_captcha", false);

$useCaptcha=false;
if($sysCaptcha){
	if ($this->isError()) {
		$useCaptcha=true;
		$_SESSION["user_captcha_force"]=1;
	}else{
		if(array_key_exists("user_captcha_force",$_SESSION)){
			$useCaptcha=true;
		}else{
			$captcha=hash("sha512",date("Y-m-d H:i:s")." - ".rand(),false);	
			$_SESSION["user_captcha_rnd"]=$rnd;
			$_SESSION["user_captcha_key"]=hash("sha512",$rnd.hash("sha512",$captcha,false),false);
			$parameters=array_merge($parameters,array("user_captcha"=>$captcha));
		};
	};
};

if ($this->isError()) {
    $msg_lang = $this->getFromLanguage("error_unknown");
};

$this->generateComponent("xui.form-action-begin",array("onsubmit"=>"return (xyoFormLoginAction(this));"));
$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.panel-begin",array("title"=>"title_login"));

$this->generateComponent("xui.form-username-required", array("element" => "username"));
$this->generateComponent("xui.form-password-required", array("element" => "password"));

if($languageSelector){
	$this->generateComponent("xui.form-select", array("element" => "language","on_change"=>"if(xyoFormLoginAction(this.form)){this.form.submit();};"));
};

if($useCaptcha){
	$this->generateComponent("xui.form-captcha",array("element"=>"captcha", "prefix"=>"user", "rnd"=>$rnd));	
};

$this->generateComponent("xui.separator");

?>

<div style="display:block;text-align:center;">
	<input type="submit" class="xui-form-button xui-form-button_primary" name="<?php $this->eElementName("login"); ?>" value="<?php $this->eLanguage("cmd_login"); ?>" ></input>
</div>

<?php

$this->generateComponent("xui.separator");
$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x1-end");


$this->generateComponent("xui.form-hidden",array("element"=>"rnd"));
$this->generateComponent("xui.form-action-end",array("parameters"=>$parameters));

