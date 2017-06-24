<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$dsUser = &$this->getDataSource("db.table.xyo_user");

$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    if ($dsUser) {
        $dsUser->clear();
        $dsUser->id_xyo_language = $this->ds->id;
        for($dsUser->load();$dsUser->isValid();$dsUser->loadNext()){
            $dsUser->id_xyo_language=0;
            $dsUser->save();
        }
    }
    $this->ds->delete();
}

$this->setAlert("info_delete_ok");
