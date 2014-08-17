<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$language = array();
$language["*"] = $this->getFromLanguage("select_xyo_language_any");
$dsLanguage = &$this->getDataSource("db.table.xyo_language");
if ($dsLanguage) {
    $dsLanguage->clear();
    $dsLanguage->setOrder("description",1);
    for ($dsLanguage->load(); $dsLanguage->isValid(); $dsLanguage->loadNext()) {
        $language[$dsLanguage->id] = $dsLanguage->description;
    }
};

$this->returnParameter("select_id_xyo_language",$language);

