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

.xui-form-radio{
	display: inline-block;
	vertical-align: middle;
	cursor: pointer;
	position: relative;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;
}

/* --- */

.xui-form-radio input[type="radio"]{
	display: none;
}

.xui-form-radio label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 0px;
	padding-bottom: 4px;
	padding-left: 26px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	color: <?php echo $xuiTheme->theme["default"]["input"]["color.label"]; ?>;
}

.xui-form-radio label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	left: 0px;
	top: 5px;
	content: " ";

	width: 22px;
	height: 22px;
	border-radius: 11px;
	background-color: transparent;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-radio input[type="radio"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-radio input[type="radio"]:focus + label::before {
	outline: none;
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-radio input[type="radio"] + label::after {
	display: block;
	cursor: pointer;
	position: absolute;
	top: 10px;
	left: 5px;
	content: " ";

	border-radius: 6px;

	width: 12px;
	height: 12px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background: transparent;
}

.xui-form-radio input[type="radio"]:checked + label::after {
	background: <?php echo $xuiTheme->theme["primary"]["input"]["normal"]["color.border"]; ?>;
}

<?php

foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};

?>

.xui-form-radio_<?php echo $context; ?> label {
	color: <?php echo $xuiTheme->theme[$context]["input"]["color.label"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> input[type="radio"]:checked + label::after {
	outline: none;
	background: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> input[type="radio"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> input[type="radio"]:focus + label::before {
	outline: none;
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> input[type="radio"]:checked:active + label::after {
	outline: none;
	background: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

.xui-form-radio_<?php echo $context; ?> input[type="radio"]:checked:focus + label::after {
	outline: none;
	background: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

	
<?php }; ?>

