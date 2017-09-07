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

.xui-form-file-image{
	position:relative;
	display: inline-block;

	box-sizing: border-box;
	
	overflow: hidden;
	width: 100%;
}

.xui-form-file-image__delete{
	position: absolute;
	display: inline-block;
	top: 0px;
	right: 0px;

	border-top-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.xui-form-file-image__image {
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

.xui-form-file-image__image i{
	font-size: 96px;
	line-height: 96px;
	margin-left: auto;
	margin-right: auto;
}

.xui-form-file-image .xui-form-file{
	display: block;
	width: 100%;
	height: 40px;

	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
}

.xui-form-file-image .xui-form-file label{
	position: absolute;
	display: block;
	overflow:hidden;
	top: 0px;
	left: 0px;
	right: 44px;

	border-top-left-radius: 0px;
	border-top-right-radius: 0px;	
}

.xui-form-file-image .xui-form-file .xui-form-button-icon{
	position: absolute;
	top: 0px;
	right: 0px;

	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
}

.xui-form-file-image__link{
	position: absolute;
	top: 0px;
	left: 0px;
	border-top-right-radius: 0px;
	text-decoration: none;
}


.xui-form-file-image .cropit-preview{
	margin-left: auto;
	margin-right: auto;
	width: 320px;
	height:  240px;
	border: 16px solid #EEEEEE;
}

.xui-form-file-image .xui-form-file-image__image{
	width: 100%;
	overflow: hidden;
}

.xui-form-file-image .cropit-preview-background {
	opacity: .4;
}

.xui-form-file-image .cropit-image-zoom-input{
	-webkit-appearance: none;
	appearance: none;
	height: 8px;
	background-color: #EEEEEE;
	border-radius: 8px;
	outline: none;
	width: 160px;
	margin-top: 20px;
	margin-right: 20px;
	margin-bottom: 20px;
	margin-left: 20px;
	vertical-align: middle;
}

.xui-form-file-image .cropit-image-zoom-input:focus{
	outline: none;
}

.xui-form-file-image .cropit-image-zoom-input::-webkit-slider-thumb {
	-webkit-appearance: none;
	appearance:none;
	width: 16px;
	height:16px;
	background-color: #888888;
	border-radius: 50%;
	outline: none;
	transition: background 0.3s ease;
}

.xui-form-file-image .cropit-image-zoom-input::-webkit-slider-thumb:hover {
	background-color: #AC92EC;
}

.xui-form-file-image .cropit-preview-image-container {
	cursor: move;
}

.xui-form-file-image .xui-form-file-image__link{
	position: absolute;
	top: 0px;
	left: 0px;
	border-top-right-radius: 0px;
}
