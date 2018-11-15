<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("xyo_cloud_version", "10.4.0.57");

//$this->set("log_module",true);
//$this->set("log_request",true);
//$this->set("log_response",true);
//$this->set("log_language",true);
//$this->set("use_redirect",true);
$this->set("user_action",true);
$this->set("user_captcha",true);
$this->set("user_password_encoding","hash");
// --- this will be generated automatically by installer in config.website
$this->set("user_login_salt","unknown");
// --- overwrite this in xyo-cloud.local.init
$this->set("user_reco_salt","unknown");
$this->set("service_key","unknown");
$this->set("crypt_rpc_private_key","unknown");
// ---

//
// some default values just in case
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
// process settings
//
$dsSettings=&$this->dataSource->getDataSource("db.table.xyo_settings");
$dsSettings->clear();
for($dsSettings->load();$dsSettings->isValid();$dsSettings->loadNext()){
	$this->set($dsSettings->name,$dsSettings->value);		
};

//
//
$this->setModule(null, null, "xyo");
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
if ($website_language !== "*") {
	$this->set("language", $website_language);
}
//
$website_language = $this->getRequest("user_language", "*");
if ($website_language !== "*") {
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