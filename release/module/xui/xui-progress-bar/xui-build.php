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
$this->settings["progress-bar-default-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,40);
$this->settings["progress-bar-default-border-color"]=$this->palette["core-blue-jeans-2"];
//
$this->settings["progress-bar-primary-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-30);
$this->settings["progress-bar-primary-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,30);
$this->settings["progress-bar-primary-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-15);
//
$this->settings["progress-bar-success-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-30);
$this->settings["progress-bar-success-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,30);
$this->settings["progress-bar-success-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-15);
//
$this->settings["progress-bar-info-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-30);
$this->settings["progress-bar-info-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,30);
$this->settings["progress-bar-info-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-15);
//
$this->settings["progress-bar-warning-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-30);
$this->settings["progress-bar-warning-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,30);
$this->settings["progress-bar-warning-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-15);
//
$this->settings["progress-bar-danger-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-30);
$this->settings["progress-bar-danger-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,30);
$this->settings["progress-bar-danger-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-15);
//
$this->settings["progress-bar-disabled-color"]="#EEEEEE";
$this->settings["progress-bar-disabled-background-color"]="#FFFFFF";
$this->settings["progress-bar-disabled-border-color"]="#EEEEEE";
