<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
//
// implements - Active Record Pattern
//
$className = "xyo_mod_datasource_Xyo";

class xyo_mod_datasource_Xyo extends xyo_Module {

    var $ds;
    var $connectionList_;
    var $dataSourceList_;

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        $this->ds = &$this->cloud->getModule("xyo-mod-datasource");
        if ($this->ds) {
        } else {
            $this->moduleDisable();
            return;
        };

        if ($this->isBase("xyo_mod_datasource_Xyo")) {
            require_once($this->path . "connection.php");
            require_once($this->path . "table.php");
            require_once($this->path . "query.php");
        }

        $this->connectionList_ = array();
        $this->dataSourceList_ = array();

        if ($this->isBase("xyo_mod_datasource_Xyo")) {
            $this->includeConfig($this->name);
        }
    }

    function setConnection($name, $databasePath) {
        $this->connectionList_[$name] = new xyo_mod_datasource_xyo_Connection($this, $name, $databasePath);
    }

    function setConnectionOption($name, $option, $value) {
        
    }

    function getLayer() {
        return "xyo";
    }

    function setDataSourceDescriptor($name, $descriptor) {
        $this->dataSourceList_[$name] = $descriptor;
    }

    function getDataSourceList() {
        return array_keys($this->dataSourceList_);
    }

    function getDataSourceParameter($name) {
        if (array_key_exists($name, $this->dataSourceList_)) {
            return $this->dataSourceList_[$name][1];
        };
        return null;
    }

    function &getConnection($name) {
        $retV = null;
        if (array_key_exists($name, $this->connectionList_)) {
            $retV = $this->connectionList_[$name];
        };
        return $retV;
    }

    function &getDataSource($name, $as_=null) { // system.connexion_name.table/query.name
        $v_ = null;
        if ($name) {
            
        } else {
            return $v_;
        };
        $matches = array();
        if (preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/", $name, $matches)) {
            if (count($matches) > 3) {

				if (array_key_exists($matches[1], $this->connectionList_)) {
				}else{
					$this->includeConfig("config.ds.".$matches[1]);
				};


                if (array_key_exists($matches[1], $this->connectionList_)) {
                    if (array_key_exists($name, $this->dataSourceList_)) {
                        if ($this->dataSourceList_[$name]) {
                            if (strcmp($matches[2], "table") == 0) {
                                if ($this->connectionList_[$matches[1]]->open()) {
                                    $v_ = new xyo_mod_datasource_xyo_Table($this, $this->connectionList_[$matches[1]], $matches[3], $name, $this->dataSourceList_[$name], $as_);
                                    if ($v_->isOk()) {
                                        
                                    } else {
                                        $v_ = null;
                                    };
                                };
                            };
                            if (strcmp($matches[2], "query") == 0) {
                                if ($this->connectionList_[$matches[1]]->open()) {
                                    $v_ = new xyo_mod_datasource_xyo_Query($this, $this->connectionList_[$matches[1]], $matches[3], $name, $this->dataSourceList_[$name], $as_);
                                    if ($v_->isOk()) {
                                        
                                    } else {
                                        $v_ = null;
                                    };
                                };
                            };
                        };
                    };
                };
            };
        };
        return $v_;
    }

    function setModuleDataSource($module, $name) {
        $descriptor = $this->cloud->get("path_base") . "datasource/" . $name . ".php";
        if (file_exists($descriptor)) {
            
        } else {
            $descriptor = $this->cloud->getModulePath($module);
            if ($descriptor) {
                $descriptor.="datasource/" . $name . ".php";
                if (file_exists($descriptor)) {
                    
                } else {
                    return false;
                }
            }
        }

        $this->ds->setDataSourceDescriptor($name, $descriptor);
        $this->setDataSourceDescriptor($name, $descriptor);
        return true;
    }

}

