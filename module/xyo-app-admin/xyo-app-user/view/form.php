<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("row-begin");

$this->generateComponent("panel-begin",null,array("title"=>"form_title_user"));
$this->generateComponent("file-image-thumbnail", "picture",array("thumbnail-size"=>array(320,240),"collapse"=>false));
$this->generateComponent("textarea", "description");
$this->generateComponent("panel-end");

$this->generateComponent("panel-begin");
$this->generateComponent("text", "name");
$this->generateComponent("username", "username");
$this->generateComponent("password", "password1");
$this->generateComponent("password", "password2");
$this->generateComponent("email", "email");
if($this->isNew){
    $this->generateComponent("select", "id_xyo_user_group");
}
$this->generateComponent("select", "id_xyo_language");
$this->generateComponent("select", "invisible");
$this->generateComponent("select", "enabled");
$this->generateComponent("panel-end");

$this->generateComponent("row-end");


