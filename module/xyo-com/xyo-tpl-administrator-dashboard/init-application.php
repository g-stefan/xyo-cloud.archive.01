<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->loadModule("xyo-mod-sys-menu");
$this->loadModule("lib-mod-bootstrap-back-to-top");
$this->loadGroup("xyo-desktop");
$this->loadGroup("xyo-status");

$this->setHtmlHeadHttpEquiv("Content-Type", "text/html; charset=utf-8");
$this->setHtmlHeadTitle($this->getSetting("website_title","XYO Cloud"));
$this->setHtmlHeadLink("shortcut icon","media/sys/images/applications-internet.ico","image/x-icon");
$this->setHtmlHeadCss("media/sys/css/xyo-tpl-administrator-dashboard.css");
$this->setHtmlFooterJs("media/sys/js/xyo-tpl-administrator-dashboard.js");
