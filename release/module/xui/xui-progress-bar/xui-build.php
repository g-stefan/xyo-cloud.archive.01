<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-progress-bar");
$this->buildUI();

//
$this->settings["progress-bar-border-color"]="#DDDDDD";
//
$this->settings["progress-bar-default-color"]="#000000";
$this->settings["progress-bar-default-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],40);
$this->settings["progress-bar-default-border-color"]=$this->palette["sky-blue-2"];
//
$this->settings["progress-bar-primary-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-30);
$this->settings["progress-bar-primary-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],30);
$this->settings["progress-bar-primary-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-15);
//
$this->settings["progress-bar-success-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-30);
$this->settings["progress-bar-success-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],30);
$this->settings["progress-bar-success-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-15);
//
$this->settings["progress-bar-info-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-30);
$this->settings["progress-bar-info-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],30);
$this->settings["progress-bar-info-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-15);
//
$this->settings["progress-bar-warning-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-30);
$this->settings["progress-bar-warning-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],30);
$this->settings["progress-bar-warning-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-15);
//
$this->settings["progress-bar-danger-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-30);
$this->settings["progress-bar-danger-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],30);
$this->settings["progress-bar-danger-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-15);
//
$this->settings["progress-bar-disabled-color"]="#EEEEEE";
$this->settings["progress-bar-disabled-background-color"]="#FFFFFF";
$this->settings["progress-bar-disabled-border-color"]="#EEEEEE";
