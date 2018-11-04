<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.alert {
	display: block;
	position: relative;
	width: auto;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;
	font-family: "Roboto", sans-serif;

	border-radius: 3px;

	padding-top: 13px;
	padding-left: 16px;
	padding-bottom: 13px;
	padding-right: 16px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	color: #444444;
	background-color: #FFFFFF;
	border-top: 1px solid #DDDDDD; 
	border-right: 1px solid #DDDDDD;
	border-bottom: 1px solid #DDDDDD;
	border-left: 1px solid #DDDDDD;
}

<?php foreach($this->context as $context){ ?>
<?php if($context=="default"){ continue; }; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.alert.-<?php echo $context; ?> {
	color: <?php echo $this->settings["alert-".$context."-color"]; ?>;
	background-color: <?php echo $this->settings["alert-".$context."-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["alert-".$context."-border-color"]; ?>;
}

<?php }; ?>

.xui.alert.-disabled {
	color: #EEEEEE;
	background-color: #FFFFFF;
	border: 1px solid #EEEEEE;
}


</style>

