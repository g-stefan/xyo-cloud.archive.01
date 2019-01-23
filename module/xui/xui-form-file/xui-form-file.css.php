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

.xui.form-file{
	position:relative;
	display: inline-block;
	word-spacing: 0px;	
}

.xui.form-file_file {
	position: absolute;
	overflow: hidden;

	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	z-index: -1;
}

.xui.form-file_file + label {	
	position:relative;
	display: inline-block;
	float:left;

	vertical-align: top;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	border-top-left-radius: 3px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 0px;

	padding-top: 7px;
	padding-left: 35px;
	padding-bottom: 7px;
	padding-right: 11px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 3px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $this->settings["form-button-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-wall-color"]; ?>;


	font-family: "Roboto", sans-serif;

	cursor: pointer;	

	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;

	user-select: none;

	outline: none;

	transition: background-color 0.3s ease,border-color 0.3s ease;
}

.xui.form-file_file + label * {
	pointer-events: none;
}

.xui.form-file_file + label i {
	position: absolute;
	top: 6px;
	left: 6px;
}

.xui.form-file .xui.form-button.-icon {
	float:left;
	vertical-align: top;

	border-top-left-radius: 0px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 3px;
}

.xui.form-file_file:hover + label,
.xui.form-file_file:focus + label,
.xui.form-file_file + label:hover,
.xui.form-file_file.xui.form-file_file-focus + label{
	color: <?php echo $this->settings["form-button-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-focus-border-color"]; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $this->settings["form-button-focus-wall-color"]; ?>;
}

.xui.form-file_file:active + label{
	color: <?php echo $this->settings["form-button-focus-color"]; ?>;
	background-color: <?php echo $this->settings["form-button-focus-background-color"]; ?>;
	border: 1px solid <?php echo $this->settings["form-button-focus-border-color"]; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $this->settings["form-button-focus-wall-color"]; ?>;

	margin-top: 2px;
	margin-bottom: 1px;
}

</style>

