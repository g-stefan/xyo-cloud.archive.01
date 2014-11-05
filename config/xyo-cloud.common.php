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

$this->set("system_version", "3.0.0");

//$this->set("system_log_module",true);
//$this->set("system_log_request",true);
//$this->set("system_log_response",true);
//$this->set("system_log_language",true);
$this->set("system_user_action",true);
$this->set("system_user_captcha",true);
//
// some default values just in case
//
$this->set("system_datasource_layer", "xyo-mod-datasource-xyo");
//
$this->set("language", "en-GB");
//
//
$this->set("system_configured", false);
$this->includeConfig("config.website");
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
$this->setModule(null, null, "xyo", true, null, false, true, false);
//
// datasource 
//
$this->setModule("xyo", null, "xyo-mod-ds-db", true, null, false, true, false);
$this->setModule("xyo", null, "xyo-mod-datasource", true, null, false, true, false);
$layer = $this->cloud->get("system_datasource_layer", "xyo-mod-datasource-xyo");
$this->setModule("xyo", null, $layer, true, null, false, true, false);
//
// datasource loader
//
$this->setModule("xyo", null, "xyo-mod-ds-loader-ds", true, null, false, true, false);
$this->set("system_datasource_loader", "xyo-mod-ds-loader-ds");
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
$this->setModule("xyo", null, "xyo-mod-ds-acl", true, null, false, true, false);
$this->setModule("xyo", null, "xyo-mod-ds-user", true, null, false, true, false);
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
$this->setModule("xyo", null, "xyo-mod-ds-loader-mod", true, null, false, true, false);
$this->setModuleLoader("xyo-mod-ds-loader-mod");
//
//
