<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$name = preg_replace("/[^A-Za-z0-9\-_]/", "-", strtolower($this->getElementValueStr("name")));
if (strlen($name) == 0) {
    $this->setElementError("name", $this->getFromLanguage("el_name_empty"));
}

if ($this->isElementError()) {
    return;
};

$this->ds->clear();
$this->ds->name = $name;
if ($this->ds->tryLoad(0, 1)) {
    if ($this->ds->{$this->tablePrimaryKey} != $this->id) {
        $this->setElementError("name", $this->getFromLanguage("el_name_already_exists"));
        return;
    }
}

if ($this->isNew) {
    
} else {
    $this->ds->clear();
    $this->ds->{$this->tablePrimaryKey} = $this->id;
    if ($this->ds->load(0, 1)) {
        
    } else {
        $this->setError("error", array("err_id_not_found" => $this->id));
        return;
    }

    if ($this->ds->name == $name) {
        
    } else {
        $this->processModel("router-delete", null, false);
    }
}

$this->ds->name = $name;
$this->ds->description = $this->getElementValueStr("description");
$this->ds->enabled = $this->getElementValueInt("enabled", 0, "*");
$this->ds->default = $this->getElementValueInt("default", 0, "*");

if ($this->ds->save()) {
    $this->processModel("router-write", array("router"=>$this->ds->name,"core"=>$this->ds->name), false);
	if($this->ds->default){
		$dsX=&$this->ds->copyThis();
		$dsX->clear();
		for($dsX->load();$dsX->isValid();$dsX->loadNext()){
			if($dsX->id==$this->ds->id){
				$this->processModel("router-write", array("router"=>"index","core"=>$this->ds->name));
			}else{
				$dsX->default=0;
				$dsX->save();
			};
		};
	};
} else {
    $this->setError("error", "err_save_error");
    return;
}


