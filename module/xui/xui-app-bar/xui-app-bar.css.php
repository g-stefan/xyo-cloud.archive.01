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

.xui.app-bar{
	position: relative;
	width: 100%;
	height: <?php echo $this->settings["app-bar-height"]; ?>px;	
	padding: <?php echo $this->settings["app-bar-padding"]; ?>px
		 <?php echo $this->settings["app-bar-padding"]; ?>px
		 <?php echo $this->settings["app-bar-padding"]; ?>px
		 <?php echo $this->settings["app-bar-padding"]; ?>px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
	
	background-color: <?php echo $this->settings["app-bar-background-color"]; ?>;
	color: <?php echo $this->settings["app-bar-color"]; ?>;
}

.xui.app-bar .xui.button.-effect-ripple:hover{
	background-color: <?php echo $this->settings["app-bar-buton-hover-background-color"]; ?>;
}

.xui.app-bar .xui.button.-effect-ripple > .xui.-effect-ripple_element{
	background-color: <?php echo $this->settings["app-bar-buton-ripple-background-color"]; ?>;
}

</style>
