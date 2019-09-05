<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setDataSource("db.query.xyo_user_x_user_group");

$this->setApplicationIcon("<i class=\"material-icons\">people</i>");
$this->setApplicationDataSource("db.query.xyo_user_x_user_group");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"xui.form-select",
	"xui.form-switch",
	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

$this->xyo_user_id = 1 * $this->getParameterRequest("xyo_user_id", 0);
if ($this->xyo_user_id) {
    $this->setKeepRequest("xyo_user_id", $this->xyo_user_id);

    $dsUser = &$this->getDataSource("db.table.xyo_user");
    if ($dsUser) {
        $dsUser->clear();
        $dsUser->id = $this->xyo_user_id;
        if ($dsUser->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsUser->name);
        }
    }
}

