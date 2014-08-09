<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDataSource("db.query.xyo_user_x_user_group");

$this->setApplicationIcon("media/sys/images/system-users2-48.png");
$this->setApplicationDataSource("db.query.xyo_user_x_user_group");
$this->requireElement(array("select","group-begin","group-end","group-row-begin","group-row-end"));

$this->id_xyo_user = 1 * $this->getParameterRequest("id_xyo_user", 0);
if ($this->id_xyo_user) {
    $this->setKeepRequest("id_xyo_user", $this->id_xyo_user);

    $dsUser = &$this->getDataSource("db.table.xyo_user");
    if ($dsUser) {
        $dsUser->clear();
        $dsUser->id = $this->id_xyo_user;
        if ($dsUser->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsUser->name);
        }
    }
}

