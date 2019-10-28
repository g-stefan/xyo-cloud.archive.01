<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

//
//
//
$this->settings["transition"]=0.3;
//
//
//
$this->settings["context-default-color"]=$this->color->rgbHexHSLAdjustL($this->palette["rock-1"],0);
$this->settings["context-primary-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],0);
$this->settings["context-success-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-2"],-8);
$this->settings["context-info-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-2"],-5);
$this->settings["context-warning-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-2"],-5);
$this->settings["context-danger-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-2"],-5);
$this->settings["context-disabled-color"]=$this->palette["aluminium-2"];
//
$this->settings["context-default-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["science-blue-1"],0);
$this->settings["context-primary-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["science-blue-1"],0);
$this->settings["context-success-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["chameleon-1"],0);
$this->settings["context-info-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["aqua-1"],0);
$this->settings["context-warning-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sunflower-1"],0);
$this->settings["context-danger-focus-color"]=$this->color->rgbHexHSLAdjustL($this->palette["scarlet-red-1"],0);
$this->settings["context-disabled-focus-color"]=$this->settings["context-disabled-color"];
//
//
//
$this->settings["input-default-color"]="#444444";
$this->settings["input-default-focus-color"]="#000000";
$this->settings["input-disabled-color"]=$this->settings["context-disabled-color"];
$this->settings["input-disabled-focus-color"]=$this->settings["context-disabled-color"];
//
$this->settings["input-background-color"]="#FFFFFF";
$this->settings["input-border-radius"]=3;
$this->settings["input-height"]=32;
$this->settings["input-font-size"]=16;
$this->settings["input-line-height"]=20;
$this->settings["input-padding-top"]=5;
$this->settings["input-padding-right"]=6;
$this->settings["input-padding-bottom"]=5;
$this->settings["input-padding-left"]=6;
$this->settings["input-outline-alpha"]="40";
//
//
//