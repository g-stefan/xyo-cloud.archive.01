<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$user = array();
$user["*"] = $this->getFromLanguage("select_xyo_user_any");
$dsUser = &$this->getDataSource("db.table.xyo_user");
if ($dsUser) {
    $dsUser->clear();
    $dsUser->setOrder("username",1);
    for ($dsUser->load(); $dsUser->isValid(); $dsUser->loadNext()) {
        $user[$dsUser->id] = $dsUser->name;
    }
};

$this->returnParameter("list_id_xyo_user",$user);

