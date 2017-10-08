<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$itemTextHeight=52;
$itemTextLabelSize=20;
$itemTextLabelMarginTop=6;
$itemTextLabelMarginBottom=0;
$itemTextInputSize=20;
$itemTextMarginBottom=6;


$itemTextMarginTopX=$itemTextLabelMarginTop+$itemTextLabelSize+$itemTextLabelMarginBottom;

$itemTextColorLabel=$xuiPalette->palette["core-dark-gray-v1"];
$itemTextColorInput="#000000";
$itemTextColorBorder=$xuiPalette->palette["core-dark-gray-v1"];

$itemTextColorLabelFocus=$xuiTheme->colorTypeInputActive;
$itemTextColorInputFocus="#000000";
$itemTextColorBorderFocus=$xuiTheme->colorTypeInputActive;

?>

/* --- */

.xui-form-text-material{
	position: relative;
	display: inline-block;
	height: <?php echo $itemTextHeight; ?>px;
	width: auto;

	font-family: "Roboto", sans-serif;
	overflow: visible;
}

.xui-form-text-material label{
	position: absolute;
	left: 0px;
	top: 0px;
	display: block;
	z-index: 1;

	margin-top: <?php echo $itemTextMarginTopX; ?>px;
	margin-bottom: <?php echo $itemTextLabelMarginBottom; ?>px;
	width: 100%;
	transition: margin-top 0.2s ease, font-size 0.2s ease;
	cursor: text;
	color: <?php echo $itemTextColorLabel; ?>;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $itemTextInputSize-4; //16 ?>px;
	line-height: <?php echo $itemTextInputSize; //20 ?>px;
	font-weight: normal;
}

.xui-form-text-material label.xui-form-text-material_has-value{
	margin-top: <?php echo $itemTextLabelMarginTop; ?>px;
	margin-bottom: <?php echo $itemTextLabelMarginBottom; ?>px;
	cursor: initial;
	font-size: <?php echo $itemTextInputSize-6; //16->14 ?>px;
}

.xui-form-text-material label.xui-form-text-material_focus{
	color: <?php echo $itemTextColorLabelFocus; ?>;
	font-size: <?php echo $itemTextInputSize-6; //16->14 ?>px;
}

.xui-form-text-material input[type=text]{
	position: relative;
	padding-top: <?php echo $itemTextMarginTopX; ?>px;
	border: none;
	display: block;
	padding-bottom: <?php echo $itemTextMarginBottom-2; ?>px;
	color: <?php echo $itemTextColorInput; ?>;
	border-bottom: 1px solid <?php echo $itemTextColorBorder; ?>;
	width: 100%;
	transition: border-bottom 0.2s ease;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $itemTextInputSize-4; //16 ?>px;
	line-height: <?php echo $itemTextInputSize; //20 ?>px;
	font-weight: normal;

	background: transparent;
}

.xui-form-text-material input[type=text] + .xui-form-text-material__border{
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

.xui-form-text-material input[type=text]:focus + .xui-form-text-material__border{
	width: 100%;
	background-color: <?php echo $itemTextColorBorderFocus; ?>;
}

.xui-form-text-material input[type=text]:focus {
	outline-color: transparent;
	outline-style: none;
	border-bottom: 1px solid <?php echo $itemTextColorBorderFocus; ?>;
}

.xui-form-text-material__border{
	transition:0.3s all ease;
	left: 50%;
	transform: translateX(-50%);	
	position:absolute;
	bottom: 0px;
	height: 1px;
	width: 0px;
	background: #5392E5;
	backface-visibility: hidden;
}

.xui-form-text-material label.xui-form-text-material_focus + div.xui-form-text-material__border{
	width:100%;
}


<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-text-material_<?php echo $key; ?> label{
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-text-material_<?php echo $key; ?> input[type=text]{
	border-bottom: 1px solid <?php echo $value; ?>;
}

.xui-form-text-material input[type=text] + .xui-form-text-material__border{
	background-color: <?php echo $value; ?>;
}

.xui-form-text-material_<?php echo $key; ?> label.xui-form-text-material_focus{
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}


<?php }; ?>

