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

.xui-form-file-image-thumbnail{
	position:relative;
	display: inline-block;

	box-sizing: border-box;
	
}

.xui-form-file-image-thumbnail__delete{
	position: absolute;
	display: inline-block;
	top: 0px;
	right: 0px;

	border-top-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.xui-form-file-image-thumbnail__image {
	position: relative;

	min-width: 192px;
	min-height: 96px;
	text-align: center;

	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 0px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;

	padding: 2px 2px 2px 2px;
	margin: 0px 0px 0px 0px;

	color: #C0C0C0;

	box-sizing: border-box;

	border-top-left-radius: 3px;
	border-top-right-radius: 3px;

	overflow: hidden;
}

.xui-form-file-image-thumbnail__image i{
	font-size: 96px;
	line-height: 96px;
	margin-left: auto;
	margin-right: auto;
}

.xui-form-file-image-thumbnail .xui-form-file{
	display: block;
	width: 100%;
	height: 40px;

	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
}

.xui-form-file-image-thumbnail .xui-form-file label{
	position: absolute;
	display: block;
	overflow:hidden;
	top: 0px;
	left: 0px;
	right: 44px;

	border-top-left-radius: 0px;
	border-top-right-radius: 0px;	
}

.xui-form-file-image-thumbnail .xui-form-file .xui-form-button-icon{
	position: absolute;
	top: 0px;
	right: 0px;

	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
}

