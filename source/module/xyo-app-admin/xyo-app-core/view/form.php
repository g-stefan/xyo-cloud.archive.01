<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if(!$this->isDialog){
	$this->generateComponent("xui.box-1x1-begin");
	$this->generateComponent("xui.panel-begin");
};

$this->generateComponent("xui.form-text-required", array("element" => "name"));
$this->generateComponent("xui.form-textarea", array("element" => "description"));
$this->generateComponent("xui.form-switch", array("element" => "enabled"));

if(!$this->isDialog){
	$this->generateComponent("xui.panel-end");
	$this->generateComponent("xui.box-1x1-end");
};
