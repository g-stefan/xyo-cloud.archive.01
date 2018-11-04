<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-app-brand");
$this->buildUI();

$this->settings["app-brand-logo-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-mint-1"],0,0,-15);
$this->settings["app-brand-color"]=$this->settings["app-bar-background-color"];
$this->settings["app-brand-mark-color"]="#000000";
