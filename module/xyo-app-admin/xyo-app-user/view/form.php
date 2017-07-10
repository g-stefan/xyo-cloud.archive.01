<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("bootstrap.row-begin");

$this->generateComponent("bootstrap.panel-begin",null,array("title"=>"form_title_user"));
$this->generateComponent("bootstrap.file-image-thumbnail", "picture",array("thumbnail-size"=>array(320,240),"collapse"=>false));
$this->generateComponent("bootstrap.textarea", "description");
$this->generateComponent("bootstrap.panel-end");

$this->generateComponent("bootstrap.panel-begin");
$this->generateComponent("bootstrap.text", "name");
$this->generateComponent("bootstrap.username", "username");
$this->generateComponent("bootstrap.password", "password1");
$this->generateComponent("bootstrap.password", "password2");
$this->generateComponent("bootstrap.email", "email");
if($this->isNew){
    $this->generateComponent("bootstrap.select", "id_xyo_user_group");
}
$this->generateComponent("bootstrap.select", "id_xyo_language");
$this->generateComponent("bootstrap.select", "invisible");
$this->generateComponent("bootstrap.select", "enabled");
$this->generateComponent("bootstrap.panel-end");

$this->generateComponent("bootstrap.row-end");


