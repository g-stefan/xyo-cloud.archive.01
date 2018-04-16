<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("select-xyo-language-edit");

if($this->isNew){
    $this->processModel("select-xyo-user-group-edit");
};

$this->processModel("select-enabled-edit");
$this->processModel("select-invisible-edit");
