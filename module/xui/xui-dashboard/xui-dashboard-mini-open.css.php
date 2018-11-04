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

.xui.dashboard.-mini.-open .xui.navigation-drawer {
	position: absolute;
	width: 288px;
	overflow: hidden;
}

.xui.dashboard.-mini.-open .xui.navigation-drawer > .xui.navigation-drawer_content {
	overflow: auto;
}

.xui.dashboard.-mini.-open .xui.content-cover {
	height: 100%;
	opacity: 0.4;
}

</style>

<?php $this->includeCSSSelector("xui-menu","xui-menu-accordion",".xui.dashboard.-mini.-open .xui.navigation-drawer ",""); ?>

<style>

.xui.dashboard.-mini.-open .xui.navigation-drawer .xui.menu:after {
	display: none;
}

.xui.dashboard.-mini.-open .xui.navigation-drawer .xui.app-user {
	width: 100%;
}

</style>

