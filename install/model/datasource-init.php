<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$configFileName = $this->getParameter("config_file");
if ($configFileName) {
    
} else {
    $this->setError("error", "config_file_invalid");
    return;
}

$moduleDatasourceLayer = null;
$layerModule = $this->cloud->get("system_datasource_layer");
$moduleDatasourceLayer = &$this->cloud->getModule($layerModule);
if ($moduleDatasourceLayer) {
    
} else {
    $this->setError("error", array("unknown_layer" => $layer));
    return;
};

$this->cloud->set("system_datasource_loader", "xyo-mod-ds-loader-ds");
$moduleDatasourceLayer->includeFile($configFileName);

$conDb = &$moduleDatasourceLayer->getConnection("db");
if ($conDb) {
    if ($conDb->open()) {
        $conDb->close();
    } else {
        $this->setError("error", array("connection_error" => "db"));
        return;
    }
} else {
    $this->setError("error", array("connection_unknown" => "db"));
    return;
}


$setup = &$this->cloud->getModule("xyo-mod-setup");
if ($setup) {
    
} else {
    $this->setError("error", "unable_to_instantiate_setup");
    return;
};

$setup->execModuleInstall("xyo-mod-ds-db");

//---
$order = array();
include($this->path . "repository/_order.php");

$k_ = 1;
$listDataSourceOrder_ = array();
foreach ($order as $value_) {
    $listDataSourceOrder_[$value_] = $k_;
    ++$k_;
};
$lastIndex = $k_ + 1;



$dsListAs = $this->dataSourceProvider->getDataSourceAsList();
foreach ($dsListAs as $key_ => $value_) {
    if (array_key_exists($key_, $listDataSourceOrder_)) {
        
    } else {
        $listDataSourceOrder_[$key_] = 0;
    };
};
asort($listDataSourceOrder_, SORT_NUMERIC);

$listDatasource=array();

        $allOk = true;
        foreach ($listDataSourceOrder_ as $source_ => $level_) {
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
    $this->setError("error", "datasource_init");
};

$this->returnParameter("list_datasource", $listDatasource);

