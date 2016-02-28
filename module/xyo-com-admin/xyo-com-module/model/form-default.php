<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setElementValue("id",0);
$this->setElementValue("path","");
$this->setElementValue("name","");
$this->setElementValue("description","");
$this->setElementValue("enabled",1);
$this->setElementValue("parent","");
$this->setElementValue("component",0);

if($this->isNew){
	$this->setElementValue("id_xyo_module_group",0);
	$this->setElementValue("order",0);
	$this->setElementValue("id_xyo_user_group",0);
	$this->setElementValue("id_xyo_core",0);
	$this->setElementValue("acl_enabled",1);
};
