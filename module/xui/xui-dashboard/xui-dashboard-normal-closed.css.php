<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.dashboard.-normal.-closed .xui.navigation-drawer {
	width: 72px;
	overflow: visible;
}

.xui.dashboard.-normal.-closed .xui.navigation-drawer >  .xui.navigation-drawer_content {
	overflow: visible;
}

</style>

<?php $this->includeCSSSelector("xui-app-header","xui-app-header-mini",".xui.dashboard.-normal.-closed ",""); ?>
<?php $this->includeCSSSelector("xui-app-user","xui-app-user-mini",".xui.dashboard.-normal.-closed .xui.navigation-drawer ",""); ?>
<?php $this->includeCSSSelector("xui-menu","xui-menu-mini",".xui.dashboard.-normal.-closed .xui.navigation-drawer ",""); ?>

<style>

.xui.dashboard.-normal.-closed .xui.navigation-drawer .xui.app-user {
	width: 100%;
}

.xui.dashboard.-normal.-closed .xui.navigation-drawer .xui.menu:after {
	display: none;
}

.xui.dashboard.-normal.-closed .xui.navigation-drawer  .xui.menu .xui.menu_content > .xui.menu_item.-submenu:hover > .xui.menu_item_content:after{
	box-shadow: inset 0px 1px 0px 0px #DDDDDD, inset -1px 0px 0px 0px #DDDDDD;
}

</style>