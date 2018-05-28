<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-form-textarea{

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

	color: <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.background"]; ?>;
	border-radius:  <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;

	transition: all 0.3s ease;
}

.xui-form-textarea:focus{
	outline: none;
	color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.background"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;	
}

/* --- */

<?php

foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};
	if($context=="disabled"){
		continue;
	};
?>

.xui-form-textarea_<?php echo $context; ?>{
	color: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.background"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-textarea_<?php echo $context; ?>:focus{
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
	color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.background"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

<?php }; ?>

/* --- */

.xui-form-textarea_disabled{
	color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["disabled"]["input"]["active"]["color.background"]; ?>;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-textarea_disabled:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

