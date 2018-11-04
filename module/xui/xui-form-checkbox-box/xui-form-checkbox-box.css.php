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

.xui.form-checkbox.-box input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: 15px;
	left: 10px;
	content: " ";

	border-radius: 3px;

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

	transition: top 0.3s ease, left 0.3s ease, width 0.3s ease, height 0.3s ease, background-color 0.3s ease;

	background-color: transparent;
	background-image: none;
}

.xui.form-checkbox.-box input[type="checkbox"]:checked + label::after {
	top: 10px;
	left: 5px;
	width: 12px;
	height: 12px;

	background-color: <?php echo $this->settings["form-text-primary-border-color"]; ?>;	
	background-image: none;
}

.xui-form-checkbox.-box input[type="checkbox"]:focus:checked + label::after,
.xui.form-checkbox.-box input[type="checkbox"]:active:checked + label::after{
	top: 10px;
	left: 5px;
	width: 12px;
	height: 12px;

	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	background-image: none;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-checkbox.-box.-<?php echo $context; ?> input[type="checkbox"]:checked + label::after {
	background-color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
	background-image: none;	
}

.xui-form-checkbox.-box.-<?php echo $context; ?> input[type="checkbox"]:focus:checked + label::after,
.xui.form-checkbox.-box.-<?php echo $context; ?> input[type="checkbox"]:active:checked + label::after{
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	background-image: none;
}

<?php }; ?>


.xui.form-checkbox.-box.-disabled input[type="checkbox"]:checked + label::after,
.xui.form-checkbox.-box.-disabled input[type="checkbox"]:focus + label::after,
.xui.form-checkbox.-box.-disabled input[type="checkbox"]:active + label::after,
.xui-form-checkbox.-box.-disabled input[type="checkbox"]:focus:checked + label::after,
.xui.form-checkbox.-box.-disabled input[type="checkbox"]:active:checked + label::after {
	background-color: #CCCCCC;
	background-image: none;	
}

</style>

