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
if ($this->ds->delete()) {
    $this->setMessage("info", "info_delete_ok");
} else {
    $this->setError("error", "err_unable_to_delete");
}

