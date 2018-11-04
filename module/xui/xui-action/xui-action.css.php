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

.xui.action {
	position: relative;
	width: 100%;
	height: 40px;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	display: block;
	text-decoration: none;
	color: #000000;
	background-color: #FFFFFF;	
}

a.xui.action:visited {
	color: #000000;
}

a.xui.action:hover {
	color: #000000;
}

a.xui.action:active {
	color: #000000;
}

.xui.action .xui.action_content {
	position: relative;
	width: 100%;
	height: 40px;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;	
}

.xui.action .xui.action_left {
	float: left;
	box-sizing: border-box;
	height: 28px;
	width: 4px;
	margin-left: 0px;
	margin-top: 6px;
	margin-bottom: 6px;
	margin-right: 12px;	
}

.xui.action .xui.action_icon-left {
	float: left;
	box-sizing: border-box;
	height: 24px;
	width: 24px;
	margin-left: 8px;
	margin-top: 8px;
	margin-bottom: 8px;
	margin-right: 8px;
	color: #888888;
	transition: color 0.3s ease;
}

.xui.action .xui.action_text {
	float: left;
	box-sizing: border-box;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;

	margin-left: 24px;	
	margin-top: 8px;
	margin-bottom: 8px;
	margin-right: 8px;

	line-height: 24px;
	font-size: 16px;
}

.xui.action .xui.action_icon-right {
	float: right;
	box-sizing: border-box;
	height: 24px;
	width: 24px;
	margin-left: 8px;
	margin-top: 8px;
	margin-bottom: 8px;
	margin-right: 8px;
	transition: transform 0.5s ease;
}

.xui.action:hover {
	background-color: <?php echo $this->settings["action-hover-background-color"]; ?>;
}

.xui.action:hover > .xui.-effect-ripple_element{
	background-color: <?php echo $this->settings["action-hover-ripple-background-color"]; ?>;
}

.xui.action:hover .xui.action_icon-left{
	color: #000000;
}

.xui.action.-selected {
	background-color: <?php echo $this->settings["action-selected-background-color"]; ?>;
}

.xui.action.-selected .xui.action_left {
	background-color: <?php echo $this->settings["action-selected-left-color"]; ?>;
}

.xui.action.-selected .xui.action_icon-left {
	color: <?php echo $this->settings["action-selected-icon-left-color"]; ?>;
}

.xui.action.-selected:hover {
	background-color: <?php echo $this->settings["action-selected-hover-background-color"]; ?>;
}

.xui.action.-selected:hover > .xui.-effect-ripple_element{
	background-color: <?php echo $this->settings["action-selected-hover-ripple-background-color"]; ?>;
}

.xui.action.-active .xui.action_icon-right {
    transform: rotate(90deg);
}

</style>

