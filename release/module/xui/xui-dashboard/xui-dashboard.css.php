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

.xui.dashboard {
	position: relative;
	width: 100%;
	height: 100%;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui.dashboard .xui.navigation-drawer {
	position: relative;
	height: calc(100% - 48px);
	width: 288px;
	overflow: hidden;
	float:left;
	left: 0;
	right: 0;
	transition: width 0.5s ease;	
	z-index: 4;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;

	background-color: #FFFFFF;
}

.xui.dashboard .xui.navigation-drawer:after {
	content: "";	
	display: block;
	position: absolute;	
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset -1px 0px 0px 0px #DDDDDD;
	z-index: 5;
}

.xui.dashboard .xui.navigation-drawer > .xui.navigation-drawer_content{
	position: relative;
	width: 100%;
	height: 100%;
	overflow: auto;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui.dashboard .xui.content {
	position: relative;
	display: block;
	height: calc(100% - 48px);
	width: auto;
	overflow: auto;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;

	transition: width 0.5s ease, margin 0.5s ease;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui.dashboard .xui.navigation-drawer .xui.app-user {
	width: 100%;
}

.xui.dashboard .xui.content-cover{
	position: absolute;
	top: 48px;
	left: 0px;
	width: 100%;
	height: 0px;
	overflow: hidden;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	opacity: 0;
	transition: opacity 0.5s ease;
	background-color: #000000;
	z-index: 3;
	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

</style>

<?php $this->includeCSS("xui-dashboard","xui-dashboard-normal"); ?>
<?php $this->includeCSS("xui-dashboard","xui-dashboard-mini"); ?>
<?php $this->includeCSS("xui-dashboard","xui-dashboard-over"); ?>
