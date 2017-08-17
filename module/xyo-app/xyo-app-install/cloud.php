<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setModuleAsApplication($module);
$this->setReferenceLink($module, "xyo-mod-setup");
$this->setReferenceLink($module, "xyo-mod-panel2");
$this->setReferenceLink($module, "lib-bootstrap-feedback-left");
$this->setReferenceLink($module, "lib-bootstrap-select");
$this->setReferenceBase($module, "xyo-mod-application");
$this->setVersion($module, "2.0.0");