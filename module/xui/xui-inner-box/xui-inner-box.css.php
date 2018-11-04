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

.xui.inner-box.-row{
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
}

.xui.inner-box.-x1x2{
	position: relative;
	display: block;
	width: 100%;
	box-sizing: border-box;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	padding-left: 0px;
}

@media only screen and (min-width: 600px){

	.xui.inner-box.-x1x2:nth-child(1) {
		padding-left: 16px;
		padding-right: 16px;		
	}

	.xui.inner-box.-x1x2:nth-child(2) {
		padding-left: 16px;
		padding-right: 16px;
	}

}

@media only screen and (min-width: 1280px){

	.xui.inner-box.-x1x2:nth-child(1) {
		float: left;
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 8px;
	}

	.xui.inner-box.-x1x2:nth-child(2) {
		float: right;
		width: 50%;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 8px;
		padding-right: 16px;
	}

}

@media only screen and (min-width: 1600px){

	.xui.inner-box.-x1x2:nth-child(1) {
		float: left;
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		padding-left: 0px;
		padding-right: 8px;
	}

	.xui.inner-box.-x1x2:nth-child(2) {
		float: right;
		width: 50%;
		margin-left: auto;
		margin-right: auto;
		padding-left: 8px;
		padding-right: 0px;
	}

}


</style>
