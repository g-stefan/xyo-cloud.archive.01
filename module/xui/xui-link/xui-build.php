<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-link");
$this->buildUI();

$this->settings["xui-link-color"]=$this->color->rgbHexHSLAdjust($this->palette["core-blue-jeans-2"],0,0,-15);