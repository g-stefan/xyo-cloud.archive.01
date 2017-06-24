<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("form-default");
$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
if ($this->ds->load(0, 1)) {
    $this->processModel("form-set");	
} else {
    $this->setError("form-load");
    return;
}
