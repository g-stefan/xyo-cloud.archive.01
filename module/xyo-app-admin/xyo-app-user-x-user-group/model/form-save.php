<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->isNew) {
    
} else {
    $this->ds->clear();
    $this->ds->id = $this->primaryKeyValue;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError(array("err_id_not_found" => $this->primaryKeyValue));
        return;
    }
}

if ($this->id_xyo_user) {
    $this->ds->id_xyo_user = $this->id_xyo_user;
} else {
    $this->ds->id_xyo_user = $this->getElementValueInt("id_xyo_user", 0, "*");
}
$this->ds->id_xyo_user_group = $this->getElementValueInt("id_xyo_user_group", 0, "*");
if ($this->isNew) {
    $this->ds->tryLoad();
}

$this->ds->principal = $this->getElementValueInt("principal", 0, "*");
$this->ds->enabled = $this->getElementValueInt("enabled", 0, "*");

if ($this->ds->save()) {
    
} else {
    $this->setError("err_save_error");
    return;
}

