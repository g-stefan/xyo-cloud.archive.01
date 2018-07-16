<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setDataSource("db.query.xyo_user_group_x_user_group");

$this->setApplicationIcon("<i class=\"material-icons\">people</i>");
$this->setApplicationDataSource("db.query.xyo_user_group_x_user_group");
$this->setPrimaryKey("id");

$this->setDialogNew(true);
$this->setDialogEdit(true);

$this->requireComponent(array(
	"xui.form-select",
	"xui.form-switch",
	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

$this->xyo_user_group_id_super = 1 * $this->getParameterRequest("xyo_user_group_id_super", 0);
if ($this->xyo_user_group_id_super) {
    $this->setKeepRequest("xyo_user_group_id_super", $this->xyo_user_group_id_super);

    $dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");
    if ($dsUserGroup) {
        $dsUserGroup->clear();
        $dsUserGroup->id = $this->xyo_user_group_id_super;
        if ($dsUserGroup->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsUserGroup->name);
        }
    }
    
}

