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

.xui.box.-row{
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

.xui.box.-x1x1{
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

.xui.box.-x1x2{
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

.xui.box.-x2x1{
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

.xui.box.-x-900{
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

.xui.box.-space{
	position: relative;
	display: block;
	width: 100%;
	height: 0px;
	box-sizing: border-box;
	padding: 0px 0px 0px 0px;
	margin: 0px 0px 0px 0px;
	clear: both;
	overflow: hidden;
}

@media only screen and (min-width: 600px){

	.xui.box.-row{
		min-width: 480px;
		max-width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

	.xui.box.-x1x1 {
		min-width: 480px;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;
	}

	.xui.box.-x1x2:nth-child(1) {
		min-width: 480px;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;		
	}

	.xui.box.-x1x2:nth-child(2) {
		min-width: 480px;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;		
		padding-left: 16px;
		padding-right: 16px;
	}

	.xui.box.-x2x1{
		min-width: 480px;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;		
	}

	.xui.box.-x-900{
		min-width: 480px;
		max-width: 900px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;		
	}

	.xui.box.-space{
		height: 32px;
	}

}

@media only screen and (min-width: 1280px){

	.xui.box.-row{
		min-width: 960px;
		max-width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

	.xui.box.-x1x1 {
		width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;
	}

	.xui.box.-x1x2:nth-child(1) {
		float: left;
		width: 50%;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 8px;
	}

	.xui.box.-x1x2:nth-child(2) {
		float: right;
		width: 50%;
		max-width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 8px;
		padding-right: 16px;
	}

	.xui.box.-x2x1{
		min-width: 960px;
		max-width: 1280px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;
	}


	.xui.box.-x-900{
		max-width: 900px;
		width: 900px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;
	}

}

@media only screen and (min-width: 1600px){

	.xui.box.-row{
		max-width: 1280px;
		width: 1280px;
		margin-left: auto;
		margin-right: auto;
	}

	.xui.box.-x1x1 {
		max-width: 640px;
		width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 0px;
		padding-right: 0px;
	}

	.xui.box.-x1x2:nth-child(1) {
		float: left;
		max-width: 640px;
		width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 0px;
		padding-right: 8px;
	}

	.xui.box.-x1x2:nth-child(2) {
		float: right;
		max-width: 640px;
		width: 640px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 8px;
		padding-right: 0px;
	}

	.xui.box.-x2x1{
		max-width: 1280px;
		width: 1280px;
		padding-left: 0px;
		padding-right: 0px;
	}

	.xui.box.-x-900{
		max-width: 900px;
		width: 900px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 16px;
		padding-right: 16px;
	}
}

</style>
