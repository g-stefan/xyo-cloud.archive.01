<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setModuleAsApplication($module);
$this->setReferenceLink($module, "xyo-mod-toolbar");
$this->setReferenceLink($module, "xui-alert");
$this->setReferenceLink($module, "xui-responsive");
$this->setReferenceBase($module, "xyo-mod-application");
$this->setVersion($module, "2.0.0");

