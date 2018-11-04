<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.form-textarea{
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
	height: auto;
	width: 100%;

	transition: border <?php echo $this->settings["transition"]; ?>s ease,
		box-shadow <?php echo $this->settings["transition"]; ?>s ease;
}

.xui.form-textarea:focus{
	outline: none;
}

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-textarea<?php echo $selector; ?>{
	color: <?php echo $this->settings["form-text-".$context."-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-border-color"]; ?>; 
}

.xui.form-textarea<?php echo $selector; ?>:focus{
	color: <?php echo $this->settings["input-default-focus-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>; 
	box-shadow: 0px 0px 0px 3px <?php echo $this->settings["form-text-".$context."-focus-outline-color"]; ?>;
}

<?php }; ?>

.xui.form-textarea.-disabled,
.xui.form-textarea.-disabled:focus{
	outline: none;
	color: <?php echo $this->settings["form-text-disabled-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-text-disabled-border-color"]; ?>;
	box-shadow: none; 
}

</style>