<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$name = $this->getElementValueStr("name");
if (strlen($name) == 0) {
    $this->setElementError("name", $this->getFromLanguage("el_name_empty"));
}

$username = $this->getElementValueStr("username");
if (strlen($username) == 0) {
    $this->setElementError("username", $this->getFromLanguage("el_username_empty"));
}

$password1 = $this->getElementValueStr("password1");
$password2 = $this->getElementValueStr("password2");

if (strlen($password1) || strlen($password2)) {
    if ($password1 !== $password2) {
        $this->setElementError("password1", $this->getFromLanguage("el_password1_not_match"));
        $this->setElementError("password2", $this->getFromLanguage("el_password2_not_match"));
    }
}


if($this->isNew){
    if(strlen($password1)==0){
        $this->setElementError("password1", $this->getFromLanguage("el_password1_empty"));
    }
    if(strlen($password2)==0){
        $this->setElementError("password2", $this->getFromLanguage("el_password2_empty"));
    }
}

if ($this->isElementError()) {
    return;
};

$id_xyo_core = $this->getElementValueInt("id_xyo_core", 0, "*");

$found=false;
$this->ds->clear();
$this->ds->username = $username;
if ($this->ds->load(0, 1)) {
	$found=true;
};

if ($found) {
    if ($this->isNew) {
        $this->setElementError("username", $this->getFromLanguage("el_username_already_exists"));
        return;
    } else {
		
        if ($this->ds->id == $this->id) {
            
        } else {
            $this->setElementError("username", $this->getFromLanguage("el_username_already_exists"));
            return;
        }
    }
}

if ($this->isNew) {
    
} else {
    $this->ds->clear();
    $this->ds->id = $this->id;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError("error", array("err_id_user_not_found" => $this->id));
        return;
    }
}



$this->ds->name = $name;
$this->ds->username = $username;
if ($this->isNew) {
    $this->ds->created_on = "NOW";
    $this->ds->password = "md5:" . md5($password1);
} else {
    if (strlen($password1)) {
        $this->ds->password = "md5:" . md5($password1);
    }
}

$this->ds->id_xyo_language = $this->getElementValueInt("id_xyo_language", 0, "*");
$this->ds->enabled = $this->getElementValueInt("enabled", 0, "*");
$this->ds->description = $this->getElementValueStr("description","");
$this->ds->invisible = $this->getElementValueInt("invisible", 0, "*");

if (1 * $this->ds->enabled == 0) {
    if ($this->ds->id == $this->user->info->id) {
        $this->setError("error", "err_disable_this_user");
        $this->ds->enabled = 1;
    }
}

if ($this->ds->save()) {
    
    if ($this->isNew) {
        $dsUserXUserGroup = &$this->getDataSource("db.table.xyo_user_x_user_group");
        if ($dsUserXUserGroup) {
            $dsUserXUserGroup->clear();
            $dsUserXUserGroup->id_xyo_user = $this->ds->id;
            $dsUserXUserGroup->id_xyo_user_group = $this->getElementValueInt("id_xyo_user_group", 0, "*");
            $dsUserXUserGroup->allow = 1;
            $dsUserXUserGroup->enabled = 1;
            if ($dsUserXUserGroup->save()) {
                
            } else {
                $this->setError("error", "err_new_user_x_user_group_save_error");
            };
        } else {
            $this->setError("error", array("err_datasource_not_found" => "db.table.xyo_user_x_user_group"));
        };

        $dsUserXCore = &$this->getDataSource("db.table.xyo_user_x_core");
        if ($dsUserXCore) {
            $dsUserXCore->clear();
            $dsUserXCore->id_xyo_user = $this->ds->id;
            $dsUserXCore->id_xyo_core = 0; // initially any core
            $dsUserXCore->enabled = 1;
            if ($dsUserXCore->save()) {
                
            } else {
                $this->setError("error", "err_new_user_x_core_save_error");
            };
        } else {
            $this->setError("error", array("err_datasource_not_found" => "db.table.xyo_user_x_core"));
        };

    }
    
    if($this->ds->id==$this->user->info->id){
        if (strlen($password1)) {
            $auth=$this->user->getAuthorizationRequestDirect($this->ds->username);                        
            foreach($auth as $key=>$value){
                $this->setRequest($key,$value);
            }
            $this->user->doLogin();
            $this->ejsBegin();
            $this->user->ejsMakeScript();
            $this->ejsEnd();
        }
    }
    
    $this->setElementValue("password1","");
    $this->setElementValue("password2","");
    
} else {
    $this->setError("error", "err_save_error");
}

