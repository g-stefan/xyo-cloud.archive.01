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

<?php $this->eSuperSelector(); ?>.xui.menu {
	position: relative;
	width: 100%;
	height: auto;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;

	transition: width 0.5s ease;
}

<?php $this->eSuperSelector(); ?>.xui.menu > .xui.menu_content {
	position: relative;
	width: 100%;
	height: auto;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
}

<?php $this->eSuperSelector(); ?>.xui.menu .xui.menu_item {
	position: relative;
	width: 100%;
	height: auto;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
}

<?php $this->eSuperSelector(); ?>.xui.menu .xui.menu_item > .xui.menu_item_content {
	position: relative;
	width: 100%;
	height: auto;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
}

<?php $this->eSuperSelector(); ?>.xui.menu .xui.menu_item > .xui.menu_submenu {
	position: relative;
	width: 100%;
	height: 0px;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
}

<?php $this->eSuperSelector(); ?>.xui.menu .xui.menu_item > xui.menu_submenu > .xui.menu_submenu_content {
	position: relative;
	width: 100%;
	height: auto;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
}

</style>

<?php $this->includeCSS("xui-menu","xui-menu-accordion"); ?>
<?php $this->includeCSS("xui-menu","xui-menu-mini"); ?>
<?php $this->includeCSS("xui-menu","xui-menu-dropdown"); ?>
