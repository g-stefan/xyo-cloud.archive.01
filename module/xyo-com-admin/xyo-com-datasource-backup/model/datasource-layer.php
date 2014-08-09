<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$layer = $this->getParameterRequest("layer", null);
$fileName = $this->cloud->get("path_base") . "config/config.ds.backup.php";
$moduleName = "";
if ($layer === "xyo") {
    $moduleName = "xyo-mod-datasource-xyo";
} else
if ($layer === "csv") {
    $moduleName = "xyo-mod-datasource-csv";
} else
if ($layer === "mysql") {
    $moduleName = "xyo-mod-datasource-mysql";
} else
if ($layer === "postgresql") {
    $moduleName = "xyo-mod-datasource-postgresql";
} else
if ($layer === "sqlite") {
    $moduleName = "xyo-mod-datasource-sqlite";
} else
if ($layer === "sqlite3") {
    $moduleName = "xyo-mod-datasource-sqlite3";
} else {
    $this->setError("error", array("unknown_layer" => $layer));
    return;
}

$this->returnParameter("layer_module", $moduleName);
$this->returnParameter("layer_config", $fileName);
