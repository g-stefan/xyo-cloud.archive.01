<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildCSS("xui-app-user");
$this->buildUI();

$this->settings["app-user-image-color"]=$this->settings["app-brand-logo-color"];
$this->settings["app-user-background"]="linear-gradient(120deg, #93D9F2 0%, #93D9F2 25%, #4FC1E9 25%, #4FC1E9 75%, #1AA2D1 75%, #1AA2D1 100%)";
