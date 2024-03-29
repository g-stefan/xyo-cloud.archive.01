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

.xui.form-text-icon-right{
	position: relative;
	display: inline-block;
}

</style>

<?php $this->includeCSSComponentSelector("xui-form-text","xui-form-text","","-icon-right"," > input"); ?>

<style>

.xui.form-text-icon-right input{
	padding-right: 32px;
}

.xui.form-text-icon-right i{
	display: block;
	position: absolute;
	top: 4px;
	right: 4px;
	font-size: 24px;
	line-height: 24px;

	color: <?php echo $this->settings["form-text-icon-right-default-icon-color"]; ?>;

	transition: all 0.3s ease;
}

.xui.form-text-icon-right input:focus + i{
	color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-text-icon-right.-<?php echo $context; ?> i{
	color: <?php echo $this->settings["form-text-".$context."-border-color"]; ?>;
}

.xui.form-text-icon-right.-<?php echo $context; ?> input:focus + i{
	color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

<?php }; ?>

.xui.form-text-icon-right.-disabled i{
	color: #CCCCCC;
}

.xui.form-text-icon-right.-disabled input:focus + i{
	color: #CCCCCC;
}

</style>

<?php $this->includeCSS("xui-form-text-icon-right","xui-form-text-icon-right-required"); ?>

