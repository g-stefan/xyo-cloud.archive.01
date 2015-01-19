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
	$setup->registerModule(null, null, "xyo", true, false, null);
	$setup->registerModuleAcl("xyo", "xyo-none", null, null, 0, true);

	$setup->registerModule(null, null, "lib", true, false, null);
	$setup->registerModuleAcl("lib", "xyo-none", null, null, 0, true);

	$setup->registerModule(null, null, "xyo-com", true, false, null);
	$setup->registerModuleAcl("xyo-com", "xyo-none", null, null, 0, true);

	// lib
	$setup->registerModule("lib", null, "lib-mod-md5", true, false, null);
	$setup->registerModuleAcl("lib-mod-md5", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-md5", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-pear-archive-tar", true, false, null);
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-pear-archive-tar", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-select", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-select", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-feedback-left", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-feedback-left", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-smartmenus", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-smartmenus", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-fontawesome", true, false,  null);
	$setup->registerModuleAcl("lib-mod-fontawesome", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-fontawesome", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-datepicker", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-datepicker", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-moment", true, false, null);
	$setup->registerModuleAcl("lib-mod-moment", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-moment", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-datetimepicker", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-datetimepicker", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-datetimepicker", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-fileinput", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-fileinput", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-tinymce", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-tinymce", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-typeahead", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-typeahead", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-stickytableheaders", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-stickytableheaders", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-slimbox2", true, false, null);
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-slimbox2", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-back-to-top", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-back-to-top", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-cookie", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-cookie", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-form", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-jquery-form", true, false, null);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-jquery-form", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-bootstrap-dialog", true, false, null);
	$setup->registerModuleAcl("lib-mod-bootstrap-dialog", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-bootstrap-dialog", "xyo-info-about", null, null, 0, true);

	$setup->registerModule("lib", null, "lib-mod-ionicons", true, false, null);
	$setup->registerModuleAcl("lib-mod-ionicons", "xyo-none", null, null, 0, true);
	$setup->registerModuleAcl("lib-mod-ionicons", "xyo-info-about", null, null, 0, true);

	// xyo
	$setup->registerModule("xyo", null, "xyo-mod-datasource", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-datasource-csv", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource-csv", "xyo-none", null, null, 0,  true);

	$setup->registerModule("xyo", null, "xyo-mod-datasource-mysql", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource-mysql", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-datasource-sqlite", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource-sqlite", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-datasource-xyo", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource-xyo", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-datasource-quantum", true, false, null);
	$setup->registerModuleAcl("xyo-mod-datasource-quantum", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-db", true, false, null);
	$setup->registerModuleAcl("xyo-mod-ds-db", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-loader-mod", true, false, null);
	$setup->registerModuleAcl("xyo-mod-ds-loader-mod", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-acl", true, false, null);
	$setup->registerModuleAcl("xyo-mod-ds-acl", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-ds-user", true, false, null);
	$setup->registerModuleAcl("xyo-mod-ds-user", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-htmlhead", true, false, null);
	$setup->registerModuleAcl("xyo-mod-htmlhead", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-htmlfooter", true, false, null);
	$setup->registerModuleAcl("xyo-mod-htmlfooter", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-language", true, false, null);
	$setup->registerModuleAcl("xyo-mod-language", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-application", true, false, null);
	$setup->registerModuleAcl("xyo-mod-application", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-setup", true, false, null);
	$setup->registerModuleAcl("xyo-mod-setup", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-jsonx", true, false, null);
	$setup->registerModuleAcl("xyo-mod-jsonx", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo", null, "xyo-mod-thumbnail", true, false, null);
	$setup->registerModuleAcl("xyo-mod-thumbnail", "xyo-none", null, null, 0, true);

	// xyo-com
	$setup->registerModule("xyo-com", null, "xyo-mod-panel2", true, false, null);
	$setup->registerModuleAcl("xyo-mod-panel2", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-com", null, "xyo-tpl-administrator", true, false, null);
	$setup->registerModuleAcl("xyo-tpl-administrator", "xyo-template", "administrator", null, 0, true);
	//$setup->selectMouleAclAsTemplate("xyo-tpl-administrator","administrator", null);

	$setup->registerModule("xyo-com", null, "xyo-tpl-administrator-dashboard", true, false, null);
	$setup->registerModuleAcl("xyo-tpl-administrator-dashboard", "xyo-template", "administrator", null, 0, true);
	//$setup->selectMouleAclAsTemplate("xyo-tpl-administrator-dashboard","administrator", null);

	$setup->registerModule("xyo-com", null, "xyo-tpl-administrator-dashboard2", true, false, null);
	$setup->registerModuleAcl("xyo-tpl-administrator-dashboard2", "xyo-template", "administrator", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-administrator-dashboard2","administrator", null);

	$setup->registerModule("xyo-com", null, "xyo-tpl-public", true, false, null);
	$setup->registerModuleAcl("xyo-tpl-public", "xyo-template", "public", null, 0, true);
	$setup->selectMouleAclAsTemplate("xyo-tpl-public","public", null);

	$setup->registerModule("xyo-com", null, "xyo-com-login", true, false, null);
	$setup->registerModuleAcl("xyo-com-login", "xyo-desktop", "administrator", "public", 0, true);

	$setup->registerModule("xyo-com", null, "xyo-mod-sys-menu", true, false, null);
	$setup->registerModuleAcl("xyo-mod-sys-menu", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-com", null, "xyo-mod-sys-panel", true, false, null);
	$setup->registerModuleAcl("xyo-mod-sys-panel", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-com", null, "xyo-mod-sys-sidebar", true, false, null);
	$setup->registerModuleAcl("xyo-mod-sys-sidebar", "xyo-none", null, null, 0, true);

	$setup->registerModule("xyo-com", null, "xyo-com-main", true, true, null);
	$setup->registerModuleAcl("xyo-com-main", "xyo-desktop", null, "authenticated", 0, true);

	$setup->registerModule("xyo-com", null, "xyo-com-control-panel", true, true, null);
	$setup->registerModuleAcl("xyo-com-control-panel", "xyo-application", "administrator", "authenticated", 2, true);

	$setup->registerModule("xyo-com", null, "xyo-com-logout", true, true, null);
	$setup->registerModuleAcl("xyo-com-logout", "xyo-application", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-com", null, "xyo-mod-logout", true, false, null);
	$setup->registerModuleAcl("xyo-mod-logout", "xyo-status", "administrator", "authenticated", 20000, true);

	$setup->registerModule("xyo-com", null, "xyo-com-install", true, true, null);
	$setup->registerModuleAcl("xyo-com-install", "xyo-control-panel", "administrator", "wheel", 1, true);

	$setup->registerModule("xyo-com", null, "xyo-com-info-about", true, true, null);
	$setup->registerModuleAcl("xyo-com-info-about", "xyo-control-panel", "administrator", "authenticated", 10000, true);

	$setup->registerModule("xyo-com", null, "xyo-mod-toolbar", true, false, null);
	$setup->registerModuleAcl("xyo-mod-toolbar","xyo-none",null,null,0,true);

	$setup->registerModule("xyo-com", null, "xyo-com-application", true, true, null);
	$setup->registerModuleAcl("xyo-com-application","xyo-none",null,null,0,true);

	$setup->registerModule("xyo-com", null, "xyo-com-table", true, true, null);
	$setup->registerModuleAcl("xyo-com-table","xyo-none",null,null,0,true);

	//xyo-com-admin
	$setup->registerModule(null, null, "xyo-com-admin", true, true, null);
	$setup->registerModuleAcl("xyo-com-admin","xyo-none", null, null, 0, true);
	$setup->execModuleInstall("xyo-com-admin");

	$setup->registerModule("xyo-com", null, "xyo-mod-form-captcha", true, false, null);
	$setup->registerModuleAcl("xyo-mod-form-captcha","xyo-none",null,null,0,true);
	$setup->execModuleInstall("xyo-mod-form-captcha");


};




