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

.xui.form-text-required{
	position: relative;
	display: inline-block;
}

</style>

<?php $this->includeCSSComponentSelector("xui-form-text","xui-form-text","","-required"," > input"); ?>

<style>

.xui.form-text-required::after{
	content: "";
	display: block;
	position: absolute;
	top: 3px;
	right: 3px;
	width: 8px;
	height: 8px;
	box-sizing: border-box;
	border-radius: <?php echo $this->settings["input-border-radius"]; ?>px;
	overflow: hidden;
	background-color: <?php echo $this->settings["form-text-required-color"]; ?>;
}

.xui.form-text-required.-disabled::after{
	background-color: #CCCCCC;
}

</style>