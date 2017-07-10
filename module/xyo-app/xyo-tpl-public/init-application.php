<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->loadModule("xyo-mod-sys-menu");
$this->loadGroup("xyo-desktop");
$this->loadGroup("xyo-status");

$this->setHtmlCss($this->site."media/sys/css/xyo-tpl-public.css");

$this->setHtmlTitle($this->getSetting("website_title","XYO Cloud"));
