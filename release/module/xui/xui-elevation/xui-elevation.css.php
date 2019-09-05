<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.-elevation-transition{
	transition: box-shadow 0.5s ease;
}

</style>

<?php

$xuiElevation=&$this->getModule("xui-elevation");

for($k=0;$k<=24;++$k){
	echo ".xui.-elevation-".$k.",\n";
	echo ".xui.-elevation-".$k."-hover:hover,\n";
	echo ".xui.-elevation-".$k."-focus:focus,\n";
	echo ".xui.-elevation-".$k."-active:active,\n";
	echo ".xui.-elevation-".$k."-focus:hover:focus,\n";
	echo ".xui.-elevation-".$k."-active:hover:active ";
	echo "{\n";
		$xuiElevation->eElevation($k);
	echo "}\n";
};

?>
