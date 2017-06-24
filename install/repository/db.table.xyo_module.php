<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$setup = &$this->cloud->getModule("xyo-mod-setup");
if ($setup) {

	// base
	$setup->registerModule(null, null, "xyo");
	$setup->registerModuleAcl("xyo", "xyo-none", null, null, 0, true);

	$setup->registerModule(null, null, "lib");
	$setup->registerModuleAcl("lib", "xyo-none", null, null, 0, true);

	$setup->registerModule(null, null, "xyo-app");
	$setup->registerModuleAcl("xyo-app", "xyo-none", null, null, 0, true);

	// lib
	$setup->registerModule("lib", null, "lib-mod-md5");
	$setup->registerModuleAcl("lib-mod-md5", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-md5", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-pear-archive-tar");
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery");
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap");
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-select");
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-feedback-left");
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-smartmenus");
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-font-awesome");
	$setup->registerModuleAcl("lib-mod-font-awesome", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-font-awesome", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-datepicker");
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-moment");
	$setup->registerModuleAcl("lib-mod-moment", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-moment", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-datetimepicker");
	$setup->registerModuleAcl("lib-mod-bootstrap-datetimepicker", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-datetimepicker", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-fileinput");
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-tinymce");
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-typeahead");
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-stickytableheaders");
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-slimbox2");
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-back-to-top");
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-cookie");
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-form");
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-form");
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-dialog");
	$setup->registerModuleAcl("lib-mod-bootstrap-dialog", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-dialog", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-ionicons");
	$setup->registerModuleAcl("lib-mod-ionicons", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-ionicons", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-d3");
	$setup->registerModuleAcl("lib-mod-d3", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-d3", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-material-icons");
	$setup->registerModuleAcl("lib-mod-material-icons", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-material-icons", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-nvd3");
	$setup->registerModuleAcl("lib-mod-nvd3", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-nvd3", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-roboto-regular");
	$setup->registerModuleAcl("lib-mod-roboto-regular", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-roboto-regular", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-material-components-web");
	$setup->registerModuleAcl("lib-mod-material-components-web", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-material-components-web", "xyo-info-about", null, null, 0, true);

	// xyo
	$setup->registerModule("xyo", null, "xyo-mod-ds-loader-mod");
	$setup->registerModuleAcl("xyo-mod-ds-loader-mod", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-acl");
	$setup->registerModuleAcl("xyo-mod-ds-acl", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-user");
	$setup->registerModuleAcl("xyo-mod-ds-user", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-application");
	$setup->registerModuleAcl("xyo-mod-application", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-setup");
	$setup->registerModuleAcl("xyo-mod-setup", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-jsonx");
	$setup->registerModuleAcl("xyo-mod-jsonx", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-thumbnail");
	$setup->registerModuleAcl("xyo-mod-thumbnail", "xyo-none", null, null, 0, true);


	// xyo-app
	$setup->registerModule("xyo-app", null, "xyo-mod-panel2");
	$setup->registerModuleAcl("xyo-mod-panel2", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-tpl-administrator");
	$setup->registerModuleAcl("xyo-tpl-administrator", "xyo-template", "administrator", null, 0, true);
	//$setup->selectMouleAclAsTemplate("xyo-tpl-administrator","administrator", null);

	$setup->registerModule("xyo-app", null, "xyo-tpl-administrator-dashboard");
	$setup->registerModuleAcl("xyo-tpl-administrator-dashboard", "xyo-template", "administrator", null, 0, true);
	//$setup->selectMouleAclAsTemplate("xyo-tpl-administrator-dashboard","administrator", null);

	$setup->registerModule("xyo-app", null, "xyo-tpl-administrator-dashboard2");
	$setup->registerModuleAcl("xyo-tpl-administrator-dashboard2", "xyo-template", "administrator", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-administrator-dashboard2","administrator", null);

	$setup->registerModule("xyo-app", null, "xyo-tpl-public");
	$setup->registerModuleAcl("xyo-tpl-public", "xyo-template", "public", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-public","public", null);

	$setup->registerModule("xyo-app", null, "xyo-app-login");
	$setup->registerModuleAcl("xyo-app-login", "xyo-desktop", "administrator", "public", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-menu");
	$setup->registerModuleAcl("xyo-mod-sys-menu", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-panel");
	$setup->registerModuleAcl("xyo-mod-sys-panel", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-sys-sidebar");
	$setup->registerModuleAcl("xyo-mod-sys-sidebar", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-main");
	$setup->registerModuleAcl("xyo-app-main", "xyo-desktop", null, "authenticated", 0, true);

	$setup->registerModule("xyo-app", null, "xyo-app-control-panel");
	$setup->registerModuleAcl("xyo-app-control-panel", "xyo-application", "administrator", "authenticated", 2, true);

	$setup->registerModule("xyo-app", null, "xyo-app-logout");
	$setup->registerModuleAcl("xyo-app-logout", "xyo-application", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-logout");
	$setup->registerModuleAcl("xyo-mod-logout", "xyo-status", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-app", null, "xyo-app-install");
	$setup->registerModuleAcl("xyo-app-install", "xyo-control-panel", "administrator", "wheel", 1, true);

	$setup->registerModule("xyo-app", null, "xyo-app-info-about");
	$setup->registerModuleAcl("xyo-app-info-about", "xyo-control-panel", "administrator", "authenticated", 10000, true);

	$setup->registerModule("xyo-app", null, "xyo-mod-toolbar");
	$setup->registerModuleAcl("xyo-mod-toolbar","xyo-none",null,null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-application");
	$setup->registerModuleAcl("xyo-app-application","xyo-none",null,null,0,true);

	$setup->registerModule("xyo-app", null, "xyo-app-table");
	$setup->registerModuleAcl("xyo-app-table","xyo-none",null,null,0,true);

	//xyo-app-admin
	$setup->registerModule(null, null, "xyo-app-admin");
	$setup->registerModuleAcl("xyo-app-admin","xyo-none", null, null, 0, true);
	$setup->execModuleInstall("xyo-app-admin");

	$setup->registerModule("xyo-app", null, "xyo-mod-form-captcha");
	$setup->registerModuleAcl("xyo-mod-form-captcha","xyo-none",null,null,0,true);
	$setup->execModuleInstall("xyo-mod-form-captcha");

	//xyo-cms
	$setup->registerModule(null, null, "xyo-cms");
	$setup->registerModuleAcl("xyo-cms","xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-cms", null, "xyo-mod-cms-page");
	$setup->registerModuleAcl("xyo-mod-cms-page", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-cms", null, "xyo-app-cms-page");
	$setup->registerModuleAcl("xyo-app-cms-page", "xyo-desktop", "administrator", "authenticated", 100, true);

	$setup->registerModule("xyo-cms", null, "xyo-tpl-cms");
	$setup->registerModuleAcl("xyo-tpl-cms", "xyo-template", "public", null, 0, true);

};




