<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<?php

$labelSize=20;
$labelMarginTop=6;
$labelMarginBottom=0;
$inputSize=20;
$marginBottom=6;

$marginTopX=$labelMarginTop+$labelSize+$labelMarginBottom;

?>

<style>

.xui.form-textarea-material{
	position: relative;
	display: inline-block;
	height: auto;
	width: auto;

	font-family: "Roboto", sans-serif;
	overflow: visible;

	box-sizing: border-box;
}

.xui.form-textarea-material > label{
	position: absolute;
	left: 0px;
	top: 0px;
	display: block;
	z-index: 1;

	margin-top: <?php echo $marginTopX; ?>px;
	margin-bottom: <?php echo $marginBottom; ?>px;
	width: 100%;
	transition: margin-top 0.2s ease, font-size 0.2s ease;
	cursor: text;
	color: #000000;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $inputSize-4; //16 ?>px;
	line-height: <?php echo $inputSize; //20 ?>px;
	font-weight: normal;

	box-sizing: border-box;
}

.xui.form-textarea-material.-has-value > label{
	margin-top: <?php echo $labelMarginTop; ?>px;
	margin-bottom: <?php echo $labelMarginBottom; ?>px;
	cursor: initial;
	font-size: <?php echo $inputSize-6; //16->14 ?>px;
}

.xui.form-textarea-material.-focus > label{
	color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	font-size: <?php echo $inputSize-6; //16->14 ?>px;
}

.xui.form-textarea-material > textarea{
	position: relative;
	padding-top: <?php echo $marginTopX; ?>px;
	border: none;
	display: block;
	padding-bottom: <?php echo $marginBottom-2; ?>px;
	color: #444444;
	border-bottom: 1px solid #DDDDDD;
	width: 100%;
	transition: border-bottom 0.2s ease;

	font-family: "Roboto", sans-serif;
	font-size: <?php echo $inputSize-4; //16 ?>px;
	line-height: <?php echo $inputSize; //20 ?>px;
	font-weight: normal;

	background: transparent;

	box-sizing: border-box;
}

.xui.form-textarea-material > textarea + .xui.form-textarea-material_border{
	position: relative;
	display: block;
	overflow: hidden;
	background-color: #DDDDDD;
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

.xui.form-textarea-material > textarea:focus + .xui.form-textarea-material_border{
	width: 100%;
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.xui.form-textarea-material > textarea:focus {
	outline-color: transparent;
	outline-style: none;
	border-bottom: 1px solid <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.xui.form-textarea-material.-focus > label + .xui-form-textarea-material_border{
	width:100%;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-textarea-material.-<?php echo $context; ?> label{
	color: <?php echo $this->settings["form-text-".$context."-color"]; ?>;
}

.xui.form-textarea-material.-<?php echo $context; ?> > textarea{
	color: <?php echo $this->settings["form-text-".$context."-color"]; ?>;
	border-bottom: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-textarea-material.-<?php echo $context; ?> > textarea + .xui.form-textarea-material_border{
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;	
}

.xui.form-textarea-material.-focus.-<?php echo $context; ?> > label{
	color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.xui.form-textarea-material.-<?php echo $context; ?> > textarea:focus{
	color: #000000;
	border-bottom: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.xui.form-textarea-material.-<?php echo $context; ?> > textarea:focus + .xui.form-textarea-material_border{
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;	
}

<?php }; ?>


.xui.form-textarea-material.-disabled label{
	color: #CCCCCC;
}

.xui.form-textarea-material.-disabled > textarea{
	color: #CCCCCC;
	border-bottom: 1px solid #EEEEEE;
}

.xui.form-textarea-material.-disabled > textarea + .xui.form-textarea-material_border{
	background-color: #EEEEEE;	
}

.xui.form-textarea-material.-focus.-disabled > label{
	color: #EEEEEE;
}

.xui.form-textarea-material.-disabled > textarea:focus{
	color: #CCCCCC;
	border-bottom: 1px solid #EEEEEE;
}

.xui.form-textarea-material.-disabled > textarea:focus + .xui.form-textarea-material_border{
	background-color: #EEEEEE;	
}

</style>
