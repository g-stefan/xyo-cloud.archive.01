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

.xui.app-brand{
	position: relative;
	width: 100%;
	height: 48px;	
	padding-left: 16px;
	padding-top: 4px;
	padding-bottom: 4px;
	padding-right: 4px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui.app-brand > .xui.app-brand_content{
	position: relative;
	width: 100%;
	height: 40px;	
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;
}

.xui.app-brand > .xui.app-brand_content > .xui.app-brand_logo{
	position: relative;
	margin-left: 4px;
	margin-top: 4px;
	margin-bottom: 4px;
	margin-right: 4px;
	 
<?php

$color=$this->settings["app-brand-logo-color"];

$svg="<?xml version=\"1.0\" encoding=\"UTF-8\"?>".
"<svg viewBox=\"0 0 128 128\" xmlns=\"http://www.w3.org/2000/svg\">".
" <g transform=\"translate(0,0)\">".
"  <path ".
"style=\"fill:".$color.";fill-opacity:1\" ".
"d=\"M 64.00437,-9.5705332e-8 A 63.999365,63.999378 0 0 0 2.0154263e-7,63.995543 63.999365,63.999378 0 0 0 64.00437,128 63.999365,63.999378 0 0 0 128,63.995543 63.999365,63.999378 0 0 0 64.00437,-9.5705332e-8 Z M 64.00437,24.67309 A 39.322499,39.322502 0 0 1 103.32686,63.995543 39.322499,39.322502 0 0 1 64.00437,103.3182 39.322499,39.322502 0 0 1 24.68188,63.995543 39.322499,39.322502 0 0 1 64.00437,24.67309 Z\" ".
"/>".
" </g>".
"</svg>";

	echo "background-image: url(\"data:image/svg+xml;base64,".base64_encode($svg)."\");\n\t";

?>
	
	float: left;
	width: 32px;
	height:32px;
}

.xui.app-brand > .xui.app-brand_content > .xui.app-brand_name{
	float: left;
	margin-left: 20px;
	margin-top: 4px;
	margin-bottom: 4px;
	margin-right: 4px;
	font-size: 32px;
	line-height: 32px;
	font-weight: bold;	
	overflow: hidden;
	width: auto;
	opacity: 1;
	transition: opacity 0.5s ease;
	color: <?php echo $this->settings["app-brand-color"]; ?>;
}

.xui.app-brand > .xui.app-brand_content > .xui.app-brand_mark{
	margin-left: 0px;
	margin-top: 4px;
	margin-bottom: 4px;
	margin-right: 4px;
	float: left;	
	font-size: 10px;
	line-height: 10px;	
	overflow: hidden;
	width: auto;
	opacity: 1;
	transition: opacity 0.5s ease;
	color: <?php echo $this->settings["app-brand-mark-color"]; ?>;
}

</style>
