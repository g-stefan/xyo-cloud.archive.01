<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-app-toolbar");
$this->buildJS("xui-app-toolbar");
$this->buildUI();

$this->settings["app-toolbar-background-color"]="#FFFFFF";
$this->settings["app-toolbar-color"]="#000000";
$this->settings["app-toolbar-height"]=48;
$this->settings["app-toolbar-padding"]=4;
$this->settings["app-toolbar-buton-hover-background-color"]=$this->palette["rock-2"];
$this->settings["app-toolbar-buton-ripple-background-color"]=$this->palette["rock-4"];
