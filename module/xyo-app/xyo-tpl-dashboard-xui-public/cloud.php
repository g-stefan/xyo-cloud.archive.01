<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setReferenceLink($module, "xyo-mod-xui-sidebar");
$this->setReferenceLink($module, "lib-font-awesome");

$this->setReferenceBase($module, "xyo-mod-application");
$this->setVersion($module, "3.0.0");

$this->setTemplate($module);
$this->setDefaultApplication("xyo-app-dashboard");

//
//
//
$this->setReferenceLink($module, "lib-material-icons");
//
$this->setReferenceLink($module, "xui-core");
$this->setReferenceLink($module, "xui-effect-ripple");
$this->setReferenceLink($module, "xui-color");
$this->setReferenceLink($module, "xui-palette");
$this->setReferenceLink($module, "xui-elevation");
$this->setReferenceLink($module, "xui-responsive");
$this->setReferenceLink($module, "xui-typography");
$this->setReferenceLink($module, "xui-toggle");
$this->setReferenceLink($module, "xui-box");
$this->setReferenceLink($module, "xui-panel");
$this->setReferenceLink($module, "xui-toolbar");
$this->setReferenceLink($module, "xui-application");
$this->setReferenceLink($module, "xui-dashboard");
//
$this->setReferenceLink($module, "xui-complete");
