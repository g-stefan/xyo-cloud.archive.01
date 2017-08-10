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

	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form-select--<?php echo $key; ?>{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

<?php }; ?>

/* --- */

.xui-form-select:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;	
}

.xui-form-select:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;	
}


.xui-form-select--disabled{
	color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>
}

.xui-form-select--disabled:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;	
}

.xui-form-select--disabled:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;	
}


/* --- select2 --- */

.xui-form-select + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

.xui-form-select + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiPalette->colorTypeInput["default"]; ?> transparent transparent transparent;
}

.xui-form-select + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiPalette->colorTypeInput["default"]; ?> transparent;
}

.xui-form-select + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form-select--<?php echo $key; ?> + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

.xui-form-select--<?php echo $key; ?> + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $value; ?> transparent transparent transparent;
}

.xui-form-select--<?php echo $key; ?> + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $value; ?> transparent;
}

.xui-form-select--<?php echo $key; ?> + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}


<?php }; ?>

/* --- */

.xui-form-select--disabled + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
}

.xui-form-select--disabled + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?> transparent transparent transparent;
}

.xui-form-select--disabled + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiPalette->colorTypeInput["disabled"]; ?> transparent;
}

.xui-form-select--disabled + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
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
	background-color: <?php echo $xuiPalette->colorTypeInputActive; ?>;
	color: #FFFFFF;
}

.select2-dropdown {
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
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
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	margin-top: 1px;
}

.select2-container--open .select2-dropdown--below{
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	margin-top: -1px;
}

.select2-container--default .select2-results__option[aria-selected="true"]{
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiPalette->colorTypeInputActive,0,0,20); ?>;
}

.select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected="true"]{
	background-color: <?php echo $xuiPalette->colorTypeInputActive; ?>;
}

