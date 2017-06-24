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

if ($this->id_xyo_module) {
    
} else {
	$this->generateComponent("select", "id_xyo_module");
}


if ($this->id_xyo_module_group) {
    
} else {
	$this->generateComponent("select", "id_xyo_module_group");
}

$this->generateComponent("order", "order");
$this->generateComponent("select", "id_xyo_user_group");
$this->generateComponent("select", "id_xyo_core");
$this->generateComponent("select", "enabled");
$this->generateComponent("panel-end");
$this->generateComponent("row-end");

