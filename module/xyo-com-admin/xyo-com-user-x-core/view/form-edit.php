<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("group-row-begin",null);
$this->generateElement("group-begin", null);
if ($this->id_xyo_user) {
    
} else {
    $this->generateElement("select", "id_xyo_user");
}

$this->generateElement("select", "id_xyo_core");
$this->generateElement("select", "enabled");
$this->generateElement("group-end", null);
$this->generateElement("group-row-end",null);
