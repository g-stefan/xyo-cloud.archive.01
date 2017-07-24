<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.box-1x2-begin");
$this->generateComponent("xui.panel-begin",null,array("title"=>"form_title_user"));

$this->generateComponent("bootstrap.file-image-thumbnail", "picture",array("thumbnail-size"=>array(320,240),"collapse"=>false));
$this->generateComponent("bootstrap.textarea", "description");

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x2-separator");
$this->generateComponent("xui.panel-begin");

$this->generateComponent("bootstrap.text", "name");
$this->generateComponent("bootstrap.username", "username");
$this->generateComponent("bootstrap.password", "password1");
$this->generateComponent("bootstrap.password", "password2");
$this->generateComponent("bootstrap.email", "email");
$this->generateComponent("bootstrap.select", "id_xyo_language");

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x2-begin");
