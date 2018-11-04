<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setModuleAsApplication($module);
$this->setVersion($module, "1.0.0");

$this->setReferenceLink($module, "xui-context");
$this->setReferenceLink($module, "xui-core");
$this->setReferenceLink($module, "xui-text");
$this->setReferenceLink($module, "xui-form-text");
$this->setReferenceLink($module, "xui-form-checkbox");
