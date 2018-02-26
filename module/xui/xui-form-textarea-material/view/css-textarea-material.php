<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$itemTextareaHeight=52;
$itemTextareaLabelSize=20;
$itemTextareaLabelMarginTop=6;
$itemTextareaLabelMarginBottom=0;
$itemTextareaInputSize=20;
$itemTextareaMarginBottom=6;


$itemTextareaMarginTopX=$itemTextareaLabelMarginTop+$itemTextareaLabelSize+$itemTextareaLabelMarginBottom;

$itemTextareaColorLabel=$xuiPalette->palette["core-dark-gray-v1"];
$itemTextareaColorInput="#000000";   
$itemTextareaColorBorder=$xuiPalette->palette["core-dark-gray-v1"];

$itemTextareaColorLabelFocus=$xuiTheme->colorTypeInputActive;
$itemTextareaColorInputFocus="#000000";
$itemTextareaColorBorderFocus=$xuiTheme->colorTypeInputActive;

?>

/* --- */

.xui-form-textarea-material{
	position: relative;
	display: inline-block;
	height: auto;
	width: auto;

	font-family: "Roboto", sans-serif;
	overflow: hidden;

	box-sizing: border-box;
}

.xui-form-textarea-material label{
	position: absolute;
	left: 0px;
	top: 0px;
	display: block;
	z-index: 1;

	margin-top: <?php echo $itemTextareaMarginTopX; ?>px;
	margin-bottom: <?php echo $itemTextareaLabelMarginBottom; ?>px;
	width: 100%;
	transition: margin-top 0.2s ease, font-size 0.2s ease;
	cursor: text;
	color: <?php echo $itemTextareaColorLabel; ?>;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $itemTextareaInputSize-4; //16 ?>px;
	line-height: <?php echo $itemTextareaInputSize; //20 ?>px;
	font-weight: normal;

	box-sizing: border-box;
}

.xui-form-textarea-material label.xui-form-textarea-material_has-value{
	margin-top: <?php echo $itemTextareaLabelMarginTop; ?>px;
	margin-bottom: <?php echo $itemTextareaLabelMarginBottom; ?>px;
	cursor: initial;
	font-size: <?php echo $itemTextareaInputSize-6; //16->14 ?>px;
	box-sizing: border-box;
}

.xui-form-textarea-material label.xui-form-textarea-material_focus{
	color: <?php echo $itemTextareaColorLabelFocus; ?>;
	font-size: <?php echo $itemTextareaInputSize-6; //16->14 ?>px;
	box-sizing: border-box;	
}

.xui-form-textarea-material textarea{
	position: relative;	
	padding-top: <?php echo $itemTextareaMarginTopX; ?>px;
	padding-right: 0px;
	padding-bottom: <?php echo $itemTextareaMarginBottom-2; ?>px;
	padding-left: 0px;
	border: none;
	display: block;
	color: <?php echo $itemTextareaColorInput; ?>;

	border-top: 0px solid transparent;
	border-right: 0px solid transparent;
	border-bottom: 1px solid <?php echo $itemTextareaColorBorder; ?>;
	border-left: 0px solid transparent;

	width: 100%;
	transition: border-bottom 0.2s ease;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $itemTextareaInputSize-4; //16 ?>px;
	line-height: <?php echo $itemTextareaInputSize; //20 ?>px;
	font-weight: normal;

	background: transparent;

	box-sizing: border-box;
}

.xui-form-textarea-material textarea + .xui-form-textarea-material__border{
	position: relative;
	display: block;
	overflow: hidden;
	background-color: <?php echo $itemTextareaColorBorder; ?>;
	height: 3px;
	width: 0px;
	margin-left: 0px;
	margin-right: auto;
	transition: width 0.2s ease, background-color 0.2s ease;
	opacity: 0.2510;
	box-sizing: border-box;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
}

.xui-form-textarea-material textarea:focus + .xui-form-textarea-material__border{
	width: 100%;
	background-color: <?php echo $itemTextareaColorBorderFocus; ?>;
}

.xui-form-textarea-material textarea:focus {
	outline-color: transparent;
	outline-style: none;
	border-bottom: 1px solid <?php echo $itemTextareaColorBorderFocus; ?>;
}


<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-textarea-material_<?php echo $key; ?> label{
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-textarea-material_<?php echo $key; ?> textarea{
	border-bottom: 1px solid <?php echo $value; ?>;
}

.xui-form-textarea-material input[type=text] + .xui-form-textarea-material__border{
	background-color: <?php echo $value; ?>;
}

.xui-form-textarea-material_<?php echo $key; ?> label.xui-form-textarea-material_focus{
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

<?php if($key!="default"){ ?>

.xui-form-textarea-material_<?php echo $key; ?> textarea:focus{
	border-bottom: 1px solid <?php echo $value; ?>;
}

.xui-form-textarea-material_<?php echo $key; ?> textarea:focus + .xui-form-textarea-material__border{
	background-color: <?php echo $value; ?>;	
}

<?php }; ?>

<?php }; ?>

