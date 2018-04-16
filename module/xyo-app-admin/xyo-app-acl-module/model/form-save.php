<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

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

if ($this->id_xyo_module) {
    $this->ds->id_xyo_module = $this->id_xyo_module;
} else {
    $this->ds->id_xyo_module = $this->getElementValueNumber("id_xyo_module", 0,"*");
    if($this->ds->id_xyo_module==0){
	$this->setElementError("id_xyo_module", $this->getFromLanguage("el_id_xyo_module_not_selected"));
        return;
    };
}

if ($this->id_xyo_module_group) {
    $this->ds->id_xyo_module_group = $this->id_xyo_module_group;
} else {
    $this->ds->id_xyo_module_group = $this->getElementValueNumber("id_xyo_module_group", 0,"*");
}


$this->ds->id_xyo_user_group = $this->getElementValueNumber("id_xyo_user_group", 0,"*");
$this->ds->tryLoad();
$this->ds->order = $this->getElementValueNumber("order", 0, "*");
$this->ds->enabled = $this->getElementValueNumber("enabled", 0, "*");

$this->processModel("select-xyo-module");

$list_id_xyo_module = $this->getParameter("select_id_xyo_module", array());
if (array_key_exists($this->ds->id_xyo_module, $list_id_xyo_module)) {
    $this->ds->module = $list_id_xyo_module[$this->ds->id_xyo_module];
}

if ($this->ds->save()) {
    
} else {
    $this->setError("err_save_error");
}
