<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_ds_loader_Ds";

class xyo_mod_ds_loader_Ds extends xyo_Module {

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
    }

    function systemDataSource(&$dataSource, $name) {
		// must be provided by system - this break recursive call
		if($name=="db.table.xyo_datasource"){
			return false;
		};

        $ds = &$dataSource->getDataSource("db.table.xyo_datasource");
        if ($ds) {
            $ds->clear();
            $ds->name = $name;
            $ds->enabled = 1;
            if ($ds->load(0, 1)) {				
                $dataSource->setDataSourceDescriptor($ds->name, "datasource/". $ds->name.".php");
                return true;
            };
        };
        return false;
    }

    function systemDataSourceAsList(&$dataSource) {
		$list_=array();
        $ds = &$dataSource->getDataSource("db.table.xyo_datasource");
        if ($ds) {
            $ds->clear();
            $ds->enabled = 1;
            for ($ds->load(); $ds->isValid(); $ds->loadNext()) {
                $list_[$ds->name] = $ds->name;
            };
        };
        return $list_;
    }

}
