/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/


/* --- dasboard --- */

.xui-dashboard{
	position: relative;
	width: 100%;
	height: 100%;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-content{
	position: relative;
	display: block;
	height: calc(100% - 48px);
	overflow:auto;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	transition: width 0.5s ease, margin 0.5s ease;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard__content-cover{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 0px;
	overflow:hidden;
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	opacity: 0;
	transition: opacity 0.5s ease;
	background-color: #000000;
	z-index: 3;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}




