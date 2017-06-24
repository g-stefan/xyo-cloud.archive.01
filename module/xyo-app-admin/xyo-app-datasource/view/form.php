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
$this->generateComponent("select", "connection",array("submit"=>true));
$this->generateComponent("select", "datasource");
$this->generateComponent("select", "option");
$this->generateComponent("panel-end");
$this->generateComponent("row-end");
