<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-alert");
$this->buildUI();


$this->settings["alert-default-color"]="#444444";
$this->settings["alert-default-background-color"]="#FFFFFF";
$this->settings["alert-default-border-color"]="#DDDDDD";
//
$this->settings["alert-primary-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-primary-color"],0,0,-15);
$this->settings["alert-primary-background-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-primary-color"],0,0,45);
$this->settings["alert-primary-border-color"]=$this->settings["context-primary-color"];
//
$this->settings["alert-success-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-success-color"],0,0,-15);
$this->settings["alert-success-background-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-success-color"],0,0,45);
$this->settings["alert-success-border-color"]=$this->settings["context-success-color"];
//
$this->settings["alert-info-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-info-color"],0,0,-15);
$this->settings["alert-info-background-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-info-color"],0,0,45);
$this->settings["alert-info-border-color"]=$this->settings["context-info-color"];
//             
$this->settings["alert-warning-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-warning-color"],0,0,-15);
$this->settings["alert-warning-background-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-warning-color"],0,0,45);
$this->settings["alert-warning-border-color"]=$this->settings["context-warning-color"];
//
$this->settings["alert-danger-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-danger-color"],0,0,-15);
$this->settings["alert-danger-background-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-danger-color"],0,0,45);
$this->settings["alert-danger-border-color"]=$this->settings["context-danger-color"];
//
$this->settings["alert-disabled-color"]="#EEEEEE";
$this->settings["alert-disabled-background-color"]="#FFFFFF";
$this->settings["alert-disabled-border-color"]="#EEEEEE";
