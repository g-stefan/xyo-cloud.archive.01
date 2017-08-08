<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$itemTextHeight=56;
$itemTextLabelSize=16;
$itemTextLabelMarginTop=4;
$itemTextLabelMarginBottom=8;
$itemTextInputSize=16;
$itemTextMarginBottom=6;
$itemTextInputLineHeightBottom=6;

$itemTextMarginTopX=$itemTextLabelMarginTop+$itemTextLabelSize+$itemTextLabelMarginBottom;

$itemTextColorLabel=$xuiPalette->colorTypeLabel["default"];
$itemTextColorInput="#000000";
$itemTextColorBorder=$xuiPalette->colorTypeInput["default"];

$itemTextColorLabelFocus=$xuiPalette->colorTypeLabel["default"];
$itemTextColorInputFocus="#000000";
$itemTextColorBorderFocus=$xuiPalette->colorTypeInputActive;

?>

/* --- */

.xui-form__text-material{
	position: relative;
	display: inline-block;
	height: <?php echo $itemTextHeight; ?>px;
	width: auto;
}

.xui-form__text-material label{
	position: absolute;
	left: 0px;
	top: 0px;
	display: inline-block;
	z-index: 1;
	font-size: <?php echo $itemTextInputSize; ?>px;
	margin-top: <?php echo $itemTextLabelMarginTop+$itemTextLabelSize+$itemTextLabelMarginBottom; ?>px;
	margin-bottom: <?php echo $itemTextLabelMarginBottom; ?>px;
	width: 100%;
	transition: margin-top 0.2s ease, font-size 0.2s ease;
	cursor: text;
	color: <?php echo $itemTextColorLabel; ?>;

	line-height: <?php echo $itemTextInputSize; ?>px;
	font-weight: normal;

	font-family: "Roboto", sans-serif;
}

.xui-form__text-material label.xui-form__text-material--has-value{
	margin-top: <?php echo $itemTextLabelMarginTop; ?>px;
	font-size: <?php echo $itemTextLabelSize; ?>px;
	cursor: initial;
}

.xui-form__text-material label.xui-form__text-material--focus{
	color: <?php echo $itemTextColorLabelFocus; ?>;
}

.xui-form__text-material input[type=text]{
	position: relative;
	padding-top: <?php echo $itemTextMarginTopX; ?>px;
	border: none;
	display: inline-block;
	font-size: <?php echo $itemTextInputSize; ?>px;
	padding-bottom: <?php echo $itemTextMarginBottom; ?>px;
	color: <?php echo $itemTextColorInput; ?>;
	border-bottom: 1px solid <?php echo $itemTextColorBorder; ?>;
	width: 100%;
	transition: border-bottom 0.2s ease;

	font-size: <?php echo $itemTextInputSize; ?>px;
	line-height: <?php echo $itemTextInputSize; ?>px;
	font-weight: normal;

	font-family: "Roboto", sans-serif;
}

.xui-form__text-material input[type=text] + .xui-form__text-material__border{
	position: relative;
	display: block;
	overflow: hidden;
	background-color: <?php echo $itemTextColorBorder; ?>;
	height: 1px;
	width: 0px;
	margin-left: 0px;
	margin-right: auto;
	transition: width 0.2s ease, background-color 0.2s ease;
}

.xui-form__text-material input[type=text]:focus + .xui-form__text-material__border{
	width: 100%;
	background-color: <?php echo $itemTextColorBorderFocus; ?>;
}

.xui-form__text-material input[type=text]:focus {
	outline-color: transparent;
	outline-style: none;
	border-bottom: 1px solid <?php echo $itemTextColorBorderFocus; ?>;
}


<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form__text-material--<?php echo $key; ?> label{
	color: <?php echo $xuiPalette->colorTypeLabel[$key]; ?>;
}

.xui-form__text-material--<?php echo $key; ?> input[type=text]{
	border-bottom: 1px solid <?php echo $value; ?>;
}

.xui-form__text-material input[type=text] + .xui-form__text-material__border{
	background-color: <?php echo $value; ?>;
}

.xui-form__text-material--<?php echo $key; ?> label.xui-form__text-material--focus{
	color: <?php echo $xuiPalette->colorTypeLabel[$key]; ?>;
}


<?php }; ?>

