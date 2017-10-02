<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
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

	color: #000000;
	background-color: #FFFFFF;
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>; 
	border-right: 0px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-left: 0px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	min-width: 32px;
	min-height: 32px;

	overflow: hidden;

}

.xui-form-text-button-icon:focus{
	outline: none;
}

.xui-form-text-button-icon:hover{
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInputActive,0,0,20); ?>;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>; 
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-text-button-icon:active{
	color: #FFFFFF;
	background-color: <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>; 
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon{
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child {
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child:hover {
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_right .xui-form-text-button-icon:last-child:active {
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon{
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child:hover {
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-text-button-group.xui-form-text-button-group_left .xui-form-text-button-icon:first-child:active {
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

/* --- */
