<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("row-begin");

$this->generateComponent("panel-begin");
$this->generateComponent("text", "name");
$this->generateComponent("text", "parent");
$this->generateComponent("text", "path");
$this->generateComponent("textarea", "description");
$this->generateComponent("select", "enabled");
$this->generateComponent("panel-end");

if($this->isNew){
	$this->generateComponent("panel-begin", null,array("title"=>"title_default_acl"));
	$this->generateComponent("select", "id_xyo_module_group");
	$this->generateComponent("order", "order");
	$this->generateComponent("select", "id_xyo_user_group");
	$this->generateComponent("select", "id_xyo_core");
	$this->generateComponent("select", "acl_enabled");
	$this->generateComponent("panel-end");
};

$this->generateComponent("row-end");
