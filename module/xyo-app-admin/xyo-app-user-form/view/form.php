<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.box-1x2-begin");
$this->generateComponent("xui.panel-begin",array("title"=> "form_title_user"));

$this->generateComponent("bootstrap.file-image-thumbnail", array("element" => "picture","thumbnail-size"=>array(320,240),"collapse"=>false));
$this->generateComponent("bootstrap.textarea", array("element" => "description"));

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x2-separator");
$this->generateComponent("xui.panel-begin");

$this->generateComponent("bootstrap.text", array("element" => "name"));
$this->generateComponent("bootstrap.username", array("element" => "username"));
$this->generateComponent("bootstrap.password", array("element" => "password1"));
$this->generateComponent("bootstrap.password", array("element" => "password2"));
$this->generateComponent("bootstrap.email", array("element" => "email"));
$this->generateComponent("bootstrap.select", array("element" => "id_xyo_language"));

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x2-begin");
