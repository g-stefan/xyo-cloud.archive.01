<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-form-label");
$this->buildUI();

$this->settings["form-label-default-color"]="#000000";
$this->settings["form-label-primary-color"]=$this->settings["context-primary-color"];
$this->settings["form-label-success-color"]=$this->settings["context-success-color"];
$this->settings["form-label-info-color"]=$this->settings["context-info-color"];
$this->settings["form-label-warning-color"]=$this->settings["context-warning-color"];
$this->settings["form-label-danger-color"]=$this->settings["context-danger-color"];
$this->settings["form-label-disabled-color"]=$this->settings["context-disabled-color"];
