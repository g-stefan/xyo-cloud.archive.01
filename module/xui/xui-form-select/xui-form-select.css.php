<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.form-select{
	font-family: "Roboto", sans-serif;
	font-size: <?php echo $this->settings["input-font-size"]; ?>px;
	line-height: <?php echo $this->settings["input-line-height"]; ?>px;
	font-weight: normal;

	padding-top: <?php echo $this->settings["input-padding-top"]; ?>px;
	padding-right: <?php echo $this->settings["input-padding-right"]; ?>px;
	padding-bottom: <?php echo $this->settings["input-padding-bottom"]; ?>px;
	padding-left: <?php echo $this->settings["input-padding-left"]; ?>px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: <?php echo $this->settings["input-default-color"]; ?>;
	background-color: <?php echo $this->settings["input-background-color"]; ?>;
	border-radius:  <?php echo $this->settings["input-border-radius"]; ?>px;
	height: <?php echo $this->settings["input-height"]; ?>px;

	transition: border <?php echo $this->settings["transition"]; ?>s ease,
		box-shadow <?php echo $this->settings["transition"]; ?>s ease;
}

.xui.form-select:focus{
	outline: none;
}

/* --- */

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-select<?php echo $selector; ?>{
	color: <?php echo $this->settings["form-text-".$context."-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-select<?php echo $selector; ?>:focus{
	color: <?php echo $this->settings["input-default-focus-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>; 
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

<?php }; ?>

.xui.form-select.-disabled,
.xui.form-select.-disabled:focus{
	outline: none;
	color: <?php echo $this->settings["form-text-disabled-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-disabled-border-color"]; ?>;
	box-shadow: none;
}

/*
// Select2
*/

.select2-container--default .selection .select2-selection{
	transition: border 0.3s ease, box-shadow 0.3s ease;
}

.select2-container .select2-selection--single{
	font-family: "Roboto", sans-serif;
	font-size: <?php echo $this->settings["input-font-size"]; ?>px;
	line-height: <?php echo $this->settings["input-line-height"]; ?>px;
	font-weight: normal;

	padding-top: <?php echo $this->settings["input-padding-top"]; ?>px;
	padding-right: <?php echo $this->settings["input-padding-right"]; ?>px;
	padding-bottom: <?php echo $this->settings["input-padding-bottom"]; ?>px;
	padding-left: <?php echo $this->settings["input-padding-left"]; ?>px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	height: <?php echo $this->settings["input-height"]; ?>px;
}

.select2-results__option{
	font-family: "Roboto", sans-serif;
	font-size: <?php echo $this->settings["input-font-size"]; ?>px;
	line-height: <?php echo $this->settings["input-line-height"]; ?>px;
	font-weight: normal;

	padding-top: <?php echo $this->settings["input-padding-top"]; ?>px;
	padding-right: <?php echo $this->settings["input-padding-right"]; ?>px;
	padding-bottom: <?php echo $this->settings["input-padding-bottom"]; ?>px;
	padding-left: <?php echo $this->settings["input-padding-left"]; ?>px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;
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
	margin-top: 1px;
}

.select2-container--open .select2-dropdown--below{
	margin-top: -1px;
}

.select2-container.select2-container--default.select2-container--open .select2-dropdown .select2-results{
	border: 0px;
	box-sizing: border-box;
}

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>

.select2-container--default<?php echo $selector; ?> .select2-selection--single .select2-selection__rendered{
	color: <?php echo $this->settings["form-text-".$context."-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-dropdown {
	overflow: hidden;
	border-radius: <?php echo $this->settings["input-border-radius"]; ?>px;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>; 
	background-clip: padding-box;
}

.select2-container--default<?php echo $selector; ?> .select2-dropdown.select2-dropdown--above{	
	border-radius: <?php echo $this->settings["input-border-radius"]; ?>px <?php echo $this->settings["input-border-radius"]; ?>px 0px 0px;
	border-bottom: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-dropdown.select2-dropdown--below{
	border-radius: 0px 0px <?php echo $this->settings["input-border-radius"]; ?>px <?php echo $this->settings["input-border-radius"]; ?>px;
	border-top: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-results__option{
	color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-results__option:hover,
.select2-container--default<?php echo $selector; ?> .select2-results__option.select2-results__option--highlighted{
	color: #FFFFFF;
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-results__option[aria-selected="true"]{
	font-weight: bold;
	background-color: #FFFFFF;
}

.select2-container--default<?php echo $selector; ?> .select2-results__option.select2-results__option--highlighted[aria-selected="true"]{
	font-weight: normal;
	color: #FFFFFF;
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?> .select2-selection--single {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>; 
}

.select2-container--default<?php echo $selector; ?> .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?> transparent transparent transparent;
}

.select2-container--default<?php echo $selector; ?>.select2-container--open .select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $this->settings["form-text-".$context."-border-color"]; ?> transparent;
}

.select2-container--default<?php echo $selector; ?> .select2-selection--single:focus {
	outline: none;
}

.select2-container--default<?php echo $selector; ?>.select2-container--focus .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?>.select2-container--focus .select2-selection.select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?> transparent transparent transparent;
}

.select2-container--default<?php echo $selector; ?>.select2-container--open .select2-selection.select2-selection--single{
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

.select2-container--default<?php echo $selector; ?>.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow b{
	border-color: transparent transparent <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?> transparent;
}

.select2-container--default<?php echo $selector; ?>.select2-container--focus .select2-selection--single {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>; 
}

.select2-container--default<?php echo $selector; ?>.select2-container--focus .select2-selection--single .select2-selection__arrow b{
	border-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?> transparent transparent transparent;
}

<?php }; ?>

.select2-container--default.-disabled .selection .select2-selection{
	box-shadow: none;
}


</style>

