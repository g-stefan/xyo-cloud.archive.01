<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->clearElementError();

$username = $this->getElementValueStr("username");
if (strlen($username) == 0) {
    $this->setElementError("username", $this->getFromLanguage("username_empty"));
}

$password = $this->getElementValueStr("password");
if (strlen($password) == 0) {
    $this->setElementError("password", $this->getFromLanguage("password_empty"));
}

$retype_password = $this->getElementValueStr("retype_password");
if (strlen($retype_password) == 0) {
    $this->setElementError("retype_password", $this->getFromLanguage("retype_password_empty"));
}

if ($password !== $retype_password) {
    if ($this->isElementError("password") || $this->isElementError("retype_password")) {
        
    } else {
        $this->setElementError("password", $this->getFromLanguage("password_not_match"));
        $this->setElementError("retype_password", $this->getFromLanguage("retype_password_not_match"));
    };
}


$this->doRedirect("done");
if ($this->isElementError()) {
    $this->doRedirect("settings");
} else {
    // set datasource loader
    $this->cloud->set("system_datasource_loader", "xyo-mod-ds-loader-ds");

    $dsUser = &$this->getDataSource("db.table.xyo_user");
    if ($dsUser) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_user"));
        return;
    }

    $dsLanguage = &$this->getDataSource("db.table.xyo_language");
    if ($dsLanguage) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_language"));
        return;
    }

    $dsUserXUserGroup = &$this->getDataSource("db.table.xyo_user_x_user_group");
    if ($dsUserXUserGroup) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_user_x_user_group"));
        return;
    }

    $dsUserXCore = &$this->getDataSource("db.table.xyo_user_x_core");
    if ($dsUserXCore) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_user_x_core"));
        return;
    }


    $dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");
    if ($dsUserGroup) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_user_group"));
        return;
    }

    $dsSettings = &$this->getDataSource("db.table.xyo_settings");
    if ($dsSettings) {
        
    } else {
        $this->setError("error", array("datasource_not_found" => "db.table.xyo_settings"));
        return;
    }


    $dsLanguage->clear();
    $dsLanguage->name = $this->getSystemLanguage();
    $dsLanguage->enabled = 1;
    if ($dsLanguage->load(0, 1)) {
        
    } else {
        $dsLanguage->id = 0; //default system language
    }


    $dsUser->clear();
    $dsUser->username = $this->getElementValue("username");
    $dsUser->password = "md5:" . md5($this->getElementValue("password"));


    $dsUser->id_xyo_language = $dsLanguage->id;

    $dsUser->name = "Administrator";
    $dsUser->created_on = "NOW";
    $dsUser->enabled = 1;
    $dsUser->save();

    $this->setKeepRequest("administrator_username", $dsUser->username);
    $this->setRequest("administrator_username", $dsUser->username);

    $dsUserGroup->clear();
    $dsUserGroup->name = "wheel";
    $dsUserGroup->enabled = 1;
    if ($dsUserGroup->load(0, 1)) {

	$dsUserXUserGroup->clear();
        $dsUserXUserGroup->id_xyo_user = $dsUser->id;
        $dsUserXUserGroup->id_xyo_user_group = $dsUserGroup->id;
        $dsUserXUserGroup->enabled = 1;
        $dsUserXUserGroup->save();

    };


	$dsUserXCore->clear();
        $dsUserXCore->id_xyo_user = $dsUser->id;
        $dsUserXCore->id_xyo_core = 0;
        $dsUserXCore->enabled = 1;
        $dsUserXCore->save();


    $dsSettings->clear();
    $dsSettings->name = "website_title";
    $dsSettings->value = $this->getElementValue("website_title", "");    
    $dsSettings->type = "string";
    $dsSettings->save();

    $dsSettings->clear();
    $dsSettings->name = "user_logoff_after_idle_time";
    $dsSettings->value = 15;
    $dsSettings->type = "integer";
    $dsSettings->save();

}


