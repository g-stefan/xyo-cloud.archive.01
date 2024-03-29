<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.form-captcha {
	position: relative;
	display: inline-block;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	border: 0px solid #000000;
}

.xui.form-captcha img {
	position: relative;
	display: block;

	border-top: 1px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-bottom: 0px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;

	border-top-left-radius: 3px;
	border-top-right-radius: 3px;

	overflow: hidden;

	width: 200px;
	height: 48px;

	box-sizing: border-box;
}

.xui.form-captcha > .xui.form-input-group > input[type="text"]{
	border-top-left-radius: 0px;	
	width: <?php echo (200-33); ?>px;
}

.xui.form-captcha > .xui.form-input-group > button[type="button"]{
	border-top-right-radius: 0px;	
}

</style>
