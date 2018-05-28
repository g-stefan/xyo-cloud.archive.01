<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$itemTextHeight=52;
$itemTextLabelSize=20;
$itemTextLabelMarginTop=6;
$itemTextLabelMarginBottom=0;
$itemTextInputSize=20;
$itemTextMarginBottom=6;


$itemTextMarginTopX=$itemTextLabelMarginTop+$itemTextLabelSize+$itemTextLabelMarginBottom;

$itemTextColorLabel=$xuiTheme->theme["default"]["input"]["color.label"];
$itemTextColorInput="#000000";
$itemTextColorBorder=$xuiTheme->theme["default"]["input"]["normal"]["color.border"];

$itemTextColorLabelFocus=$xuiTheme->theme["default"]["input"]["color.label"];
$itemTextColorInputFocus="#000000";
$itemTextColorBorderFocus=$xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"];

?>

/* --- */

.xui-form-text-material{
	position: relative;
	display: inline-block;
	height: <?php echo $itemTextHeight; ?>px;
	width: auto;

	font-family: "Roboto", sans-serif;
	overflow: visible;

	box-sizing: border-box;
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

	box-sizing: border-box;
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

	box-sizing: border-box;
}

.xui-form-text-material input[type=text] + .xui-form-text-material__border{
	position: relative;
	display: block;
	overflow: hidden;
	background-color: <?php echo $itemTextColorBorder; ?>;
	height: 3px;
	width: 0px;
	margin-left: 0px;
	margin-right: auto;
	margin-top: 0px;
	margin-bottom: 0px;
	padding: 0px 0px 0px 0px;
	transition: width 0.2s ease, background-color 0.2s ease;
	opacity: 0.2510;
	box-sizing: border-box;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
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

.xui-form-text-material label.xui-form-text-material_focus + div.xui-form-text-material__border{
	width:100%;
}

<?php

foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};
?>

.xui-form-text-material_<?php echo $context; ?> label{
	color: <?php echo $xuiTheme->theme[$context]["input"]["color.label"]; ?>;
}

.xui-form-text-material_<?php echo $context; ?> input[type=text]{
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-text-material_<?php echo $context; ?> input[type=text] + .xui-form-text-material__border{
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.high"]; ?>;	
}

.xui-form-text-material_<?php echo $context; ?> label.xui-form-text-material_focus{
	color: <?php echo $xuiTheme->theme[$context]["input"]["color.label"]; ?>;
}

.xui-form-text-material_<?php echo $context; ?> input[type=text]:focus{
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

.xui-form-text-material_<?php echo $context; ?> input[type=text]:focus + .xui-form-text-material__border{
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;	
}

<?php }; ?>

