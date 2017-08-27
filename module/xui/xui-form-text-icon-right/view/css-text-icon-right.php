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

.xui-form-text-icon-right {
	position: relative;
	display: inline-block;
	box-sizing: border-box;
}

.xui-form-text-icon-right input{

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 32px;
	padding-bottom: 5px;
	padding-left: 6px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: #000000;
	background-color: #FFFFFF;

	border-radius: 3px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;

	height: 32px;
}

.xui-form-text-icon-right i{
	display: block;
	position: absolute;
	top: 4px;
	right: 4px;
	font-size: 24px;
	line-height: 24px;

	color: <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form-text-icon-right--<?php echo $key; ?> input{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

.xui-form-text-icon-right--<?php echo $key; ?> i{
	color: <?php echo $value; ?>;	
}

<?php }; ?>

/* --- */

.xui-form-text-icon-right input:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;	
}

.xui-form-text-icon-right--disabled input{
	color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>
}

.xui-form-text-icon-right--disabled i{
	color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>
}

.xui-form-text-icon-right--disabled input:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;	
}

