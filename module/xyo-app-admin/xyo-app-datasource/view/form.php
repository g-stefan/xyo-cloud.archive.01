<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("bootstrap.row-begin");
$this->generateComponent("bootstrap.panel-begin");
$this->generateComponent("bootstrap.select", "connection",array("submit"=>true));
$this->generateComponent("bootstrap.select", "datasource");
$this->generateComponent("bootstrap.select", "option");
$this->generateComponent("bootstrap.panel-end");
$this->generateComponent("bootstrap.row-end");
