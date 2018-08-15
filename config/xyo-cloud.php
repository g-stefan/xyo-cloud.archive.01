<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("version", "7.3.0.0");

//$this->set("log_module",true);
//$this->set("log_request",true);
//$this->set("log_response",true);
//$this->set("log_language",true);
//$this->set("use_redirect",true);
$this->set("user_action",true);
$this->set("user_captcha",true);
$this->set("user_password_encoding","hash");
// --- set this in xyo-cloud.local.init
$this->set("service_key","unknown");
$this->set("user_reco_salt","unknown");
$this->set("crypt_rpc_private_key","unknown");
// ---

//
// some default values just in case
//
$this->set("datasource_layer", "xyo-datasource-xyo");
//
$this->set("language", "en-GB");
$this->set("locale", "en-GB");
$this->set("locale_date_format","Y-m-d");
$this->set("locale_datetime_format","Y-m-d H:i:s");
$this->set("locale_time_format","H:i:s");
//
//
$this->set("configured", false);
//
// local init settings
//
$this->includeConfig("xyo-cloud.local.init");
//
// website settings
//
$this->includeConfig("config.website");
// ---
// recover site value from server request
$this->setSiteFromServerRequest();
// ---
if (!$this->get("configured",false)) {
	define("XYO_CLOUD_INSTALL", 1);
	$this->includeConfig("xyo-cloud.install");
	return;
}
$this->set("language", $this->get("default_language", "en-GB"));
//
//
$this->setModule(null, null, "xyo");
//
// datasource 
//
$layer = $this->cloud->get("datasource_layer", "xyo-datasource-xyo");
$this->setModule("xyo", null, $layer);
//
// process settings
//
$dsSettings=&$this->dataSource->getDataSource("db.table.xyo_settings");
$dsSettings->clear();
for($dsSettings->load();$dsSettings->isValid();$dsSettings->loadNext()){
	$this->set($dsSettings->name,$dsSettings->value);		
};
//
//
$this->setModule("xyo", null, "xyo-mod-ds-acl");
$this->setModule("xyo", null, "xyo-mod-ds-user");
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
$this->setModule("xyo", null, "xyo-mod-ds-loader-mod");
$this->setModuleLoader("xyo-mod-ds-loader-mod");
$this->setGroupLoader("xyo-mod-ds-loader-mod");
//
//
$this->includeConfig("xyo-cloud.module");
//
// local configuration/settings
//
$this->includeConfig("xyo-cloud.local.config");
//