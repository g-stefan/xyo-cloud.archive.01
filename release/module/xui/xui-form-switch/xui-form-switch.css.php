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

.xui.form-switch{
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

.xui.form-switch input[type="checkbox"]{
	position: absolute;
	top: 0px;
	left: 0px;
	display: block;
	opacity: 0;
}

.xui.form-switch label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 8px;
	padding-bottom: 4px;
	padding-left: 52px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	color: #000000;
}

.xui.form-switch label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	left: 0px;
	top: 5px;
	content: " ";

	width: 44px;
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

	border: 1px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-radius: 3px;

	transition: all 0.3s ease;
}

.xui.form-switch input[type="checkbox"]:focus + label::before,
.xui.form-switch input[type="checkbox"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-primary-focus-outline-color"]; ?>;
}

.xui.form-switch input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $this->settings["form-text-primary-border-color"]; ?>;
	background-color: <?php echo $this->settings["form-text-primary-border-color"]; ?>;
}

.xui.form-switch input[type="checkbox"]:checked:focus + label::before,
.xui.form-switch input[type="checkbox"]:checked:active + label::before {
	border: 1px solid <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.xui.form-switch input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: 8px;
	left: 3px;
	content: " ";

	border-radius: 3px;

	width: 16px;
	height: 16px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background-color: <?php echo $this->color->rgbHexHSLAdjustL($this->settings["form-text-default-border-color"],-15); ?>;

	transition: all 0.3s ease;
}

.xui.form-switch input[type="checkbox"]:checked + label::after {
	top: 8px;
	left: 25px;	

	background-color: #FFFFFF;
}

.xui.form-switch input[type="checkbox"]:focus + label::after,
.xui.form-switch input[type="checkbox"]:active + label::after {
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.xui.form-switch input[type="checkbox"]:focus:checked + label::after,
.xui.form-switch input[type="checkbox"]:active:checked + label::after {
	top: 8px;
	left: 25px;	

	background-color: #FFFFFF;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-switch.-<?php echo $context; ?> label::before {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:focus + label::before,
.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:active + label::before {
	outline: none;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
	background-color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:checked:focus + label::before,
.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:checked:active + label::before {
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"] + label::after {
	background-color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:focus + label::after,
.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:active + label::after {
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.xui.form-switch.-<?php echo $context; ?> input[type="checkbox"]:checked + label::after {
	background-color: #FFFFFF;
}

<?php }; ?>

.xui.form-switch.-disabled label::before {
	border: 1px solid #CCCCCC;
}

.xui.form-switch.-disabled input[type="checkbox"]:focus + label::before,
.xui.form-switch.-disabled input[type="checkbox"]:active + label::before {
	outline: none;
	border: 1px solid #CCCCCC;
	box-shadow: none;
}

.xui.form-switch.-disabled input[type="checkbox"]:checked + label::before {
	border: 1px solid #CCCCCC;
	background-color: #CCCCCC;
}

.xui.form-switch.-disabled input[type="checkbox"]:checked:focus + label::before,
.xui.form-switch.-disabled input[type="checkbox"]:checked:active + label::before {
	border: 1px solid #CCCCCC;
	background-color: #CCCCCC;
}

.xui.form-switch.-disabled input[type="checkbox"] + label::after {
	background-color: #CCCCCC;
}

.xui.form-switch.-disabled input[type="checkbox"]:focus + label::after,
.xui.form-switch.-disabled input[type="checkbox"]:active + label::after {
	background-color: #CCCCCC;
}

.xui.form-switch.-disabled input[type="checkbox"]:checked + label::after {
	background-color: #FFFFFF;
}


</style>

