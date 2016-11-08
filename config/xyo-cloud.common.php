<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

// start up session - cookie only
ini_set("session.use_cookies", 1);
ini_set("session.use_trans_sid", 0);
session_start();
//

$this->set("system_version", "3.0.2");

//$this->set("system_log_module",true);
//$this->set("system_log_request",true);
//$this->set("system_log_response",true);
//$this->set("system_log_language",true);
$this->set("system_user_action",true);
$this->set("system_user_captcha",true);
$this->set("system_service_key","-put-here-service-key-");
// ---
$this->set("system_use_redirect",false);

//
// some default values just in case
//
$this->set("system_datasource_layer", "xyo-mod-datasource-xyo");
//
$this->set("language", "en-GB");
$this->set("locale", "en-GB");
$this->set("locale_date_format","Y-m-d");
$this->set("locale_datetime_format","Y-m-d H:i:s");
$this->set("locale_time_format","H:i:s");
//
//
$this->set("system_configured", false);
$this->includeConfig("config.website");
// ---
$site=$this->get("site","");
if(strlen($site)==0){
	$site=$_SERVER['REQUEST_URI'];
	$x=@strrpos($site,"/",-1);
	if($x===false){
	}else
	if($x>=0){
		$useRedirect=$this->get("system_use_redirect",false);
		if($useRedirect){
			$found=false;
                        $site=substr($site,0,$x+1);
			if(!$found){				
				$x=@strpos($site,"/admin/run/",0);
				if($x===false){
				}else
				if($x>=0){
					$this->set("site",substr($site,0,$x+1));
					$found=true;
				};
			};

			if(!$found){
				$x=@strpos($site,"/public/run/",0);
				if($x===false){
				}else
				if($x>=0){				
					$this->set("site",substr($site,0,$x+1));
					$found=true;
				};
			};

			if(!$found){
				$x=@strpos($site,"/run/",0);
				if($x===false){
				}else
				if($x>=0){
					$this->set("site",substr($site,0,$x+1));
					$found=true;
				};
			};

		}else{
			$this->set("site",substr($site,0,$x+1));
		};
	};
};

if ($this->get("system_configured")) {
    
} else {
    define("XYO_CLOUD_INSTALL", 1);
    $this->set("system_core", "install");
    $this->includeConfig("xyo-cloud.install");
    return;
}
$this->set("language", $this->get("system_default_language", "en-GB"));
//
//
$this->setModule(null, null, "xyo", true, null, true, false);
//
// datasource 
//
$this->setModule("xyo", null, "xyo-mod-ds-db", true, null, true, false);
$this->setModule("xyo", null, "xyo-mod-datasource", true, null,  true, false);
$layer = $this->cloud->get("system_datasource_layer", "xyo-mod-datasource-xyo");
$this->setModule("xyo", null, $layer, true, null, true, false);
//
// process settings
//
$dataSourceProvider = &$this->getModule("xyo-mod-datasource");
$dsSettings=&$dataSourceProvider->getDataSource("db.table.xyo_settings");
$dsSettings->clear();
for($dsSettings->load();$dsSettings->isValid();$dsSettings->loadNext()){
	$this->set($dsSettings->name,$dsSettings->value);		
};
//
//
$this->setModule("xyo", null, "xyo-mod-ds-acl", true, null, true, false);
$this->setModule("xyo", null, "xyo-mod-ds-user", true, null, true, false);
//
// check for user
//
$modUser = &$this->getModule("xyo-mod-ds-user");
if ($modUser) {
    if ($modUser->isAuthorized()) {

        if ($modUser->info->language) {
            $this->set("language", $modUser->info->language);
        }

    }
}
//
// language from cookie/override user/config
//
$website_language = $this->getRequest("website_language", "*");
if ($website_language === "*") {
    
} else {
    $this->set("language", $website_language);
}
//
$website_language = $this->getRequest("user_language", "*");
if ($website_language === "*") {
    
} else {
    $this->set("language", $website_language);
	setcookie("website_language",$website_language);
}
//
// set module loader ... (must be after user)
//
$this->setModule("xyo", null, "xyo-mod-ds-loader-mod", true, null, true, false);
$this->setModuleLoader("xyo-mod-ds-loader-mod");
//
//
