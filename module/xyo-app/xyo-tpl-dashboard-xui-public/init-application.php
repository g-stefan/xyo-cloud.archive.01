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

$this->setHtmlTitle($this->getSetting("website_title","XYO Cloud"));

$this->requireComponent("xui.dashboard.main-begin");
$this->requireComponent("xui.dashboard.main-end");
$this->requireComponent("xui.dashboard.app-bar-begin");
$this->requireComponent("xui.dashboard.app-bar-end");
$this->requireComponent("xui.dashboard.app-bar-navigation-drawer-toggle");
$this->requireComponent("xui.dashboard.app-bar-app-title");
$this->requireComponent("xui.dashboard.brand-begin");
$this->requireComponent("xui.dashboard.brand-end");
$this->requireComponent("xui.dashboard.navigation-drawer-begin");
$this->requireComponent("xui.dashboard.navigation-drawer-end");
$this->requireComponent("xui.dashboard.navigation-drawer-menu");
$this->requireComponent("xui.dashboard.user-begin");
$this->requireComponent("xui.dashboard.user-end");
$this->requireComponent("xui.dashboard.content-begin");
$this->requireComponent("xui.dashboard.content-end");

