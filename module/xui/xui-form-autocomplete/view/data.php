<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
header("Content-type: application/json");

$query=$this->getRequest("query","");
if(strlen($query)==0){
	echo "[]";
	return;	
};

?>
[
	{ "value": "one", "label":"one" },
	{ "value": "two", "label":"two" },
	{ "value": "three", "label":"three" },
	{ "value": "test", "label":"test" },
	{ "value": "foo", "label":"foo" }
]
