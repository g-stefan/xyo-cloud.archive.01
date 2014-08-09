<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->ds->clear();
$this->ds->{$this->tablePrimaryKey} = $this->id;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    if ($this->ds->id == $this->user->info->id) {
        $this->setError("error", "err_logout_this_user");
        continue;
    }
    $this->ds->session = "";
    $this->ds->action_on = "NOW";
    $this->ds->action = 0;
    $this->ds->logged_in = 0;
    $this->ds->save();
}

if ($this->isError()) {
    
} else {
    $this->setMessage("info", "info_logout_ok");
}
