<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_user){
    $this->ds->id_xyo_user=$this->id_xyo_user;
};

$this->ds->setGroup("id",true);
$this->ds->setGroup("core",true);
$this->ds->setGroup("username",true);
