<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setParameter("toolbar", "toolbar/default");
$this->processModel("selest-layer");
$this->setView("default");

$allOk = true;
$this->clearElementError();
$layer = $this->getElementValue("layer");
if ($layer === "mysql" || $layer === "postgresql" ) {
    $server = $this->getElementValueString("server");
    if (strlen($server) == 0) {
        $this->setElementError("server", $this->getFromLanguage("server_empty"));
    }

    $port = $this->getElementValueString("port");
    if (strlen($port) == 0) {		
		$port=0;
    }
	if(1*$port){}else{
		if($layer === "mysql"){
			$port="3306";
		};
		if($layer === "postgresql"){
			$port="5432";
		};
	};

	$this->setElementValue("port",$port);
	

    $username = $this->getElementValueString("username");
    if (strlen($username) == 0) {
        $this->setElementError("username", $this->getFromLanguage("username_empty"));
    }

    $database = $this->getElementValueString("database");
    if (strlen($database) == 0) {
        $this->setElementError("database", $this->getFromLanguage("database_empty"));
    }
}

$this->processModel("datasource-config");

if ($this->isError()) {
    $this->doRedirect("default");
} else {
    $this->doRedirect("backup");
}
