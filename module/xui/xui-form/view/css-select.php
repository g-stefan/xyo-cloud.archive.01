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

.xui-form__select{

	font-size: 16px;
	line-height: 16px;
	font-weight: normal;
	border-radius: 0px;

	padding-top: 6px;
	padding-left: 8px;
	padding-bottom: 6px;
	padding-right: 8px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form__select--<?php echo $key; ?>{
	color: #000000;
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

<?php }; ?>

/* --- */

.xui-form__select:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;	
}

.xui-form__select:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;	
}


.xui-form__select--disabled{
	color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>
}

.xui-form__select--disabled:focus{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;	
}

.xui-form__select--disabled:active{
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;	
}


/* --- select2 --- */

.xui-form__select + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

.xui-form__select + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiPalette->colorTypeInput["default"]; ?> transparent transparent transparent;
}

.xui-form__select + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiPalette->colorTypeInput["default"]; ?> transparent;
}

.xui-form__select + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form__select--<?php echo $key; ?> + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $value; ?>; 
	border-right: 1px solid <?php echo $value; ?>;
	border-bottom: 1px solid <?php echo $value; ?>;
	border-left: 1px solid <?php echo $value; ?>;
}

.xui-form__select--<?php echo $key; ?> + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $value; ?> transparent transparent transparent;
}

.xui-form__select--<?php echo $key; ?> + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $value; ?> transparent;
}

.xui-form__select--<?php echo $key; ?> + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}


<?php }; ?>

/* --- */

.xui-form__select--disabled + .select2-container--default .select2-selection--single {
	border-radius: 0px;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
}

.xui-form__select--disabled + .select2-container--default .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $xuiPalette->colorTypeInput["disabled"]; ?> transparent transparent transparent;
}

.xui-form__select--disabled + .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $xuiPalette->colorTypeInput["disabled"]; ?> transparent;
}

.xui-form__select--disabled + .select2-container--default .select2-selection--single:focus {
	outline: none;
	border-top: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>; 
	border-right: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-bottom: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
	border-left: 1px solid <?php echo $xuiPalette->colorTypeInput["disabled"]; ?>;
}

/* --- */

.select2-results__option{
	font-size: 16px;
	line-height: 16px;

	padding-top: 8px;
	padding-left: 10px;
	padding-bottom: 8px;
	padding-right: 10px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: Roboto;	
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
	font-size: 16px;
	line-height: 16px;

	height: 32px;
	padding-left: 2px;
	padding-top: 2px;

	box-sizing: border-box;

	font-family: Roboto;	
}

.select2-container--default .select2-selection--single .select2-selection__arrow b{
	margin-top: 0px;
}

.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
	margin-top: 0px;
}

