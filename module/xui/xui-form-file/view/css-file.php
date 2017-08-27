<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$color=$xuiPalette->colorTypeButton["default"];
$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-20);

$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,5,-10);
$colorHoverBorder=$xuiColor->rgbHexHSLAdjust($color,0,10,-20);

$colorAction=$xuiColor->rgbHexHSLAdjust($color,0,5,-15);

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

	padding-top: 8px;
	padding-left: 36px;
	padding-bottom: 8px;
	padding-right: 12px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiPalette->colorTypeButtonText["default"]; ?>;
	background-color: <?php echo $color; ?>;
	border-top: 0px solid <?php echo $colorBorder; ?>; 
	border-right: 0px solid <?php echo $colorBorder; ?>;
	border-bottom: 4px solid <?php echo $colorBorder; ?>;
	border-left: 0px solid <?php echo $colorBorder; ?>;

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

.xui-form-file__file:hover + label, .xui-form-file__file:focus + label, .xui-form-file__file + label:hover, .xui-form-file__file.xui-form-file__file--focus + label{
	background-color: <?php echo $colorHover; ?>;
	border-top: 0px solid <?php echo $colorHoverBorder; ?>; 
	border-right: 0px solid <?php echo $colorHoverBorder; ?>;
	border-bottom: 4px solid <?php echo $colorHoverBorder; ?>;
	border-left: 0px solid <?php echo $colorHoverBorder; ?>;
}

.xui-form-file__file:active + label{
	background-color: <?php echo $colorAction; ?>;
	margin-top: 2px;
	border-bottom: 2px solid <?php echo $colorHoverBorder; ?>;
}

