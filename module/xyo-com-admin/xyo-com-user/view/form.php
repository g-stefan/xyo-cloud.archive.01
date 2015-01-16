<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("row-begin");

$this->generateElement("panel-begin",null,array("title"=>"form_title_user"));
$this->generateElement("file-image-thumbnail", "picture",array("thumbnail-size"=>array(320,240),"collapse"=>false));
$this->generateElement("textarea", "description");
$this->generateElement("panel-end");

$this->generateElement("panel-begin");
$this->generateElement("text", "name");
$this->generateElement("username", "username");
$this->generateElement("password", "password1");
$this->generateElement("password", "password2");
$this->generateElement("email", "email");
if($this->isNew){
    $this->generateElement("select", "id_xyo_user_group");
}
$this->generateElement("select", "id_xyo_language");
$this->generateElement("select", "invisible");
$this->generateElement("select", "enabled");
$this->generateElement("panel-end");

$this->generateElement("row-end");


