<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$radio = trim($this->getRequest("radio"));
if (strlen($radio)) {
    
} else {
    return;
}

$this->ds->clear();
$this->ds->update(array($radio=>0));
$this->ds->clear();
$this->ds->id=$this->id;
$this->ds->$radio=1;
$this->ds->save();
