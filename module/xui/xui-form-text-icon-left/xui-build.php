<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-form-text-icon-left");
$this->buildUI();

$this->settings["form-text-icon-left-default-icon-color"]=$this->color->rgbHexHSLAdjust($this->settings["context-default-color"],0,0,-15);
