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

.xui-form-captcha{
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
}

.xui-form-captcha img{
	position: relative;
	display: block;

	border-top: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-bottom: 0px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	border-top-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-top-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;

	overflow: hidden;

	width: 200px;
	height: 48px;

	box-sizing: border-box;
}

.xui-form-captcha__input{
	display: block;
	position: relative;

	width: 100%;
	height: 32px;
}

.xui-form-captcha__input input[type="text"]{
	display: block;
	position: absolute;
	
	width: calc(100% - 32px) !important;
	overflow:hidden;
	top: 0px;
	left: 0px;
	right: 32px;

	border-top-right-radius: 0px;
	border-top-left-radius: 0px;
	border-bottom-right-radius: 0px;
	border-bottom-left-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
}

.xui-form-captcha__input button[type="button"]{
	position: absolute;
	top: 0px;
	right: 0px;	

	border-right: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	border-top-right-radius: 0px;
	border-top-left-radius: 0px;
	border-bottom-right-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;
	border-bottom-left-radius: 0px;
}

