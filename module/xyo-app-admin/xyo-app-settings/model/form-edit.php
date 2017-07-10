<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("form-set");

$enabled = array(
		   "*" => $this->getFromLanguage("select_enabled_default_disabled"),
		   "1" => $this->getFromLanguage("select_enabled_enabled"),
		   "0" => $this->getFromLanguage("select_enabled_disabled")
	   );

$this->setParameter("select_enabled", $enabled);


foreach($this->items as $item) {
	if(!is_null($item["name"])){
		if($item["type"]=="select"){
			$this->setParameter("select_".$item["name"],$item["parameters"]);
		};
	};                                   
};

