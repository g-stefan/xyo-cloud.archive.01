<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-table");
$this->buildUI();

$this->settings["table-default-head-color"]="#000000";
$this->settings["table-default-color"]="#000000";
$this->settings["table-default-background-color"]="#FFFFFF";
$this->settings["table-default-border-color"]="#DDDDDD";
$this->settings["table-default-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,35);
$this->settings["table-default-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,0);
$this->settings["table-default-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,20);
$this->settings["table-default-even-background-color"]="#EEEEEE";
//
$this->settings["table-primary-head-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-25);
$this->settings["table-primary-color"]="#000000";
$this->settings["table-primary-background-color"]="#FFFFFF";
$this->settings["table-primary-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-15);
$this->settings["table-primary-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,30);
$this->settings["table-primary-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-30);
$this->settings["table-primary-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-25);
$this->settings["table-primary-even-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,35);
//
$this->settings["table-success-head-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-25);
$this->settings["table-success-color"]="#000000";
$this->settings["table-success-background-color"]="#FFFFFF";
$this->settings["table-success-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-15);
$this->settings["table-success-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,30);
$this->settings["table-success-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-30);
$this->settings["table-success-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,-25);
$this->settings["table-success-even-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grass-2"],0,0,35);
//
$this->settings["table-info-head-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-25);
$this->settings["table-info-color"]="#000000";
$this->settings["table-info-background-color"]="#FFFFFF";
$this->settings["table-info-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-15);
$this->settings["table-info-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,30);
$this->settings["table-info-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-30);
$this->settings["table-info-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,-25);
$this->settings["table-info-even-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-aqua-2"],0,0,35);
//
$this->settings["table-warning-head-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-25);
$this->settings["table-warning-color"]="#000000";
$this->settings["table-warning-background-color"]="#FFFFFF";
$this->settings["table-warning-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-15);
$this->settings["table-warning-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,30);
$this->settings["table-warning-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-30);
$this->settings["table-warning-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,-25);
$this->settings["table-warning-even-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-sunflower-2"],0,0,35);
//
$this->settings["table-danger-head-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-25);
$this->settings["table-danger-color"]="#000000";
$this->settings["table-danger-background-color"]="#FFFFFF";
$this->settings["table-danger-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-15);
$this->settings["table-danger-hover-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,30);
$this->settings["table-danger-hover-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-30);
$this->settings["table-danger-hover-inner-border-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,-25);
$this->settings["table-danger-even-background-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-grapefruit-2"],0,0,35);
//
$this->settings["table-disabled-head-color"]="#CCCCCC";
$this->settings["table-disabled-color"]="#CCCCCC";
$this->settings["table-disabled-background-color"]="#FFFFFF";
$this->settings["table-disabled-border-color"]="#EEEEEE";
$this->settings["table-disabled-hover-background-color"]="#FFFFFF";
$this->settings["table-disabled-hover-border-color"]="#EEEEEE";
$this->settings["table-disabled-hover-inner-border-color"]="#EEEEEE";
$this->settings["table-disabled-even-background-color"]="#FFFFFF";
