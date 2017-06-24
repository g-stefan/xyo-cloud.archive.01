<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("row-begin");
$this->generateComponent("panel-begin");
$this->generateComponent("text", "name");
$this->generateComponent("textarea", "description");
$this->generateComponent("select", "default");
$this->generateComponent("select", "enabled");
$this->generateComponent("panel-end");
$this->generateComponent("row-end");

