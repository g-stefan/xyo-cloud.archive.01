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

.xui.form-input-group{
	position: relative;
	display: inline-block;
}

.xui.form-input-group > input{
	position: relative;
	float:left;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 6px;
	padding-bottom: 5px;
	padding-left: 6px;

	margin-top: 1px;
	margin-right: 0px;
	margin-bottom: 1px;
	margin-left: 1px;

	box-sizing: border-box;

	color: #444444;
	background-color: #FFFFFF;
	border: 0px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-radius: 0px 0px 0px 0px;
	box-shadow: 0px 0px 0px 1px <?php echo $this->settings["form-text-default-border-color"]; ?>;

	height: 30px;
	outline: none;
}

.xui.form-input-group > input:hover{
	outline: none;
	box-shadow: 0px 0px 0px 1px <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	transition: border 0.3s ease, box-shadow 0.3s ease;
	z-index: +1;
}

.xui.form-input-group > input:focus{
	position: relative;
	outline: none;
	color: #000000;
	background-color: #FFFFFF;

	box-shadow: 0px 0px 0px 4px <?php echo $this->settings["form-text-primary-focus-outline-color"]; ?>,
		0px 0px 0px 1px <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;		

	z-index: +2;
}

.xui.form-input-group > button{
	float:left;

	display: inline-block;
	position: relative;
	vertical-align: middle;
	user-select: none;
	cursor: pointer;

	font-size: 24px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 3px;
	padding-left: 3px;
	padding-bottom: 3px;
	padding-right: 3px;

	margin-top: 1px;
	margin-left: 1px;
	margin-bottom: 1px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;

	color: #444444;
	background-color: #FFFFFF;
	border: 0px solid <?php echo $this->settings["form-text-default-border-color"]; ?>;
	border-radius: 0px 0px 0px 0px;
	box-shadow: 0px 0px 0px 1px <?php echo $this->settings["form-text-default-border-color"]; ?>;

	outline: none;

	height: 30px;
	width: 30px;

}

.xui.form-input-group > button:hover{
	color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>; 
	box-shadow: 0px 0px 0px 1px <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
	z-index: +1;
}

.xui.form-input-group > button:focus{
	color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
	box-shadow: 0px 0px 0px 4px <?php echo $this->settings["form-text-primary-focus-outline-color"]; ?>,
		0px 0px 0px 1px <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;		
	z-index: +2;
}

.xui.form-input-group > button:active{
	color: #FFFFFF;
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.xui.form-input-group > *:first-child{
	border-radius: 3px 0px 0px 3px;
}

.xui.form-input-group > *:last-child{
	border-radius: 0px 3px 3px 0px;
	margin-right: 1px;
}

</style>