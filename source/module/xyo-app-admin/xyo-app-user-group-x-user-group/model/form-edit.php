<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if($this->xyo_user_group_id_super){
    
}else{
    $this->processModel("select-xyo-user-group-super");
}

$this->processModel("select-xyo-user-group-edit");
$this->processModel("select-enabled-edit");
