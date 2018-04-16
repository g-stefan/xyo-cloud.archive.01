<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$setup = &$this->cloud->getModule("xyo-mod-setup");
if ($setup) {

	// xyo-app
	$setup->registerModule(null, null, "xyo-app");
	$setup->registerModuleAcl("xyo-app", "xyo-none", null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-dashboard");
	$setup->registerModuleAcl("xyo-app-dashboard", "xyo-desktop", "authenticated", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-tpl-dashboard-xui");
	$setup->registerModuleAcl("xyo-tpl-dashboard-xui", "xyo-template", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-dashboard-xui", null);

	$setup->registerModule("xyo-app", null, "xyo-app-login");
	$setup->registerModuleAcl("xyo-app-login", "xyo-none", "public", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-menu");
	$setup->registerModuleAcl("xyo-mod-sys-menu", "xyo-none", null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-panel");
	$setup->registerModuleAcl("xyo-mod-sys-panel", "xyo-none", null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-sidebar");
	$setup->registerModuleAcl("xyo-mod-sys-sidebar", "xyo-none", null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-control-panel");
	$setup->registerModuleAcl("xyo-app-control-panel", "xyo-desktop", "authenticated", 2, true);

	$setup->registerModule("xyo-app", null, "xyo-app-logout");
	$setup->registerModuleAcl("xyo-app-logout", "xyo-control-panel", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-logout");
	$setup->registerModuleAcl("xyo-mod-logout", "xyo-status", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-app-install");
	$setup->registerModuleAcl("xyo-app-install", "xyo-control-panel", "wheel", 1, true);

	$setup->registerModule("xyo-app", null, "xyo-app-info-about");
	$setup->registerModuleAcl("xyo-app-info-about", "xyo-control-panel", "authenticated", 10000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-toolbar");
	$setup->registerModuleAcl("xyo-mod-toolbar","xyo-none",null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-application");
	$setup->registerModuleAcl("xyo-app-application","xyo-none", null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-table");
	$setup->registerModuleAcl("xyo-app-table","xyo-none", null,0,true);

	//xyo-app-admin
	$setup->registerModule(null, null, "xyo-app-admin");
	$setup->registerModuleAcl("xyo-app-admin","xyo-none", null, 0, true);
	$setup->execModuleInstall("xyo-app-admin");

};


