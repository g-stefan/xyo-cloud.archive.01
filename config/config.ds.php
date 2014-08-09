<?php
defined('XYO_CLOUD') or die('Access is denied');
// 
// DataSource Config
// 
$this->setDataSourceDescriptor("db.table.xyo_datasource",$this->cloud->get("path_base")."datasource/db.table.xyo_datasource.php");
// 
$this->setDataSourceConnectionProvider("quantum","xyo-mod-datasource-quantum");
$this->setDataSourceConnectionProvider("db","xyo-mod-datasource-xyo");


