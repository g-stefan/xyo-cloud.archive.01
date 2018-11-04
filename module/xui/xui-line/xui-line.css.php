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

.xui.line{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	background-color: <?php echo $this->settings["context-default-color"]; ?>;
	height: 3px;	
}

@media only screen and (min-width: 600px){

	.xui.line{
		min-width: 480px;
		max-width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

}


@media only screen and (min-width: 1280px){

	.xui.line{
		min-width: 960px;
		max-width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

}


@media only screen and (min-width: 1600px){

	.xui.line{
		max-width: 1280px;
		width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

}

</style>
