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

.xui-form-text{

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 6px;
	padding-bottom: 5px;
	padding-left: 6px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: #000000;
	background-color: #FFFFFF;

	border-radius:  <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	height: 32px;
}

/* --- */

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-text_<?php echo $key; ?>{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

<?php }; ?>

/* --- */

.xui-form-text:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;	
}

.xui-form-text_disabled{
	color: <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>
}

.xui-form-text_disabled:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["disabled"]; ?>;	
}

.xui-form-text_in-group{
	border-radius: 0px;
}

.xui-form-text_group-left{
	border-top-left-radius: 0px;
	border-bottom-left-radius: 0px;
	border-top-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
}

.xui-form-text_group-right{
	border-top-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top-right-radius: 0px;
	border-bottom-right-radius: 0px;
}                     

