<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->ds->clear();
if ($this->isNew) {
    
} else {

    $this->ds->id = $this->primaryKeyValue;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError(array("err_id_not_found" => $this->primaryKeyValue));
        return;
    }
}

if ($this->xyo_module_id) {
    $this->ds->xyo_module_id = $this->xyo_module_id;
} else {
    $this->ds->xyo_module_id = $this->getElementValueNumber("xyo_module_id", 0,"*");
    if($this->ds->xyo_module_id==0){
	$this->setElementError("xyo_module_id", $this->getFromLanguage("el_xyo_module_id_not_selected"));
        return;
    };
}

if ($this->xyo_module_group_id) {
    $this->ds->xyo_module_group_id = $this->xyo_module_group_id;
} else {
    $this->ds->xyo_module_group_id = $this->getElementValueNumber("xyo_module_group_id", 0,"*");
}


$this->ds->xyo_core_id = $this->getElementValueNumber("xyo_core_id", 0,"*");
$this->ds->xyo_user_group_id = $this->getElementValueNumber("xyo_user_group_id", 0,"*");
$this->ds->tryLoad();
$this->ds->order = $this->getElementValueNumber("order", 0, "*");
$this->ds->enabled = $this->getElementValueNumber("enabled", 0, "*");

$this->processModel("select-xyo-module");

$list_xyo_module_id = $this->getParameter("select_xyo_module_id", array());
if (array_key_exists($this->ds->xyo_module_id, $list_xyo_module_id)) {
    $this->ds->module = $list_xyo_module_id[$this->ds->xyo_module_id];
}

if ($this->ds->save()) {
    
} else {
    $this->setError("err_save_error");
}
