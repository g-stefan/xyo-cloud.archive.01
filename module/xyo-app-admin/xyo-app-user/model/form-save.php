<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$name = $this->getElementValueString("name");
if (strlen($name) == 0) {
    $this->setElementError("name", $this->getFromLanguage("el_name_empty"));
}

$username = $this->getElementValueString("username");
if (strlen($username) == 0) {
    $this->setElementError("username", $this->getFromLanguage("el_username_empty"));
}

$password1 = $this->getElementValueString("password1");
$password2 = $this->getElementValueString("password2");

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
		
        if ($this->ds->id == $this->primaryKeyValue) {
            
        } else {
            $this->setElementError("username", $this->getFromLanguage("el_username_already_exists"));
            return;
        }
    }
}

if ($this->isNew) {
    
} else {
    $this->ds->clear();
    $this->ds->id = $this->primaryKeyValue;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError(array("err_id_user_not_found" => $this->primaryKeyValue));
        return;
    }
}

if (!$this->isNew) {
    if(strcmp($this->ds->username,$username)!=0){
        $this->ds->password=$this->user->changePasswordHashUsername($username,$this->ds->username,$this->ds->password,$this->cloud->get("user_password_encoding","hash"));
    };
};

$this->ds->name = $name;
$this->ds->username = $username;
if ($this->isNew) {
    $this->ds->created_on = "NOW";
    $this->ds->password = $this->user->setPasswordHash($username,$password1,$this->cloud->get("user_password_encoding","hash"));
} else {
    if (strlen($password1)) {
        $this->ds->password = $this->user->setPasswordHash($username,$password1,$this->cloud->get("user_password_encoding","hash"));
    }
}

$this->ds->xyo_language_id = $this->getElementValueNumber("xyo_language_id", 0, "*");
$this->ds->enabled = $this->getElementValueNumber("enabled", 0, "*");
$this->ds->email = $this->getElementValueString("email","");
$this->ds->description = $this->getElementValueString("description","");
$this->ds->invisible = $this->getElementValueNumber("invisible", 0, "*");

if (1 * $this->ds->enabled == 0) {
    if ($this->ds->id == $this->user->info->id) {
        $this->setError("err_disable_this_user");
        $this->ds->enabled = 1;
    }
}

if ($this->ds->save()) {

	$this->processComponent("xui.form-file-image",array(
	"element" => "picture",
	"filename"=>"repository/xyo-user/".$this->ds->id."-".$this->ds->username."-picture-".time(),
	"extension"=>true,
	"delete_before_save"=>true));
	$this->ds->picture=$this->getElementValueString("picture");
        $this->ds->save();
	
    
    if ($this->isNew) {
        $dsUserXUserGroup = &$this->getDataSource("db.table.xyo_user_x_user_group");
        if ($dsUserXUserGroup) {
            $dsUserXUserGroup->clear();
            $dsUserXUserGroup->xyo_user_id = $this->ds->id;
            $dsUserXUserGroup->xyo_user_group_id = $this->getElementValueNumber("xyo_user_group_id", 0, "*");
            $dsUserXUserGroup->allow = 1;
            $dsUserXUserGroup->enabled = 1;
            if ($dsUserXUserGroup->save()) {
                
            } else {
                $this->setError("err_new_user_x_user_group_save_error");
            };
        } else {
            $this->setError(array("err_datasource_not_found" => "db.table.xyo_user_x_user_group"));
        };
    }
    
    if($this->ds->id==$this->user->info->id){
        if (strlen($password1)) {
            $auth=$this->user->getAuthorizationRequestDirect($this->ds->username);                        
	    if(!is_null($auth)){
	            foreach($auth as $key=>$value){
        	        $this->setRequest($key,$value);
	            }
        	    $this->user->doLogin();
        	    $this->user->setSessionScript();
	   }else{
		$this->setError("err_save_error");
	   };
        }
    }
    
    $this->setElementValue("password1","");
    $this->setElementValue("password2","");
    
} else {
    $this->setError("err_save_error");
}

