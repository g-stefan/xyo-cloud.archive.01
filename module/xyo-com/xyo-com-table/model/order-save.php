<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$order = trim($this->getRequest("order"));
if (strlen($order)) {
    
} else {
    return;
}

$this->ds->clear();
$this->ds->{$this->tablePrimaryKey} = $this->id;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    $this->ds->$order = $this->getRequest("order_" . $this->ds->{$this->tablePrimaryKey});
    $this->ds->save();
}

