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
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-25);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

.xui-form-button-icon{
	display: inline-block;
	position: relative;
	vertical-align: middle;
	user-select: none;
	cursor: pointer;

	font-size: 24px;
	line-height: 24px;
	font-weight: normal;

	border-radius: 3px;

	padding-top: 5px;
	padding-left: 10px;
	padding-bottom: 5px;
	padding-right: 10px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 3px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiPalette->colorTypeButtonText["default"]; ?>;
	background-color: <?php echo $color; ?>;

	font-family: "Roboto", sans-serif;

	border: 1px solid <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon i{
	position: relative;
	display: block;

	width: 24px;
	height: 24px;

	font-size: 24px;
	line-height: 24px;
	font-weight: normal;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;
}

.xui-form-button-icon:focus{
	outline: none;
}

.xui-form-button-icon:hover, .xui-form-button-icon:focus{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
}

.xui-form-button-icon:active{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
	margin-top: 2px;
	margin-bottom: 1px;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWall; ?>;
}

/* --- */

.xui-form-button-icon--default{
}

<?php 

foreach($xuiPalette->colorTypeButton as $key=>$value){
	if($key=="default"){
		continue;
	};
	if($key=="disabled"){
		continue;
	};

	$color=$value;
	$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-15);
	$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>
.xui-form-button-icon--<?php echo $key; ?>{
	color: <?php echo $xuiPalette->colorTypeButtonText[$key]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon--<?php echo $key; ?>:hover, .xui-form-button-icon--<?php echo $key; ?>:focus{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
}

.xui-form-button-icon--<?php echo $key; ?>:active{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWall; ?>;
}

<?php }; 

$color=$xuiPalette->colorTypeButton["disabled"];
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-20);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

.xui-form-button-icon--disabled{
	cursor: default;
	color: <?php echo $xuiPalette->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon--disabled:hover, .xui-form-button-icon--disabled:focus{
	cursor: default;
	color: <?php echo $xuiPalette->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon--disabled:active{
	cursor: default;
	color: <?php echo $xuiPalette->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
	margin-top: 0px;
	margin-bottom: 3px;
}

/* --- */
