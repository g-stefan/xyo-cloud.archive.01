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
$this->generateComponent("bootstrap.select", array("element" => "connection","submit"=>true));
$this->generateComponent("bootstrap.select", array("element" => "datasource"));
$this->generateComponent("bootstrap.select", array("element" => "option"));
$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x1-end");
