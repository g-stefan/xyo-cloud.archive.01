<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
$value = trim($this->getRequest("value"));
if (strlen($value)) {
    
} else {
    return;
}


$this->ds->clear();
$this->ds->{$this->tablePrimaryKey} = $this->id;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    $this->ds->$value = $this->getRequest("value_" . $this->ds->{$this->tablePrimaryKey});
    $this->ds->save();
}

