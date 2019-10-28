<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-form-text-icon-right");
$this->buildUI();

$this->settings["form-text-icon-right-default-icon-color"]=$this->color->rgbHexHSLAdjustL($this->settings["context-default-color"],-15);
