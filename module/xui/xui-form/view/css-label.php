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

.xui-form__label{
	display: inline-block;
        vertical-align: middle;

	font-size: 16px;
	line-height: 16px;
	font-weight: normal;

	box-sizing: border-box;
	padding-top: 4px;
	padding-left: 0px;
	padding-bottom: 4px;
	padding-right: 0px;

	color: <?php echo $xuiPalette->colorTypeLabel["default"]; ?>;
}

/* --- */

<?php foreach($xuiPalette->colorTypeLabel as $key=>$value){ ?>

.xui-form__label--<?php echo $key; ?>{
	color: <?php echo $value; ?>;
}

<?php }; ?>

.xui-form__label--disabled{
	color: <?php echo $xuiPalette->colorTypeLabel["disabled"]; ?>
}

/* --- */
