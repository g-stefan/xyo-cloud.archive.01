<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("group-row-begin");
$this->generateElement("group-begin");

if($this->id_xyo_user_group_super){
}else{
    $this->generateElement("select", "id_xyo_user_group_super");
}

$this->generateElement("select", "id_xyo_user_group");
$this->generateElement("select", "enabled");
$this->generateElement("group-end");
$this->generateElement("group-row-end");

