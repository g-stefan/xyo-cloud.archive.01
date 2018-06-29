<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$checkedX=10;
$checkedY=5;
$checkedLx=12;
$checkedLy=12;

?>

/* --- */

.xui-form-checkbox2{
	display: inline-block;
	vertical-align: middle;
	cursor: pointer;
	position: relative;

	font-size: 16px;
	line-height: 24px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;
}

/* --- */

.xui-form-checkbox2 input[type="checkbox"]{
	position: absolute;
	top: 0px;
	left: 0px;
	display: block;
	opacity: 0;
}

.xui-form-checkbox2 label {
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

	transition: all 0.3s ease;
}

.xui-form-checkbox2 label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	left: 0px;
	top: 5px;
	content: " ";

	width: 22px;
	height: 22px;

	background-color: transparent;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 4px;

	box-sizing: border-box;

	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;

	transition: all 0.3s ease;
}

.xui-form-checkbox2 input[type="checkbox"]:active + label::before {
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:focus + label::before {
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:active:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:focus:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: <?php echo ($checkedX+$checkedLx/2-1); ?>px;
	left: <?php echo ($checkedY+$checkedLy/2-1); ?>px;
	content: " ";

	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;

	width: 2px;
	height: 2px;

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

	transition: all 0.3s ease;
}

.xui-form-checkbox2 input[type="checkbox"]:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php echo $xuiTheme->theme["primary"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:active:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php echo $xuiTheme->theme["primary"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:focus:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php echo $xuiTheme->theme["primary"]["input"]["active"]["color.border"]; ?>;
}


<?php

foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};

?>

.xui-form-checkbox2_<?php echo $context; ?> label {
	color: <?php echo $xuiTheme->theme[$context]["input"]["color.label"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:checked + label::after {
	background-color: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:active + label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:focus + label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:active:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:focus:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:active:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

.xui-form-checkbox2_<?php echo $context; ?> input[type="checkbox"]:focus:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

<?php }; ?>

