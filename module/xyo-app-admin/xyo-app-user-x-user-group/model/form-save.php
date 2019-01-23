<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

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

if ($this->xyo_user_id) {
    $this->ds->xyo_user_id = $this->xyo_user_id;
} else {
    $this->ds->xyo_user_id = $this->getElementValueNumber("xyo_user_id", 0, "*");
}
$this->ds->xyo_user_group_id = $this->getElementValueNumber("xyo_user_group_id", 0, "*");
if ($this->isNew) {
    $this->ds->tryLoad();
}

$this->ds->principal = $this->getElementValueNumber("principal", 0, "*");
$this->ds->enabled = $this->getElementValueNumber("enabled", 0, "*");

if ($this->ds->save()) {
    
} else {
    $this->setError("err_save_error");
    return;
}

