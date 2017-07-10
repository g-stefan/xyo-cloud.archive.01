<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
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
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
if ($this->ds->load(0, 1)) {
    $value = $this->ds->$order;
    $valueDown = 0;

    $this->ds->clear();

    $name_ = $order . "_max";
    $this->ds->setFunctionAs($order, "MAX", $name_);

    for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
        if ($this->ds->$name_ > $valueDown) {
            $valueDown = $this->ds->$name_;
        }
    }

    if ($value + 1 > $valueDown) {
        
    } else {
        $valueDown = $value + 1;
    }

    if ($value == $valueDown) {
        
    } else {

        $this->ds->clear();
        $this->ds->$order = $valueDown;
        if ($this->ds->load(0, 1)) {
            $this->ds->$order = $this->ds->$order - 1;
            $this->ds->save();
        }
        $this->ds->clear();
        $this->ds->{$this->primaryKey} = $this->primaryKeyValue;
        if ($this->ds->load(0, 1)) {
            $this->ds->$order = $valueDown;
            $this->ds->save();
        }
    }
}


