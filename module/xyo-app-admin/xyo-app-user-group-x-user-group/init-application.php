<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDataSource("db.query.xyo_user_group_x_user_group");

$this->setApplicationIcon("<i class=\"material-icons\">people</i>");
$this->setApplicationDataSource("db.query.xyo_user_group_x_user_group");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"xui.form-select",

	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

$this->id_xyo_user_group_super = 1 * $this->getParameterRequest("id_xyo_user_group_super", 0);
if ($this->id_xyo_user_group_super) {
    $this->setKeepRequest("id_xyo_user_group_super", $this->id_xyo_user_group_super);

    $dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");
    if ($dsUserGroup) {
        $dsUserGroup->clear();
        $dsUserGroup->id = $this->id_xyo_user_group_super;
        if ($dsUserGroup->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsUserGroup->name);
        }
    }
    
}

