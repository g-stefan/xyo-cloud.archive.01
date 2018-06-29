<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
$value = trim($this->getRequest("value"));
if (strlen($value)) {
    
} else {
    return;
}


$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    $this->ds->$value = $this->getRequest("value_" . $this->ds->{$this->primaryKey});
    $this->ds->save();
}

