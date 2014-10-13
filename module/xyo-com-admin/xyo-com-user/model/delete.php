<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$dsUserXUserGroup=&$this->getDataSource("db.table.xyo_user_x_user_group");
$dsUserXCore=&$this->getDataSource("db.table.xyo_user_x_core");

$this->ds->clear();
$this->ds->{$this->tablePrimaryKey} = $this->id;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {

    if ($this->ds->{$this->tablePrimaryKey} == $this->user->info->id) {
        $this->setError("error", "err_delete_this_user");
        continue;
    }
        
    if($dsUserXUserGroup){
            $dsUserXUserGroup->clear();
            $dsUserXUserGroup->id_xyo_user=$this->ds->id;
            $dsUserXUserGroup->delete();
    }

    if($dsUserXCore){
            $dsUserXCore->clear();
            $dsUserXCore->id_xyo_user=$this->ds->id;
            $dsUserXCore->delete();
    }
        
    $this->ds->delete();
}

if ($this->isError()) {
    
} else {
    $this->setMessage("info", "info_delete_ok");
}
