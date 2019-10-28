<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
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
$this->settings["table-default-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],35);
$this->settings["table-default-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],0);
$this->settings["table-default-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],20);
$this->settings["table-default-even-background-color"]="#EEEEEE";
//
$this->settings["table-primary-head-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-25);
$this->settings["table-primary-color"]="#000000";
$this->settings["table-primary-background-color"]="#FFFFFF";
$this->settings["table-primary-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-15);
$this->settings["table-primary-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],30);
$this->settings["table-primary-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-30);
$this->settings["table-primary-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],-25);
$this->settings["table-primary-even-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],35);
//
$this->settings["table-success-head-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-25);
$this->settings["table-success-color"]="#000000";
$this->settings["table-success-background-color"]="#FFFFFF";
$this->settings["table-success-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-15);
$this->settings["table-success-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],30);
$this->settings["table-success-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-30);
$this->settings["table-success-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-25);
$this->settings["table-success-even-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],35);
//
$this->settings["table-info-head-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-25);
$this->settings["table-info-color"]="#000000";
$this->settings["table-info-background-color"]="#FFFFFF";
$this->settings["table-info-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-15);
$this->settings["table-info-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],30);
$this->settings["table-info-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-30);
$this->settings["table-info-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-25);
$this->settings["table-info-even-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],35);
//
$this->settings["table-warning-head-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-25);
$this->settings["table-warning-color"]="#000000";
$this->settings["table-warning-background-color"]="#FFFFFF";
$this->settings["table-warning-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-15);
$this->settings["table-warning-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],30);
$this->settings["table-warning-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-30);
$this->settings["table-warning-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-25);
$this->settings["table-warning-even-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],35);
//
$this->settings["table-danger-head-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-25);
$this->settings["table-danger-color"]="#000000";
$this->settings["table-danger-background-color"]="#FFFFFF";
$this->settings["table-danger-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-15);
$this->settings["table-danger-hover-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],30);
$this->settings["table-danger-hover-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-30);
$this->settings["table-danger-hover-inner-border-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-25);
$this->settings["table-danger-even-background-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],35);
//
$this->settings["table-disabled-head-color"]="#CCCCCC";
$this->settings["table-disabled-color"]="#CCCCCC";
$this->settings["table-disabled-background-color"]="#FFFFFF";
$this->settings["table-disabled-border-color"]="#EEEEEE";
$this->settings["table-disabled-hover-background-color"]="#FFFFFF";
$this->settings["table-disabled-hover-border-color"]="#EEEEEE";
$this->settings["table-disabled-hover-inner-border-color"]="#EEEEEE";
$this->settings["table-disabled-even-background-color"]="#FFFFFF";
