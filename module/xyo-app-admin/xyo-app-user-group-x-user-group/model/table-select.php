<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_user_group_super){
    $this->ds->id_xyo_user_group_super=$this->id_xyo_user_group_super;
}

$this->ds->setGroup("id",true);
$this->ds->setGroup("user_group_super",true);
$this->ds->setGroup("user_group",true);

