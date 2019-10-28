<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-link");
$this->buildUI();

$this->settings["xui-link-color"]=$this->color->rgbHexHSLAdjustL($this->palette["sky-blue-2"],0);
