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

$this->setReferenceLink($module, "xui-palette");
$this->setReferenceLink($module, "xui-button");
