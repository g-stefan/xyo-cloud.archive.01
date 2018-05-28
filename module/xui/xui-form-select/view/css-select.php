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

.xui-form-select{

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

	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

/* --- */

<?php foreach($xuiTheme->theme as $context=>&$value){ ?>

.xui-form-select_<?php echo $context; ?>{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_<?php echo $context; ?> + .select2-container--default .select2-selection--single .select2-selection__rendered{
	color: <?php echo $xuiTheme->theme[$context]["input"]["color.label"]; ?>;
}

<?php }; ?>

/* --- */

.xui-form-select:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;	
}

.xui-form-select:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;	
}


.xui-form-select_disabled{
	color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.text"]; ?>;
}

.xui-form-select_disabled:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;	
}

.xui-form-select_disabled:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;	
}


/* --- select2 --- */

.xui-form-select + .select2.select2-container.select2-container--default .selection .select2-selection{
	transition: all 0.3s ease;
}

.xui-form-select + .select2-container--default .select2-selection--single {
	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["default"]["input"]["normal"]["color.border"]; ?> transparent;
}

.xui-form-select + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

/* --- */

<?php foreach($xuiTheme->theme as $context=>&$value){ ?>

.xui-form-select_<?php echo $context; ?> + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_<?php echo $context; ?> + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme[$context]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select_<?php echo $context; ?> + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?> transparent;
}

.xui-form-select_<?php echo $context; ?> + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$context]["input"]["active"]["color.border"]; ?>;
}

<?php }; ?>

/* --- */

.xui-form-select:active + .select2.select2-container.select2-container--default .select2-selection.select2-selection--single,
.xui-form-select:focus + .select2.select2-container.select2-container--default .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-select + .select2.select2-container.select2-container--default.select2-container--focus .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-select + .select2.select2-container.select2-container--default.select2-container--focus .select2-selection.select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent transparent transparent;
}


.xui-form-select + .select2.select2-container.select2-container--default.select2-container--open .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.high.rgba"]; ?>;
}

.xui-form-select + .select2.select2-container.select2-container--default.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent;
}

.select2-container.select2-container--default.select2-container--open .select2-dropdown .select2-results{
	border: 0px;
	box-sizing: border-box;
}

.select2-container.select2-container--default.select2-container--open .select2-dropdown{
	border: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

/* --- */

.xui-form-select:active + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-select:active + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select:active + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent;
}

.xui-form-select:active + .select2-container--default .select2-selection--single{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-select:focus + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.xui-form-select:focus + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select:focus + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?> transparent;
}

.xui-form-select:focus + .select2-container--default .select2-selection--single{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

/* --- */

.xui-form-select_disabled + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_disabled + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select_disabled + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent;
}

.xui-form-select_disabled + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}


.xui-form-select_disabled:active + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_disabled:active + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select_disabled:active + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent;
}

.xui-form-select_disabled:active + .select2-container--default .select2-selection--single{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_disabled:focus + .select2-container--default .select2-selection--single {
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_disabled:focus + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select_disabled:focus + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent;
}

.xui-form-select_disabled:focus + .select2-container--default .select2-selection--single{
	outline: none;
	border-top: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
}

.xui-form-select_disabled:active + .select2.select2-container.select2-container--default .select2-selection.select2-selection--single,
.xui-form-select_disabled:focus + .select2.select2-container.select2-container--default .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	outline: none;
	box-shadow: none;
}

.xui-form-select_disabled + .select2.select2-container.select2-container--default.select2-container--focus .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?>;
	outline: none;
	box-shadow: none;
}

.xui-form-select_disabled + .select2.select2-container.select2-container--default.select2-container--focus .select2-selection.select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.border"]; ?> transparent transparent transparent;
}

.xui-form-select_disabled + .select2-container--default.select2-container--disabled .select2-selection--single{
	background-color: <?php echo $xuiTheme->theme["disabled"]["input"]["normal"]["color.background"]; ?>;
}

.xui-form-select_disabled + .select2-container--default .select2-selection--single .select2-selection__rendered{
	color: <?php echo $xuiTheme->theme["disabled"]["input"]["color.label"]; ?>;
}

/* --- */

.select2-results__option{
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
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	color: #FFFFFF;
}

.select2-dropdown {
	overflow: hidden;
	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>; 
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}

.select2-container .select2-selection--single{
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 0px;
	padding-bottom: 5px;
	padding-left: 6px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	height: 32px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered{
	line-height: 20px;
	padding-left: 0px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b{
	margin-top: 0px;
}

.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	margin-top: 0px;
}

.select2-container--default .select2-results > .select2-results__options {
	max-height: 400px;
	overflow-y: auto;
}

.select2-container--open .select2-dropdown--above{
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	margin-top: 1px;
}

.select2-container--open .select2-dropdown--below{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
	margin-top: -1px;
}

.select2-container--default .select2-results__option[aria-selected="true"]{
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->theme["default"]["input"]["active"]["color.border"],0,0,30); ?>;
}

.select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected="true"]{
	background-color: <?php echo $xuiTheme->theme["default"]["input"]["active"]["color.border"]; ?>;
}


