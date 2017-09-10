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

.xui-progress-bar{
	position: relative;
	display: block;
        vertical-align: middle;
	width: 100%;
	height: 24px;

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

	color: <?php echo $xuiPalette->colorTypeLabel["default"]; ?>;
	background-color: <?php echo $xuiPalette->colorPalette["xui-light-gray"]; ?>;

	border-radius: 3px;
	overflow: hidden;
}

/* --- */

.xui-progress-bar__bar{
	display: block;
	position: absolute;
	top: 0px;
	left: 0px;
	width: 50%;
	height: 24px;
	margin: 0px;
	padding: 0px;
}

.xui-progress-bar__label{
	display: inline-block;
	position: relative;
	width: 100%;
	text-align: center;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 2px;
	padding-right: 0px;
	padding-bottom: 2px;
	padding-left: 0px;
}

<?php foreach($xuiPalette->colorTypeButton as $key=>$value){ ?>

.xui-progress-bar--<?php echo $key; ?> .xui-progress-bar__bar{
	background-color: <?php echo $value; ?>;
}

<?php }; ?>

.xui-progress-bar--disabled{
	color: <?php echo $xuiPalette->colorTypeButtonText["disabled"]; ?>
}

/* --- */
