<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDataSource("db.query.xyo_user_x_core");

$this->setApplicationIcon("<i class=\"material-icons\">device_hub</i>");
$this->setApplicationDataSource("db.query.xyo_user_x_core");
$this->setPrimaryKey("id");
$this->requireComponent(array(
	"xui.form-select",

	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

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

