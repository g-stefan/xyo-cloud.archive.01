<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("row-begin");

$this->generateElement("panel-begin");
$this->generateElement("text", "name");
$this->generateElement("text", "parent");
$this->generateElement("text", "path");
$this->generateElement("textarea", "description");
$this->generateElement("select", "component");
$this->generateElement("select", "enabled");
$this->generateElement("panel-end");

if($this->isNew){
	$this->generateElement("panel-begin", null,array("title"=>"title_default_acl"));
	$this->generateElement("select", "id_xyo_module_group");
	$this->generateElement("order", "order");
	$this->generateElement("select", "id_xyo_user_group");
	$this->generateElement("select", "id_xyo_core");
	$this->generateElement("select", "acl_enabled");
	$this->generateElement("panel-end");
};

$this->generateElement("row-end");
