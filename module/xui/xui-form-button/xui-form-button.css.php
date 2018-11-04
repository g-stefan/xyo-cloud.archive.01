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

/* --- */

.xui.form-button{
	display: inline-block;
	position: relative;
	vertical-align: middle;
	user-select: none;
	cursor: pointer;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	border-radius: 3px;

	padding-top: 7px;
	padding-left: 11px;
	padding-bottom: 7px;
	padding-right: 11px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 3px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;

	color: <?php echo $this->settings["form-button-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-wall-color"]; ?>;

	outline: none;

	transition: background-color 0.3s ease, border-color 0.3s ease;
}

.xui.form-button:hover,
.xui.form-button:focus{
	color: <?php echo $this->settings["form-button-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-focus-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-focus-wall-color"]; ?>;
}

.xui.form-button:active{
	color: <?php echo $this->settings["form-button-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-focus-border-color"]; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $this->settings["form-button-focus-wall-color"]; ?>;

	margin-top: 2px;
	margin-bottom: 1px;
}

/* --- */

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>


.xui.form-button.-<?php echo $context; ?>{
	color: <?php echo $this->settings["form-button-".$context."-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-".$context."-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-".$context."-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-".$context."-wall-color"]; ?>;
}

.xui.form-button.-<?php echo $context; ?>:hover,
.xui.form-button.-<?php echo $context; ?>:focus{
	color: <?php echo $this->settings["form-button-".$context."-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-".$context."-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-".$context."-focus-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-".$context."-focus-wall-color"]; ?>;

}

.xui.form-button.-<?php echo $context; ?>:active{
	color: <?php echo $this->settings["form-button-".$context."-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-".$context."-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-".$context."-focus-border-color"]; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $this->settings["form-button-".$context."-focus-wall-color"]; ?>;
}

<?php }; ?>

.xui.form-button.-disabled,
.xui.form-button.-disabled:hover,
.xui.form-button.-disabled:focus,
.xui.form-button.-disabled:active{
	color: #CCCCCC;
	background-color: #FFFFFF;
	border: 1px solid #EEEEEE;
	box-shadow: 0px 3px 0px 0px #CCCCCC;
	margin-top: 0px;
	margin-bottom: 3px;
}

</style>

<?php $this->includeCSS("xui-form-button","xui-form-button-icon"); ?>
<?php $this->includeCSS("xui-form-button","xui-form-button-icon-left"); ?>
<?php $this->includeCSS("xui-form-button","xui-form-button-icon-right"); ?>
