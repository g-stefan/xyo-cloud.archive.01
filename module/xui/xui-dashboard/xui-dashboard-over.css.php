<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<?php $this->includeCSSSelector("xui-app-header","xui-app-header-mini",".xui.dashboard.-over ",""); ?>

<style>

.xui.dashboard.-over .xui.app-header > .xui.app-brand{
	width: 0px;
	padding-left: 0px;
	padding-right: 0px;
}

.xui.dashboard.-over .xui.app-header > .xui.app-bar{
	width: 100%;	
}

.xui.dashboard.-over .xui.content {
	width: 100%;
}

</style>

<?php $this->includeCSSSelector("xui-menu","xui-menu-accordion",".xui.dashboard.-over .xui.navigation-drawer ",""); ?>

<style>

.xui.dashboard.-over .xui.navigation-drawer .xui.menu > .xui.menu_content {
	width: 100%;
}

.xui.dashboard.-over .xui.navigation-drawer .xui.menu:after {
	display: none;
}

</style>

<?php $this->includeCSS("xui-dashboard","xui-dashboard-over-closed"); ?>
<?php $this->includeCSS("xui-dashboard","xui-dashboard-over-open"); ?>
