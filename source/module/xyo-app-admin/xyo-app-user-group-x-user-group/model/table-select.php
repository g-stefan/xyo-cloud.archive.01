<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if($this->xyo_user_group_id_super){
    $this->ds->xyo_user_group_id_super=$this->xyo_user_group_id_super;
}

$this->ds->setGroup("id",true);
$this->ds->setGroup("user_group_super",true);
$this->ds->setGroup("user_group",true);

