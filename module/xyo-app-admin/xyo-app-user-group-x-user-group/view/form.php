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

if($this->id_xyo_user_group_super){
}else{
    $this->generateComponent("select", "id_xyo_user_group_super");
}

$this->generateComponent("select", "id_xyo_user_group");
$this->generateComponent("select", "enabled");
$this->generateComponent("panel-end");
$this->generateComponent("row-end");

