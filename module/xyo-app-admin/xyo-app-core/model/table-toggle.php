<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$toggle = trim($this->getRequest("toggle"));
if (strlen($toggle)) {
    
} else {
    return;
}

if($toggle==="default"){
	$this->ds->clear();
	for($this->ds->load();$this->ds->isValid();$this->ds->loadNext()){
		$this->ds->default=0;
		$this->ds->save();
	};
};

$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    $value = $this->ds->$toggle;
    if (1 * $value) {
        $value = 0;
    } else {
        $value = 1;
    }
    $this->ds->$toggle = $value;
    $this->ds->save();

	if($toggle==="default"){
		if($this->ds->default){
			$this->processModel("router-write", array("router"=>"index","core"=>$this->ds->name));
		};
	};
}

