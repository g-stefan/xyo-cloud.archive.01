<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-action");
$this->buildUI();

$delta=10;
$this->settings["action-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],30+$delta);
$this->settings["action-hover-ripple-background-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],20+$delta);
$this->settings["action-selected-background-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],30+$delta);
$this->settings["action-selected-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],20+$delta);
$this->settings["action-selected-hover-ripple-background-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],10+$delta);
$this->settings["action-selected-left-color"]=$this->color->rgbHexHSLAdjustL($this->xuiPalette->palette["science-blue-1"],-15+$delta);
$this->settings["action-selected-icon-left-color"]=$this->settings["app-bar-background-color"];
