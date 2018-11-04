<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

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

.xui.app-header{
	position: relative;
	width: 100%;
	height: 48px;	
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	
	z-index: 4;
}

.xui.app-header > .xui.app-brand {
	float: left;
	width: 288px;
	transition: width 0.5s ease, padding 0.5s ease;	
}

.xui.app-header > .xui.app-brand > .xui.app-brand_content{
	width: 288px;
}

.xui.app-header > .xui.app-bar{
	width: calc(100% - 288px);
	transition: width 0.5s ease;
}

</style>

<?php $this->includeCSS("xui-app-header","xui-app-header-mini"); ?>
