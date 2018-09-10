<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?>

/* --- */

.xui-form-autocompleter {
	position: relative;
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show {
	position: absolute;
	width: 100%;
	margin-top: -2px;
	z-index: 3;
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list {
	outline: none;
	border-radius:  0px 0px <?php echo $xuiTheme->inputBorderRadius; ?>px <?php echo $xuiTheme->inputBorderRadius; ?>px;
	color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.background"]; ?>;
	border-top: 0px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;	
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item{
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

	height: 32px;
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item:hover{
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	color: #FFFFFF;
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item-selected {
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->theme["default"]["input"]["active"]["color.border"],0,0,30); ?>;
	color: #000000;
}

.xui-form-text + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item strong {
	font-weight: bold;
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

.xui-form-text_<?php echo $context; ?> + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list {
	outline: none;
	border-radius:  0px 0px <?php echo $xuiTheme->inputBorderRadius; ?>px <?php echo $xuiTheme->inputBorderRadius; ?>px;
	color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.background"]; ?>;
	border-top: 0px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;	
}

.xui-form-text_<?php echo $context; ?> + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item:hover{
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	color: #FFFFFF;
}

.xui-form-text_<?php echo $context; ?> + .autocompleter.xui-form-autocompleter.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item-selected {
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->theme[$context]["input"]["active"]["color.border"],0,0,30); ?>;
	color: #000000;
}

<?php }; ?>

/* --- */
