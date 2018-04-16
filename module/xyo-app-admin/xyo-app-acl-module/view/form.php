<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if(!$this->isDialog){
	$this->generateComponent("xui.box-1x1-begin");
	$this->generateComponent("xui.panel-begin");
};

if ($this->id_xyo_module) {
    
} else {
	$this->generateComponent("xui.form-select", array("element" => "id_xyo_module"));
}


if ($this->id_xyo_module_group) {
    
} else {
	$this->generateComponent("xui.form-select", array("element" => "id_xyo_module_group"));
}

$this->generateComponent("xui.form-order", array("element" => "order"));
$this->generateComponent("xui.form-select", array("element" => "id_xyo_user_group"));
$this->generateComponent("xui.form-switch", array("element" => "enabled"));

if(!$this->isDialog){
	$this->generateComponent("xui.panel-end");
	$this->generateComponent("xui.box-1x1-end");
};

