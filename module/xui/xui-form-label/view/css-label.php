<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-form-label{
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 6px;
	padding-right: 0px;
	padding-bottom: 6px;
	padding-left: 0px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiTheme->colorTypeLabel["default"]; ?>;

}

/* --- */

<?php foreach($xuiTheme->colorTypeLabel as $key=>$value){ ?>

.xui-form-label_<?php echo $key; ?>{
	color: <?php echo $value; ?>;
}

<?php }; ?>

.xui-form-label_disabled{
	color: <?php echo $xuiTheme->colorTypeLabel["disabled"]; ?>
}

/* --- */
