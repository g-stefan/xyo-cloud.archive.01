<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    if ($this->ds->id == $this->user->info->id) {
        $this->setError("err_logout_this_user");
        continue;
    }
    $this->ds->session = "";
    $this->ds->action_at = "NOW";
    $this->ds->action = 0;
    $this->ds->logged_in = 0;
    $this->ds->save();
}

if ($this->isError()) {
    
} else {
    $this->setAlert("info_logout_ok");
}
