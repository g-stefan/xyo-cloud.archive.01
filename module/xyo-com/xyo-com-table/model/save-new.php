<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
//
// save data ...
// require: $this->setElementValue("id",[new id]);
//
$this->processModel("save-edit", null, false);
if ($this->isError()) {
    
} else {
    $this->setElementValue("id", $this->ds->{$this->tablePrimaryKey});
}
