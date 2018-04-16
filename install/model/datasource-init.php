<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$configFileName = $this->getParameter("config_file");
if ($configFileName) {
    
} else {
    $this->setError("config_file_invalid");
    return;
}

$moduleDatasourceLayer = null;
$layerModule = $this->cloud->get("datasource_layer");
$moduleDatasourceLayer = &$this->cloud->getModule($layerModule);
if ($moduleDatasourceLayer) {
    
} else {
    $this->setError(array("unknown_layer" => $layer));
    return;
};

$this->cloud->set("datasource_loader", "xyo-mod-ds-loader-ds");
$moduleDatasourceLayer->includeFile($configFileName);

$conDb = &$moduleDatasourceLayer->getConnection("db");
if ($conDb) {
    if ($conDb->open()) {
        $conDb->close();
    } else {
        $this->setError(array("connection_error" => "db"));
        return;
    }
} else {
    $this->setError(array("connection_unknown" => "db"));
    return;
}


$setup = &$this->cloud->getModule("xyo-mod-setup");
if ($setup) {
    
} else {
    $this->setError("unable_to_instantiate_setup");
    return;
};

$setup->registerDataSource("db.table.xyo_settings");
$setup->registerDataSource("db.table.xyo_language");
$setup->registerDataSource("db.table.xyo_module");
$setup->registerDataSource("db.table.xyo_module_group");
$setup->registerDataSource("db.table.xyo_module_parameter");
$setup->registerDataSource("db.table.xyo_acl_module");
$setup->registerDataSource("db.table.xyo_user");
$setup->registerDataSource("db.table.xyo_user_group");
$setup->registerDataSource("db.table.xyo_user_group_x_user_group");
$setup->registerDataSource("db.table.xyo_user_x_user_group");

//---
$order = array();
$listDatasource=array();

include($this->path . "repository/_order.php");

        $allOk = true;
        foreach ($order as $level_ => $source_) {
            $value = "yes";
            $dataSource = &$this->getDataSource($source_);
            if ($dataSource) {
                $filename = $this->path . "repository/" . $source_ . ".php";
                if (file_exists($filename)) {
                    include($filename);
                };
            } else {
                $value = "no";
                $allOk = false;
            };

		$listDatasource[$source_]=$value;
        };

if (!$allOk) {
    $this->setError("datasource_init");
};

$this->setParameter("select_datasource", $listDatasource);

