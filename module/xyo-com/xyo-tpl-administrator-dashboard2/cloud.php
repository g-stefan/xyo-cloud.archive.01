<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setReferenceLink($module, "lib-mod-jquery-cookie");
$this->setReferenceLink($module, "lib-mod-font-awesome");
$this->setReferenceBase($module, "xyo-mod-application");
$this->setVersion($module, "2.0.0");

$this->setTemplate($module);
$this->setDefaultComponent("xyo-com-main");
