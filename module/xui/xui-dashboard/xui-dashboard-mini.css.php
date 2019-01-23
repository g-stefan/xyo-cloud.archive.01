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

<style>

.xui.dashboard.-mini .xui.navigation-drawer >  .xui.navigation-drawer_content {
	overflow: visible;
}

.xui.dashboard.-mini .xui.content {
	transition: none;
	left: 72px;
	width: calc(100% - 72px);
}

</style>

<?php $this->includeCSSSelector("xui-app-header","xui-app-header-mini",".xui.dashboard.-mini ",""); ?>

<?php $this->includeCSS("xui-dashboard","xui-dashboard-mini-closed"); ?>
<?php $this->includeCSS("xui-dashboard","xui-dashboard-mini-open"); ?>

<style>

.xui.dashboard.-mini .xui.navigation-drawer .xui.menu:after {
	display: none;
}

.xui.dashboard.-mini .xui.navigation-drawer .xui.app-user {
	width: 100%;
}

</style>

