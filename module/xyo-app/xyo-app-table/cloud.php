<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setModuleAsApplication($module);
$this->setReferenceBase($module, "xyo-app-application");
$this->setReferenceLink($module, "lib-bootstrap-feedback-left");
$this->setReferenceLink($module, "lib-bootstrap-select");
$this->setReferenceLink($module, "lib-font-awesome");
$this->setReferenceLink($module, "lib-jquery-stickytableheaders");
$this->setReferenceLink($module, "lib-jquery-form");
$this->setReferenceLink($module, "lib-izimodal");
$this->setVersion($module, "2.0.0");

