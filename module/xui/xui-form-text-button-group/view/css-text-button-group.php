<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-form-text-button-group{
	word-spacing: 0px;
}

.xui-form-text-button-icon {
	display: inline-block;
	float: left;

	font-family: "Roboto", sans-serif;	
	font-size: 24px;
	line-height: 0px;
	font-weight: normal;

	padding-top: 1px;
	padding-right: 2px;
	padding-bottom: 1px;
	padding-left: 2px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.background"]; ?>;
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 0px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-left: 0px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;

	min-width: 32px;
	min-height: 32px;

	overflow: hidden;

	cursor: pointer;
	transition: box-shadow 0.3s ease;
}

.xui-form-text-button-icon:focus{
	color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-text-button-icon:hover{
	color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
}

.xui-form-text-button-icon:active{
	color: #FFFFFF;
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon{
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child {
	border-top-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child:hover {
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child:focus {
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child:active {
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon{
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child {
	border-top-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child:hover {
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child:focus {
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child:active {
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

/* --- */
