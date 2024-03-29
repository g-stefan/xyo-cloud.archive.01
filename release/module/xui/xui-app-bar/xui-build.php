<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-app-bar");
$this->buildUI();

$this->settings["app-bar-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["science-blue-1"],-30);
$this->settings["app-bar-color"]="#FFFFFF";
$this->settings["app-bar-buton-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["science-blue-1"],-15);
$this->settings["app-bar-buton-ripple-background-color"]=$this->palette["science-blue-2"];
$this->settings["app-bar-height"]=48;
$this->settings["app-bar-padding"]=4;
