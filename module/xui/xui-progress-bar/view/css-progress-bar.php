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

	color: <?php echo $xuiTheme->theme["default"]["alert"]["color.text"]; ?>;
	background-color: 1px solid <?php echo $xuiTheme->theme["default"]["alert"]["color.background"]; ?>;
	border: 0px solid <?php echo $xuiTheme->theme["default"]["alert"]["color.border"]; ?>; 

	border-radius: 3px;
	overflow: hidden;
}

/* --- */

.xui-progress-bar__background{
	display: block;
	position: absolute;
	top: 0px;
	left: 0px;
	height: 24px;
	margin: 0px;
	padding: 0px;
	width: 100%;
	box-sizing: border-box;
	border: 1px solid <?php echo $xuiTheme->theme["default"]["alert"]["color.border"]; ?>; 
	border-radius: 3px;
}

.xui-progress-bar__bar{
	display: block;
	position: absolute;
	top: 0px;
	left: 0px;
	width: 50%;
	height: 24px;
	margin: 0px;
	padding: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiTheme->theme["primary"]["alert"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme["primary"]["alert"]["color.background"]; ?>;
	border: 1px solid <?php echo $xuiTheme->theme["primary"]["alert"]["color.border"]; ?>; 

	border-radius: 3px;
}

.xui-progress-bar__label{
	display: inline-block;
	position: relative;
	width: 100%;
	text-align: center;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 2px;
	padding-right: 0px;
	padding-bottom: 2px;
	padding-left: 0px;

	color: <?php echo $xuiTheme->theme["default"]["alert"]["color.text"]; ?>;
}

<?php foreach($xuiTheme->theme as $context=>&$value){
	if($context=="default"){
		continue;
	};
?>

.xui-progress-bar_<?php echo $context; ?> .xui-progress-bar__bar {
	color: <?php echo $xuiTheme->theme[$context]["alert"]["color.text"]; ?>;
	background-color: <?php echo $xuiTheme->theme[$context]["alert"]["color.background"]; ?>;
	border: 1px solid <?php echo $xuiTheme->theme[$context]["alert"]["color.border"]; ?>; 
}

.xui-progress-bar_<?php echo $context; ?> .xui-progress-bar__label {
	color: <?php echo $xuiTheme->theme[$context]["alert"]["color.text"]; ?>;
}

<?php }; ?>

/* --- */

.xui-progress-bar_disabled .xui-progress-bar__background {
	border: 1px solid <?php echo $xuiTheme->theme["disabled"]["alert"]["color.border"]; ?>; 
}
