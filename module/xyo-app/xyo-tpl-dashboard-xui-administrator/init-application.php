<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->loadModule("xyo-mod-sys-menu");
$this->loadGroup("xyo-desktop");
$this->loadGroup("xyo-status");

$this->setHtmlClass("xui");
$this->setHtmlBodyClass("xui");
$this->setHtmlTitle($this->getSetting("website_title","XYO Cloud"));
$this->setHtmlIcon($this->site."lib/xyo/images/applications-internet.ico");
