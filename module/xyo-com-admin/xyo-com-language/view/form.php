<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if(!$this->isDialog){
	$this->generateElement("group-row-begin");
	$this->generateElement("group-begin");
};

$this->generateElement("text", "name");
$this->generateElement("textarea", "description");
$this->generateElement("select", "default");
$this->generateElement("select", "enabled");

if(!$this->isDialog){
	$this->generateElement("group-end");
	$this->generateElement("group-row-end");
};
