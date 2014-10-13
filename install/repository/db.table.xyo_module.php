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
	$setup->registerModule(null, null, "xyo", true, false, false, null, null);
	$setup->registerModuleAcl("xyo", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo");

	$setup->registerModule(null, null, "lib", true, false, false, null, null);
	$setup->registerModuleAcl("lib", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("lib");

	$setup->registerModule(null, null, "xyo-com", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-com", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-com");

	// lib
	$setup->registerModule("lib", null, "lib-mod-md5", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-md5", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-md5", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-md5");

	$setup->registerModule("lib", null, "lib-mod-pear-archive-tar", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-pear-archive-tar");

	$setup->registerModule("lib", null, "lib-mod-jquery", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-jquery");

	$setup->registerModule("lib", null, "lib-mod-bootstrap", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-select", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-select");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-feedback-left", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-feedback-left");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-smartmenus", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-smartmenus");

	$setup->registerModule("lib", null, "lib-mod-fontawesome", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-fontawesome", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-fontawesome", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-fontawesome");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-datepicker", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-datepicker");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-fileinput", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-fileinput");

	$setup->registerModule("lib", null, "lib-mod-jquery-tinymce", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-jquery-tinymce");

	$setup->registerModule("lib", null, "lib-mod-jquery-typeahead", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-jquery-typeahead");

	$setup->registerModule("lib", null, "lib-mod-jquery-stickytableheaders", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-jquery-stickytableheaders");

	$setup->registerModule("lib", null, "lib-mod-slimbox2", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-slimbox2");

	$setup->registerModule("lib", null, "lib-mod-bootstrap-back-to-top", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-bootstrap-back-to-top");

	$setup->registerModule("lib", null, "lib-mod-jquery-cookie", true, false, false, null, null);
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-info-about", null, null, 0, true);
	$setup->linkModuleVersion("lib-mod-jquery-cookie");

	// xyo
	$setup->registerModule("xyo", null, "xyo-mod-datasource", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-datasource");

	$setup->registerModule("xyo", null, "xyo-mod-datasource-csv", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource-csv", "xyo-none", null, null, 0,  true);
	$setup->linkModuleVersion("xyo-mod-datasource-csv");

	$setup->registerModule("xyo", null, "xyo-mod-datasource-mysql", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource-mysql", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-datasource-mysql");

	$setup->registerModule("xyo", null, "xyo-mod-datasource-sqlite", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource-sqlite", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-datasource-sqlite");

	$setup->registerModule("xyo", null, "xyo-mod-datasource-xyo", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource-xyo", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-datasource-xyo");

	$setup->registerModule("xyo", null, "xyo-mod-datasource-quantum", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-datasource-quantum", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-datasource-quantum");

	$setup->registerModule("xyo", null, "xyo-mod-ds-db", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-ds-db", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-ds-db");

	$setup->registerModule("xyo", null, "xyo-mod-ds-loader-ds", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-ds-loader-ds", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-ds-loader-ds");

	$setup->registerModule("xyo", null, "xyo-mod-ds-loader-mod", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-ds-loader-mod", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-ds-loader-mod");

	$setup->registerModule("xyo", null, "xyo-mod-ds-acl", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-ds-acl", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-ds-acl");

	$setup->registerModule("xyo", null, "xyo-mod-ds-user", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-ds-user", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-ds-user");

	$setup->registerModule("xyo", null, "xyo-mod-htmlhead", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-htmlhead", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-htmlhead");

	$setup->registerModule("xyo", null, "xyo-mod-htmlfooter", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-htmlfooter", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-htmlfooter");

	$setup->registerModule("xyo", null, "xyo-mod-language", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-language", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-language");

	$setup->registerModule("xyo", null, "xyo-mod-application", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-application", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-application");

	$setup->registerModule("xyo", null, "xyo-mod-setup", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-setup", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-setup");

	$setup->registerModule("xyo", null, "-xyo-exec-", true, false, false, "2.0.0", null);
	$setup->registerModuleAcl("-xyo-exec-", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-jsonx", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-jsonx", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-jsonx");

	$setup->registerModule("xyo", null, "xyo-mod-thumbnail", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-thumbnail", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-thumbnail");

	// xyo-com
	$setup->registerModule("xyo-com", null, "xyo-mod-panel2", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-panel2", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-panel2");

	$setup->registerModule("xyo-com", null, "xyo-tpl-administrator", true, false, false, null, null);
	$setup->linkModuleVersion("xyo-tpl-administrator");
	$setup->registerModuleAcl("xyo-tpl-administrator", "xyo-template", "administrator", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-administrator","administrator", null);

	$setup->registerModule("xyo-com", null, "xyo-tpl-public", true, false, false, null, null);
	$setup->linkModuleVersion("xyo-tpl-public");
	$setup->registerModuleAcl("xyo-tpl-public", "xyo-template", "public", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-public","public", null);

	$setup->registerModule("xyo-com", null, "xyo-com-login", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-login", "xyo-desktop", "administrator", "public", 0, true);
	$setup->linkModuleVersion("xyo-com-login");

	$setup->registerModule("xyo-com", null, "xyo-mod-sys-menu", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-sys-menu", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-sys-menu");

	$setup->registerModule("xyo-com", null, "xyo-mod-sys-panel", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-sys-panel", "xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-mod-sys-panel");

	$setup->registerModule("xyo-com", null, "xyo-com-main", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-main", "xyo-desktop", null, "authenticated", 0, true);
	$setup->linkModuleVersion("xyo-com-main");

	$setup->registerModule("xyo-com", null, "xyo-com-control-panel", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-control-panel", "xyo-application", "administrator", "authenticated", 2, true);
	$setup->linkModuleVersion("xyo-com-control-panel");

	$setup->registerModule("xyo-com", null, "xyo-com-logout", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-logout", "xyo-application", "administrator", "authenticated", 20000, true);
	$setup->linkModuleVersion("xyo-com-logout");

	$setup->registerModule("xyo-com", null, "xyo-mod-logout", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-mod-logout", "xyo-status", "administrator", "authenticated", 20000, true);
	$setup->linkModuleVersion("xyo-mod-logout");

	$setup->registerModule("xyo-com", null, "xyo-com-install", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-install", "xyo-control-panel", "administrator", "wheel", 1, true);
	$setup->linkModuleVersion("xyo-com-install");

	$setup->registerModule("xyo-com", null, "xyo-com-info-about", true, false, true, null, null);
	$setup->registerModuleAcl("xyo-com-info-about", "xyo-control-panel", "administrator", "authenticated", 10000, true);
	$setup->linkModuleVersion("xyo-com-info-about");

	$setup->registerModule("xyo-com", null, "xyo-mod-toolbar", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-toolbar","xyo-none",null,null,0,true);
	$setup->linkModuleVersion("xyo-mod-toolbar");

	$setup->registerModule("xyo-com", null, "xyo-com-application", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-com-application","xyo-none",null,null,0,true);
	$setup->linkModuleVersion("xyo-com-application");
	$setup->execModuleInstall("xyo-com-application");

	$setup->registerModule("xyo-com", null, "xyo-com-table", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-com-table","xyo-none",null,null,0,true);
	$setup->linkModuleVersion("xyo-com-table");

	//xyo-com-admin
	$setup->registerModule(null, null, "xyo-com-admin", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-com-admin","xyo-none", null, null, 0, true);
	$setup->linkModuleVersion("xyo-com-admin");
	$setup->execModuleInstall("xyo-com-admin");

	$setup->registerModule("xyo-com", null, "xyo-mod-form-captcha", true, false, false, null, null);
	$setup->registerModuleAcl("xyo-mod-form-captcha","xyo-none",null,null,0,true);
	$setup->linkModuleVersion("xyo-mod-form-captcha");
	$setup->execModuleInstall("xyo-mod-form-captcha");


};




