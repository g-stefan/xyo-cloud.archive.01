<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setReferenceLink($module, "xyo-mod-xui-sidebar");
$this->setReferenceLink($module, "lib-font-awesome");
$this->setReferenceLink($module, "lib-xui");
$this->setReferenceLink($module, "lib-xui-theme");

$this->setReferenceBase($module, "xyo-mod-application");
$this->setVersion($module, "2.0.0");

$this->setTemplate($module);
$this->setDefaultApplication("xyo-app-dashboard");
