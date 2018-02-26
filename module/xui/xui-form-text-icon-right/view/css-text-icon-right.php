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

	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	height: 32px;

	transition: all 0.3s ease;
}

.xui-form-text-icon-right i{
	display: block;
	position: absolute;
	top: 4px;
	right: 4px;
	font-size: 24px;
	line-height: 24px;

	color: <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	transition: all 0.3s ease;
}

.xui-form-text-icon-right input:focus{
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($xuiTheme->colorTypeInputActive,"40"); ?>;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;	
}

.xui-form-text-icon-right input:focus + i{
	color: <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

/* --- */

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-text-icon-right_<?php echo $key; ?> input{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

.xui-form-text-icon-right_<?php echo $key; ?> i{
	color: <?php echo $value; ?>;	
}

<?php if($key!="default"){ ?>

.xui-form-text-icon-right_<?php echo $key; ?> input:focus{
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($value,"40"); ?>;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;	
}

.xui-form-text-icon-right_<?php echo $key; ?> input:focus + i{
	color: <?php echo $value; ?>;	
}

<?php }; ?>

<?php }; ?>

/* --- */

.xui-form-text-icon-right_disabled input{
	color: <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>
}

.xui-form-text-icon-right_disabled i{
	color: <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>
}

.xui-form-text-icon-right_disabled input:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;	
}

