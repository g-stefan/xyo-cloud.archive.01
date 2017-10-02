<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$color=$xuiTheme->colorTypeButton["default"];
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-25);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

/* --- */

.xui-form-file{
	position:relative;
	display: inline-block;
	word-spacing: 0px;	
}

.xui-form-file__file {
	position: absolute;
	overflow: hidden;

	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	z-index: -1;
}

.xui-form-file__file + label {
	position:relative;
	display: inline-block;

	vertical-align: top;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	border-top-left-radius: 3px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 0px;

	padding-top: 7px;
	padding-left: 35px;
	padding-bottom: 7px;
	padding-right: 11px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 3px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiTheme->colorTypeButtonText["default"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;

	font-family: "Roboto", sans-serif;

	cursor: pointer;	

	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;

	user-select: none;
}

.xui-form-file__file + label * {
	pointer-events: none;
}

.xui-form-file__file + label i {
	position: absolute;
	top: 6px;
	left: 6px;
}

.xui-form-file .xui-form-button-icon {
	vertical-align: top;

	border-top-left-radius: 0px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 3px;
}

.xui-form-file__file:hover + label, .xui-form-file__file:focus + label, .xui-form-file__file + label:hover, .xui-form-file__file.xui-form-file__file_focus + label{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
}

.xui-form-file__file:active + label{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
	margin-top: 2px;
	margin-bottom: 1px;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWall; ?>;
}

