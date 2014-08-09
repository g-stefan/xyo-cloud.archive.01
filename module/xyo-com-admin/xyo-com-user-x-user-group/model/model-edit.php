<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_user){
}else{
    $this->processModel("list-xyo-user",null,false);
}
$this->processModel("list-xyo-user-group",null,false);
$this->processModel("list-enabled",null,false);
