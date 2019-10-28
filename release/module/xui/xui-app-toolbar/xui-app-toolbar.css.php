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

.xui.app-toolbar{
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
	
	background-color: <?php echo $this->settings["app-toolbar-background-color"]; ?>;
	color: <?php echo $this->settings["app-toolbar-color"]; ?>;
}

.xui.app-toolbar_content{
	display: inline-block;
	float: right;
	box-sizing: border-box;
}

.xui.app-toolbar_button{
	float: left;
	display: inline-block;
	position: relative;
	border-radius: 3px;
	width: auto;
	height: 40px;	
	padding-left: 8px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 8px;
	overflow: hidden;
	cursor: pointer;
	font-size: 24px;
	line-height: 24px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;	

	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.xui.app-toolbar_button_icon{
	float:left;
	position: relative;
	font-size: 24px;
	line-height: 24px;
	color: #888888;
	transition: color 0.3s ease;
}

.xui.app-toolbar_button_text{
	float:left;
	position: relative;
	padding-left: 8px;
	padding-right: 8px;
	padding-top: 2px;
	padding-bottom: 2px;
	font-size: 16px;
	line-height: 20px;
	color: #000000;
}

.xui.app-toolbar_button:hover .xui.app-toolbar_button_icon{
	color: #000000;
}

.xui.app-toolbar_button:hover{
	background-color: <?php echo $this->settings["app-toolbar-buton-hover-background-color"]; ?>;
}

.xui.app-toolbar_button.-effect-ripple > .xui.-effect-ripple_element{
	background-color: <?php echo $this->settings["app-toolbar-buton-ripple-background-color"]; ?>;
}

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.app-toolbar_button<?php echo $selector; ?> .xui.app-toolbar_button_icon{
	color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.app-toolbar_button<?php echo $selector; ?>:hover .xui.app-toolbar_button_icon{
	color: <?php echo $this->color->rgbHexHSLAdjustL($this->settings["form-text-".$context."-border-color"],-15); ?>;
}

.xui.app-toolbar_button<?php echo $selector; ?>:hover{
	background-color: <?php echo $this->color->rgbHexHSLAdjustL($this->settings["form-text-".$context."-border-color"],45); ?>;
}

.xui.app-toolbar_button<?php echo $selector; ?>.-effect-ripple > .xui.-effect-ripple_element{
	background-color: <?php echo $this->color->rgbHexHSLAdjustL($this->settings["form-text-".$context."-border-color"],30); ?>;
}

.xui.app-toolbar_button<?php echo $selector; ?>:active .xui.app-toolbar_button_icon{
	color: <?php echo $this->color->rgbHexHSLAdjustL($this->settings["form-text-".$context."-border-color"],-15); ?>;
}

<?php }; ?>

/*
// Small
*/

.xui.app-toolbar.-small .xui.app-toolbar_button .xui.app-toolbar_button_text{
	display: none;
}

/*
// Important
*/

.xui.app-toolbar.-important .xui.app-toolbar_button{
	display: none;
}

.xui.app-toolbar.-important .xui.app-toolbar_button.-important{
	display: inline-block;
}

.xui.app-toolbar.-important .xui.app-toolbar_button.-important .xui.app-toolbar_button_text{
	display: none;
}

a.xui.app-toolbar_button,
a.xui.app-toolbar_button:link
a.xui.app-toolbar_button:hover,
a.xui.app-toolbar_button:active,
a.xui.app-toolbar_button:visited {
	color:inherit;
	text-align: left;
	text-decoration: none;
}

</style>

