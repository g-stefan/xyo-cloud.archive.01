<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
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
		
        if ($this->ds->id == $this->primaryKeyValue) {
            
        } else {
            $this->setElementError("username", $this->getFromLanguage("el_username_already_exists"));
            return;
        }
}

$this->ds->clear();
$this->ds->id = $this->primaryKeyValue;
if ($this->ds->load(0, 1)) {
        
} else {
	$this->setError(array("err_id_user_not_found" => $this->id));
	return;
}

$this->ds->name = $name;
$this->ds->username = $username;
if (strlen($password1)) {
	$this->ds->password = "md5:" . md5($password1);
}

$this->ds->id_xyo_language = $this->getElementValueInt("id_xyo_language", 0, "*");
$this->ds->description = $this->getElementValueStr("description","");
$this->ds->email = $this->getElementValueStr("email","");

if ($this->ds->save()) {

	$this->processComponent("bootstrap.file-image-thumbnail","picture",array(
	"filename"=>"repository/xyo-user/".$this->ds->id."-".$this->ds->username."-picture-".time(),
	"extension"=>true,
	"delete_before_save"=>true));
	$this->ds->picture=$this->getElementValueStr("picture");
        $this->ds->save();

    
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
    $this->setError("err_save_error");
}

