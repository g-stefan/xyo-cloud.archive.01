<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-form-text");
$this->buildUI();

//
$this->settings["form-text-default-border-color"]=$this->settings["context-default-color"];
$this->settings["form-text-default-color"]=$this->settings["input-default-color"];
$this->settings["form-text-default-focus-border-color"]=$this->settings["context-primary-focus-color"];
$this->settings["form-text-default-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-primary-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-primary-border-color"]=$this->settings["context-primary-color"];
$this->settings["form-text-primary-color"]=$this->settings["context-primary-color"];
$this->settings["form-text-primary-focus-border-color"]=$this->settings["context-primary-focus-color"];
$this->settings["form-text-primary-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-primary-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-success-border-color"]=$this->settings["context-success-color"];
$this->settings["form-text-success-color"]=$this->settings["context-success-color"];
$this->settings["form-text-success-focus-border-color"]=$this->settings["context-success-focus-color"];
$this->settings["form-text-success-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-success-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-info-border-color"]=$this->settings["context-info-color"];
$this->settings["form-text-info-color"]=$this->settings["context-info-color"];
$this->settings["form-text-info-focus-border-color"]=$this->settings["context-info-focus-color"];
$this->settings["form-text-info-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-info-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-warning-border-color"]=$this->settings["context-warning-color"];
$this->settings["form-text-warning-color"]=$this->settings["context-warning-color"];
$this->settings["form-text-warning-focus-border-color"]=$this->settings["context-warning-focus-color"];
$this->settings["form-text-warning-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-warning-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-danger-border-color"]=$this->settings["context-danger-color"];
$this->settings["form-text-danger-color"]=$this->settings["context-danger-color"];
$this->settings["form-text-danger-focus-border-color"]=$this->settings["context-danger-focus-color"];
$this->settings["form-text-danger-focus-outline-color"]=$this->color->rgbHexToRGBA($this->settings["context-danger-focus-color"],$this->settings["input-outline-alpha"]);
//
$this->settings["form-text-disabled-border-color"]=$this->settings["context-disabled-color"];
$this->settings["form-text-disabled-color"]=$this->settings["input-disabled-color"];
$this->settings["form-text-disabled-focus-border-color"]=$this->settings["context-disabled-color"];
$this->settings["form-text-disabled-focus-outline-color"]=$this->settings["input-disabled-focus-color"];
//
