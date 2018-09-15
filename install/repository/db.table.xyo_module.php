<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$setup = &$this->cloud->getModule("xyo-mod-setup");
if ($setup) {

	// xui
	$setup->registerModule(null, null, "xui");
	$setup->registerModuleAcl("xui", "xyo-none", null, null, 0, true);

	$setup->registerModule("xui", null, "xui-app-xui");
	$setup->registerModuleAcl("xui-app-xui", "xyo-control-panel", "administrator", "wheel", 300, true);

	// xyo-app
	$setup->registerModule(null, null, "xyo-app");
	$setup->registerModuleAcl("xyo-app", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-dashboard");
	$setup->registerModuleAcl("xyo-app-dashboard", "xyo-desktop", null, "authenticated", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-tpl-dashboard-xui-administrator");
	$setup->registerModuleAcl("xyo-tpl-dashboard-xui-administrator", "xyo-template", "administrator", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-dashboard-xui-administrator", "administrator", null);

	$setup->registerModule("xyo-app", null, "xyo-tpl-dashboard-xui-public");
	$setup->registerModuleAcl("xyo-tpl-dashboard-xui-public", "xyo-template", "public", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-dashboard-xui-public", "public", null);

	$setup->registerModule("xyo-app", null, "xyo-app-login");
	$setup->registerModuleAcl("xyo-app-login", "xyo-none", "administrator", "public", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-menu");
	$setup->registerModuleAcl("xyo-mod-sys-menu", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-panel");
	$setup->registerModuleAcl("xyo-mod-sys-panel", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-sidebar");
	$setup->registerModuleAcl("xyo-mod-sys-sidebar", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-control-panel");
	$setup->registerModuleAcl("xyo-app-control-panel", "xyo-desktop", "administrator", "authenticated", 2, true);

	$setup->registerModule("xyo-app", null, "xyo-app-logout");
	$setup->registerModuleAcl("xyo-app-logout", "xyo-control-panel", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-logout");
	$setup->registerModuleAcl("xyo-mod-logout", "xyo-status", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-app-install");
	$setup->registerModuleAcl("xyo-app-install", "xyo-control-panel", "administrator", "wheel", 1, true);

	$setup->registerModule("xyo-app", null, "xyo-app-info-about");
	$setup->registerModuleAcl("xyo-app-info-about", "xyo-control-panel", "administrator", "authenticated", 10000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-toolbar");
	$setup->registerModuleAcl("xyo-mod-toolbar","xyo-none",null,null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-application");
	$setup->registerModuleAcl("xyo-app-application","xyo-none", null,null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-table");
	$setup->registerModuleAcl("xyo-app-table","xyo-none", null, null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-mod-status-ajax");
	$setup->registerModuleAcl("xyo-mod-status-ajax", "xyo-status", "administrator", "authenticated", 40000, true);

	//xyo-app-admin
	$setup->registerModule(null, null, "xyo-app-admin");
	$setup->registerModuleAcl("xyo-app-admin","xyo-none", null, null, 0, true);
	$setup->runModuleInstall("xyo-app-admin");

	$setup->includeConfig("xyo-cloud.install.local");
};


