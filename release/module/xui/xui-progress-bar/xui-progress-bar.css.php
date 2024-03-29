<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.progress-bar{
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

	border-radius: 3px;
	overflow: hidden;
}

/* --- */

.xui.progress-bar_background{
	display: block;
	position: absolute;
	top: 0px;
	left: 0px;
	height: 24px;
	margin: 0px;
	padding: 0px;
	width: 100%;
	box-sizing: border-box;
	border: 1px solid <?php echo $this->settings["progress-bar-border-color"]; ?>;
	border-radius: 3px;
}

.xui.progress-bar_bar{
	display: block;
	position: absolute;
	top: 0px;
	left: 0px;
	width: 50%;
	height: 24px;
	margin: 0px;
	padding: 0px;

	box-sizing: border-box;

	border-radius: 3px;
}

.xui.progress-bar_label{
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
}

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>

.xui.progress-bar<?php echo $selector; ?> > .xui.progress-bar_bar {
	color: <?php echo $this->settings["progress-bar-".$context."-color"]; ?>;
	background-color: <?php echo $this->settings["progress-bar-".$context."-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["progress-bar-".$context."-border-color"]; ?>;
}

.xui.progress-bar<?php echo $selector; ?> > .xui.progress-bar_label {
	color: <?php echo $this->settings["progress-bar-".$context."-color"]; ?>;
}

<?php }; ?>

</style>

