<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$toggle = trim($this->getRequest("toggle"));
if (strlen($toggle)) {
    
} else {
    return;
}

if ($toggle=="principal") {
	$this->ds->clear();
	$this->ds->{$this->primaryKey} = $this->primaryKeyValue;	
	if($this->ds->load(0,1)){
		$dsx=&$this->ds->copyThis();
		$dsx->clear();
		$dsx->id_xyo_user=$this->ds->id_xyo_user;
		$dsx->update(array("principal"=>0));
		for (;$this->ds->isValid(); $this->ds->loadNext()) {
			$this->ds->principal=1;
			$this->ds->save();
		};
	};
	return;
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
}
