<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.form-radio{
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

.xui.form-radio input[type="radio"]{
	display: none;
}

.xui.form-radio label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 8px;
	padding-bottom: 4px;
	padding-left: 30px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	color: #000000;
}

.xui.form-radio label::before {
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

	border: 1px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;

	transition: border 0.3s ease, box-shadow 0.3s ease;
}

.xui.form-radio input[type="radio"]:focus + label::before,
.xui.form-radio input[type="radio"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-primary-focus-outline-color"]; ?>;
}

.xui.form-radio input[type="radio"] + label::after {
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
	transition: background-color 0.3s ease;
}

.xui.form-radio input[type="radio"]:focus + label::after,
.xui.form-radio input[type="radio"]:active + label::after {
	background-color: <?php echo $this->settings["form-text-primary-focus-outline-color"]; ?>;
}

.xui.form-radio input[type="radio"]:checked + label::after {
	background-color: <?php echo $this->settings["form-text-primary-border-color"]; ?>;
}

.xui.form-radio input[type="radio"]:focus:checked + label::after,
.xui.form-radio input[type="radio"]:active:checked + label::after{
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-radio.-<?php echo $context; ?> label::before {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:focus + label::before,
.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:focus + label::after,
.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:active + label::after {
	background-color: <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:checked + label::after {
	background-color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:focus:checked + label::after,
.xui.form-radio.-<?php echo $context; ?> input[type="radio"]:active:checked + label::after{
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

<?php }; ?>

.xui.form-radio.-disabled label::before {
	border: 1px solid <?php echo $this->settings["form-text-disabled-border-color"]; ?>;
}

.xui.form-radio.-disabled input[type="radio"]:focus + label::before,
.xui.form-radio.-disabled input[type="radio"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $this->settings["form-text-disabled-border-color"]; ?>;
	box-shadow: none;
}

.xui.form-radio.-disabled input[type="radio"]:focus + label::after,
.xui.form-radio.-disabled input[type="radio"]:active + label::after {
	background-color: #FFFFFF;
}

.xui.form-radio.-disabled input[type="radio"]:checked + label::after,
.xui.form-radio.-disabled input[type="radio"]:focus:checked + label::after,
.xui.form-radio.-disabled input[type="radio"]:active:checked + label::after{
	background-color: #CCCCCC;
}

</style>

