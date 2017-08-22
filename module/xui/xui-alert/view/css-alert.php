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

<?php

$color=$xuiPalette->colorTypeButton["default"];
$colorBackground=$xuiColor->rgbHexHSLAdjust($color,0,0,30);
$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,0);
$colorText=$xuiColor->rgbHexHSLAdjust($color,0,0,-30);

?>

.xui-alert{
	display: block;
	position: relative;
	width: 100%;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;
	font-family: "Roboto", sans-serif;

	border-radius: 0px;

	padding-top: 13px;
	padding-left: 16px;
	padding-bottom: 13px;
	padding-right: 16px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $colorText; ?>;
	background-color: <?php echo $colorBackground; ?>;
	border-top: 1px solid <?php echo $colorBorder; ?>; 
	border-right: 1px solid <?php echo $colorBorder; ?>;
	border-bottom: 1px solid <?php echo $colorBorder; ?>;
	border-left: 1px solid <?php echo $colorBorder; ?>;
}

/* --- */

<?php 

foreach($xuiPalette->colorTypeButton as $key=>$value){

	$color=$value;
	$colorBackground=$xuiColor->rgbHexHSLAdjust($color,0,0,30);
	$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,0);
	$colorText=$xuiColor->rgbHexHSLAdjust($color,0,0,-30);

?>
.xui-alert--<?php echo $key; ?>{
	color: <?php echo $colorText; ?>;
	background-color: <?php echo $colorBackground; ?>;
	border-top: 1px solid <?php echo $colorBorder; ?>; 
	border-right: 1px solid <?php echo $colorBorder; ?>;
	border-bottom: 1px solid <?php echo $colorBorder; ?>;
	border-left: 1px solid <?php echo $colorBorder; ?>;
}

<?php }; ?>

