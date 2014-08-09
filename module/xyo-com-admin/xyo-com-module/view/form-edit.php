<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("group-row-begin",null);

$this->generateElement("group-begin",null);
$this->generateElement("text", "name");
$this->generateElement("text", "parent");
$this->generateElement("text", "path");
$this->generateElement("textarea", "description");
$this->generateElement("select", "component");
$this->generateElement("select", "cmd");
$this->generateElement("text", "version");
$this->generateElement("select", "enabled");
$this->generateElement("text", "is_module");
$this->generateElement("group-end",null);

if($this->isNew){
	$this->generateElement("group-begin", null,array("title"=>"title_default_acl"));
	$this->generateElement("select", "id_xyo_module_group");
	$this->generateElement("order", "order");
	$this->generateElement("select", "id_xyo_user_group");
	$this->generateElement("select", "id_xyo_core");
	$this->generateElement("select", "acl_enabled");
	$this->generateElement("group-end",null);
};

$this->generateElement("group-row-end",null);
