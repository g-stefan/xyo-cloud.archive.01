<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?>

/* --- */

<?php

$color=$xuiTheme->theme["default"]["button"]["normal"]["color"];
$colorBorder=$xuiTheme->theme["default"]["button"]["normal"]["color.high"];
$colorWall=$xuiTheme->theme["default"]["button"]["normal"]["color.low"];

$colorHover=$xuiTheme->theme["default"]["button"]["active"]["color"];
$colorHoverBorder=$xuiTheme->theme["default"]["button"]["active"]["color.high"];
$colorHoverWall=$xuiTheme->theme["default"]["button"]["active"]["color.low"];

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

	color: <?php echo $xuiTheme->theme["default"]["button"]["normal"]["color.contrast"]; ?>;

	font-family: "Roboto", sans-serif;

	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;

	outline: none;

	transition: background-color 0.3s ease,border-color 0.3s ease;
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

.xui-form-button-icon:hover,
.xui-form-button-icon:focus{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorHoverWall; ?>;
	color: <?php echo $xuiTheme->theme["default"]["button"]["active"]["color.contrast"]; ?>;
}

.xui-form-button-icon:active{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorHoverWall; ?>;
	color: <?php echo $xuiTheme->theme["default"]["button"]["active"]["color.contrast"]; ?>;

	margin-top: 2px;
	margin-bottom: 1px;
}

/* --- */

.xui-form-button-icon_default{
}

<?php 

foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};
	if($context=="disabled"){
		continue;
	};

	$color=$xuiTheme->theme[$context]["button"]["normal"]["color"];
	$colorBorder=$xuiTheme->theme[$context]["button"]["normal"]["color.high"];
	$colorWall=$xuiTheme->theme[$context]["button"]["normal"]["color.low"];

	$colorHover=$xuiTheme->theme[$context]["button"]["active"]["color"];
	$colorHoverBorder=$xuiTheme->theme[$context]["button"]["active"]["color.high"];
	$colorHoverWall=$xuiTheme->theme[$context]["button"]["active"]["color.low"];

?>
.xui-form-button-icon_<?php echo $context; ?>{
	color: <?php echo $xuiTheme->theme[$context]["button"]["normal"]["color.contrast"]; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon_<?php echo $context; ?>:hover,
.xui-form-button-icon_<?php echo $context; ?>:focus{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorHoverWall; ?>;
	color: <?php echo $xuiTheme->theme[$context]["button"]["active"]["color.contrast"]; ?>;
}

.xui-form-button-icon_<?php echo $context; ?>:active{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorHoverWall; ?>;
	color: <?php echo $xuiTheme->theme[$context]["button"]["active"]["color.contrast"]; ?>;
}

<?php }; 

$color=$xuiTheme->theme["disabled"]["button"]["normal"]["color"];
$colorBorder=$xuiTheme->theme["disabled"]["button"]["normal"]["color.high"];
$colorWall=$xuiTheme->theme["disabled"]["button"]["normal"]["color.low"];
$colorText=$xuiTheme->theme["disabled"]["button"]["normal"]["color.contrast"];

?>

.xui-form-button-icon_disabled{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon_disabled:hover, .xui-form-button-icon_disabled:focus{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon_disabled:active{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
	margin-top: 0px;
	margin-bottom: 3px;
}

/* --- */
