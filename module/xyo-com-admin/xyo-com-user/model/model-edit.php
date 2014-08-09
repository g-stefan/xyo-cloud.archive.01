<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("list-xyo-language",null,false);

if($this->isNew){
    $this->processModel("list-xyo-user-group",null,false);
};

$this->processModel("list-enabled",null,false);
$this->processModel("list-invisible",null,false);
