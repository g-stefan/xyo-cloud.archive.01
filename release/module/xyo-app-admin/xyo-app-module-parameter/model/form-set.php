<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if($this->xyo_module_id>0) {

	foreach($this->items as $item) {
		if(!is_null($item["name"])){
			$this->ds->clear();
			$this->ds->xyo_module_id=$this->xyo_module_id;
			$value=$item["default_value"];
			$this->ds->name=$item["name"];
			if($this->ds->load(0,1)) {
				$value=$this->ds->value;
			};
			$this->setElementValue($item["name"],$value);
		};
	};

};
