<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-panel");
$this->buildUI();

$this->settings["panel-background-color"]="#FFFFFF";
$this->settings["panel-title-color"]="#444444";
$this->settings["panel-title-background-color"]="#FFFFFF";
$this->settings["panel-content-color"]="#000000";
$this->settings["panel-content-background-color"]="#FFFFFF";
$this->settings["panel-footer-color"]="#444444";
$this->settings["panel-footer-background-color"]="#FFFFFF";
$this->settings["panel-line-color"]=$this->settings["context-default-color"];
