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

.xui-form-text-required{
	position: relative;
	display: inline-block;
}

.xui-form-text-required input{

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 12px;
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
}

/* --- */

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-text-required_<?php echo $key; ?> input{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

<?php }; ?>

/* --- */

.xui-form-text-required input:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;	
}

.xui-form-text-required_disabled input{
	color: <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>
}

.xui-form-text-required_disabled input:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;	
}

.xui-form-text-required_in-group input{
	border-radius: 0px;
}

.xui-form-text-required_group-left input{
	border-top-left-radius: 0px;
	border-bottom-left-radius: 0px;
	border-top-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
}

.xui-form-text-required_group-right input{
	border-top-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top-right-radius: 0px;
	border-bottom-right-radius: 0px;
}                     

.xui-form-text-required::after{
	content: "";
	display: block;
	position: absolute;
	top: 3px;
	right: 3px;
	width: 8px;
	height: 8px;
	box-sizing: border-box;
	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	overflow: hidden;
	background-color: <?php echo $xuiTheme->colorTypeInput["danger"] ?>;
}

.xui-form-text-required_disabled::after{
	background-color: <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
}

