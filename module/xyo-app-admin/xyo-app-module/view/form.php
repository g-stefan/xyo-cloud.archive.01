<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->isNew){
	$this->generateComponent("xui.box-1x2-begin");
}else{
	$this->generateComponent("xui.box-1x1-begin");
};

$this->generateComponent("xui.panel-begin");
$this->generateComponent("bootstrap.text", "name");
$this->generateComponent("bootstrap.text", "parent");
$this->generateComponent("bootstrap.text", "path");
$this->generateComponent("bootstrap.textarea", "description");
$this->generateComponent("bootstrap.select", "enabled");
$this->generateComponent("xui.panel-end");


if($this->isNew){
	$this->generateComponent("xui.box-1x2-separator");

	$this->generateComponent("xui.panel-begin", null,array("title"=>"title_default_acl"));
	$this->generateComponent("bootstrap.select", "id_xyo_module_group");
	$this->generateComponent("bootstrap.order", "order");
	$this->generateComponent("bootstrap.select", "id_xyo_user_group");
	$this->generateComponent("bootstrap.select", "id_xyo_core");
	$this->generateComponent("bootstrap.select", "acl_enabled");
	$this->generateComponent("xui.panel-end");

	$this->generateComponent("xui.box-1x2-end");
}else{
	$this->generateComponent("xui.box-1x1-end");
}



