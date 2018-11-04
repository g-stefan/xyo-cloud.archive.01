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

.xui.application{
	position: relative;
	width: 100%;
	height: 100%;
	overflow: visible;
	box-sizing: border-box;
}

.xui.application .xui.app-toolbar {
	position: relative;
	width: 100%;
	height: 48px;
	padding-left: 0px;
	padding-top: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	overflow: hidden;
	border-bottom: 1px solid #EEEEEE;
	box-shadow: none;
	z-index: 3;	
	box-sizing: border-box;
}

.xui.application .xui.application_content{
	position: relative;
	width: 100%;
	height: 100%;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	overflow: auto;
}

.xui.application .xui.application_content.-has-toolbar{
	position: relative;
	width: 100%;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	padding-top: 8px;
	padding-left: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	overflow: auto;		
	height: calc(100% - 48px);
}

.xui.application .xui.application-table{
	position: relative;
	width: 100%;
	height: 100%;
	overflow: visible;
}

.xui.application .xui.application-table .xui.application-table_toolbar-top{
	position: relative;
	height: 40px;
	width: 100%;
	overflow: visible;
	border-bottom: 1px solid #EEEEEE;
	box-shadow: none;
	box-sizing: border-box;
}

.xui.application .xui.application-table .xui.application-table_toolbar-bottom{
	position: relative;
	height: 40px;
	width: 100%;
	overflow: visible;
	padding-top: 3px;
	border-top: 1px solid #EEEEEE;
	border-bottom: 0px solid #EEEEEE;
	box-shadow: none;
	box-sizing: border-box;
}

.xui.application .xui.application-table .xui.application_content{
	position: relative;
	width: 100%;
	height: calc(100% - 84px);
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	padding-top: 8px;
	padding-left: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	overflow: auto;	
}

.xui-application .xui.application_content.-has-toolbar.-has-message-alert{
	height: calc(100% - 96px );
}

.xui-application .xui.application_content.-has-toolbar.-has-message-error{
	height: calc(100% - 96px);
}

.xui-application .xui.application_content.-has-toolbar.-has-message-alert.-has-message-error{
	height: calc(100% - 144px);
}

.xui.application-form{
	position: relative;
	display: block;
	width: 100%;
	padding-top: 0px;
	height: auto;
}

@media only screen and (min-width: 600px){

	.xui.application-form{
		padding-top: 16px;
	}

}

.xui.application .xui.app-toolbar{
	padding-top: 4px;
	padding-right: 8px;
	padding-bottom: 0px;
	padding-left: 8px;
}

.xui.dashboard .xui.application .xui.application_content{
	padding-top: 0px;
}


@media only screen and (min-width: 600px){

	.xui.application .xui.panel{
		margin-bottom: 16px;
	}

	.xui.application .xui.line{
		margin-bottom: 16px;
	}

}

.xui.application .xui.application-table .xui.application-table_toolbar-top {
	border-bottom: 0px solid #000000;
}

.xui.application .xui.alert{
	border-radius: 0px;
	border-left: 0px;
	border-right: 0px;
}

</style>