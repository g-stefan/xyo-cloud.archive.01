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

.xui.panel{
	position: relative;
	display: block;
	width: 100%;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	box-sizing: border-box;
	border: 0px solid #000000;
	background-color: <?php echo $this->settings["panel-background-color"]; ?>;
	border-radius: 0px;
	overflow: hidden;
}

.xui.panel_title{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;

	border: 0px solid #000000;
	color: <?php echo $this->settings["panel-title-color"]; ?>;
	background-color: <?php echo $this->settings["panel-title-background-color"]; ?>;
	
	min-height: 40px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-right: 10px;
	overflow: hidden;
	font-size: 16px;
	line-height: 20px;
}

.xui.panel_content{
	position: relative;
	display: block;
	width: 100%;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	box-sizing: border-box;
	border: 0px solid #000000;
	color: <?php echo $this->settings["panel-content-color"]; ?>;
	background-color: <?php echo $this->settings["panel-content-background-color"]; ?>;
}

.xui.panel_footer{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;

	border: 0px solid #000000;
	color: <?php echo $this->settings["panel-footer-color"]; ?>;
	background-color: <?php echo $this->settings["panel-footer-background-color"]; ?>;
	
	min-height: 40px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-right: 10px;
	overflow: hidden;
	font-size: 16px;
	line-height: 20px;
}

.xui.panel_line{
	margin-left: 10px;
	margin-right: 10px;
	overflow:hidden;
	height:1px;
	background-color: <?php echo $this->settings["panel-line-color"]; ?>;
	clear: both;
}

@media only screen and (max-width: 599px){
	.xui.panel.-elevation-4 {
		box-shadow: none;
	}
}

@media only screen and (min-width: 600px){

	.xui.panel{
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		border-bottom-left-radius: 3px;
		border-bottom-right-radius: 3px;
		border: 0px solid #000000;
	}

}

</style>
