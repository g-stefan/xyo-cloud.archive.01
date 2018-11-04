<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-action");
$this->buildUI();

$this->settings["action-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,30);
$this->settings["action-hover-ripple-background-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,20);
$this->settings["action-selected-background-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,30);
$this->settings["action-selected-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,20);
$this->settings["action-selected-hover-ripple-background-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,10);
$this->settings["action-selected-left-color"]=$this->color->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-1"],0,0,-15);
$this->settings["action-selected-icon-left-color"]=$this->settings["app-bar-background-color"];
