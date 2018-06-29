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

.xui-panel{
	position: relative;
	display: block;
	width: 100%;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	box-sizing: border-box;
	border-left: 0px solid #000000;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	background-color: #FFFFFF;

	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-top: 0px solid #000000;

	<?php $xuiElevation->eElevationCss(4); ?>
}

.xui-panel__title{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;

	border-top: 0px solid #000000;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	border-left: 0px solid #000000;
	color: <?php echo $xuiTheme->panel["color.title.color"]; ?>;
	background-color: <?php echo $xuiTheme->panel["color.title.background"]; ?>;
	
	min-height: 40px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-right: 10px;
	overflow: hidden;
	font-size: 16px;
	line-height: 20px;
}

.xui-panel__content{
	position: relative;
	display: block;
	width: 100%;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	box-sizing: border-box;
	border-top: 0px solid #000000;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	border-left: 0px solid #000000;
}

.xui-panel__footer{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;

	border-top: 0px solid #000000;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	border-left: 0px solid #000000;
	color: <?php echo $xuiTheme->panel["color.title.color"]; ?>;
	background-color: <?php echo $xuiTheme->panel["color.title.background"]; ?>;
	
	min-height: 40px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-right: 10px;
	overflow: hidden;
	font-size: 16px;
	line-height: 20px;
}

.xui-panel__line{
	margin-left: 10px;
	margin-right: 10px;
	overflow:hidden;
	height:1px;
	background-color: <?php echo $xuiTheme->panel["color.border"]; ?>;
	clear: both;
}

.xui-panel__separator{
	margin-top: 8px;
	margin-bottom: 8px;
	overflow:hidden;
	height:1px;
	background-color: <?php echo $xuiTheme->panel["color.border"]; ?>;
	clear: both;
}

@media only screen and (min-width: 600px){


	.xui-panel{
		border-top-left-radius: 0px;
		border-top-right-radius: 0px;
		border-bottom-left-radius: 3px;
		border-bottom-right-radius: 3px;
		border-top: 0px solid #000000;
		border-left: 0px solid <?php echo $xuiTheme->panel["color.border"]; ?>;
		border-right: 0px solid <?php echo $xuiTheme->panel["color.border"]; ?>;
		border-bottom: 0px solid <?php echo $xuiTheme->panel["color.border"]; ?>;		
	}

}

