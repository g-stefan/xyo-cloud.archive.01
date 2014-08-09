<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->isNew = false;
$this->processModel("select-id-one",null,false);
$this->processModel("set-ds",null,false);
if ($this->isError()) {
    
} else {
    $this->clearElementError();
    $this->processModel("save-edit",null,false);
}

$this->setParameter("toolbar", "toolbar/edit");
$this->processModel("model-edit", null, false);
$this->setView("form");
