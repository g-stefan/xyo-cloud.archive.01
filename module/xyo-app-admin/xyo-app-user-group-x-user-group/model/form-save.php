<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->isNew) {
    
} else {
    $this->ds->clear();
    $this->ds->id = $this->privateKeyValue;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError(array("err_id_not_found" => $this->privateKeyValue));
        return;
    }
}

if($this->id_xyo_user_group_super){
    $this->ds->id_xyo_user_group_super=$this->id_xyo_user_group_super;
}else{
    $this->ds->id_xyo_user_group_super = $this->getElementValueInt("id_xyo_user_group_super", 0, "*");
}
$this->ds->id_xyo_user_group = $this->getElementValueInt("id_xyo_user_group", 0, "*");
if($this->isNew){
    $this->ds->tryLoad();
}

$this->ds->enabled = $this->getElementValueInt("enabled", 0, "*");

if ($this->ds->save()) {
    
} else {
    $this->setError("err_save_error");
    return;
}

