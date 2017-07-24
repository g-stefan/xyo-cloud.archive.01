<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.panel-begin");
$this->generateComponent("bootstrap.text", "name");
$this->generateComponent("bootstrap.textarea", "description");
$this->generateComponent("bootstrap.select", "default");
$this->generateComponent("bootstrap.select", "enabled");
$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x1-end");
