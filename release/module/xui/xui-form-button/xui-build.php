<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-form-button");
$this->buildUI();

$this->settings["form-button-color"]="#000000";
$this->settings["form-button-background-color"]="#EEEEEE";
$this->settings["form-button-border-color"]="#BBBBBB";
$this->settings["form-button-wall-color"]="#888888";
$this->settings["form-button-focus-color"]="#000000";
$this->settings["form-button-focus-background-color"]="#FFFFFF";
$this->settings["form-button-focus-border-color"]="#BBBBBB";
$this->settings["form-button-focus-wall-color"]="#444444";
//
$this->settings["form-button-primary-color"]="#FFFFFF";
$this->settings["form-button-primary-background-color"]=$this->settings["context-primary-color"];
$this->settings["form-button-primary-border-color"]=$this->settings["context-primary-color"];
$this->settings["form-button-primary-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-primary-color"],-15);
$this->settings["form-button-primary-focus-color"]="#FFFFFF";
$this->settings["form-button-primary-focus-background-color"]=$this->settings["context-primary-focus-color"];
$this->settings["form-button-primary-focus-border-color"]=$this->settings["context-primary-focus-color"];
$this->settings["form-button-primary-focus-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-primary-focus-color"],-30);
//
$this->settings["form-button-success-color"]="#FFFFFF";
$this->settings["form-button-success-background-color"]=$this->settings["context-success-color"];
$this->settings["form-button-success-border-color"]=$this->settings["context-success-color"];
$this->settings["form-button-success-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-success-color"],-15);
$this->settings["form-button-success-focus-color"]="#FFFFFF";
$this->settings["form-button-success-focus-background-color"]=$this->settings["context-success-focus-color"];
$this->settings["form-button-success-focus-border-color"]=$this->settings["context-success-focus-color"];
$this->settings["form-button-success-focus-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-success-focus-color"],-30);
//
$this->settings["form-button-info-color"]="#FFFFFF";
$this->settings["form-button-info-background-color"]=$this->settings["context-info-color"];
$this->settings["form-button-info-border-color"]=$this->settings["context-info-color"];
$this->settings["form-button-info-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-info-color"],-15);
$this->settings["form-button-info-focus-color"]="#FFFFFF";
$this->settings["form-button-info-focus-background-color"]=$this->settings["context-info-focus-color"];
$this->settings["form-button-info-focus-border-color"]=$this->settings["context-info-focus-color"];
$this->settings["form-button-info-focus-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-info-focus-color"],-30);
//
$this->settings["form-button-warning-color"]="#FFFFFF";
$this->settings["form-button-warning-background-color"]=$this->settings["context-warning-color"];
$this->settings["form-button-warning-border-color"]=$this->settings["context-warning-color"];
$this->settings["form-button-warning-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-warning-color"],-15);
$this->settings["form-button-warning-focus-color"]="#FFFFFF";
$this->settings["form-button-warning-focus-background-color"]=$this->settings["context-warning-focus-color"];
$this->settings["form-button-warning-focus-border-color"]=$this->settings["context-warning-focus-color"];
$this->settings["form-button-warning-focus-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-warning-focus-color"],-30);
//
$this->settings["form-button-danger-color"]="#FFFFFF";
$this->settings["form-button-danger-background-color"]=$this->settings["context-danger-color"];
$this->settings["form-button-danger-border-color"]=$this->settings["context-danger-color"];
$this->settings["form-button-danger-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-danger-color"],-15);
$this->settings["form-button-danger-focus-color"]="#FFFFFF";
$this->settings["form-button-danger-focus-background-color"]=$this->settings["context-danger-focus-color"];
$this->settings["form-button-danger-focus-border-color"]=$this->settings["context-danger-focus-color"];
$this->settings["form-button-danger-focus-wall-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-danger-focus-color"],-30);
//
