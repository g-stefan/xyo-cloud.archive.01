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

.xui.application{
	position: relative;
	width: 100%;
	height: 100%;
	overflow: visible;
	box-sizing: border-box;
}

.xui.application > .xui.application_content{
	position: relative;
	width: 100%;
	height: 100%;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	overflow: auto;
	border: 0px solid #000000;
}

.xui.application.-has-toolbar > .xui.application_content{
	height: calc(100% - 48px);
	border-top: 1px solid <?php echo $this->settings["context-default-color"]; ?>;
}

.xui.application.-has-toolbar.-has-message > .xui.application_content{
	height: calc(100% - 96px );
	border: 0px solid #000000;
}

.xui.application > .xui.alert{
	border-radius: 0px;
	border-left: 0px;
	border-right: 0px;
}

</style>
