<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?>


/*
//
//
//
*/

.xui_elevation-transition{
	transition: box-shadow 0.3s ease;
}

.xui_elevation_0{
<?php 	$this->eElevationCss(0); ?>
}

<?php

for($k=1; $k<=24; ++$k){
	echo ".xui_elevation_".$k." {\r\n";
	$this->eElevationCss($k);
	echo "}\r\n\r\n";

	echo ".xui_elevation_".$k."-hover:hover {\r\n";
	$this->eElevationCss($k);
	echo "}\r\n\r\n";

	echo ".xui_elevation_".$k."-focus:focus {\r\n";
	$this->eElevationCss($k);
	echo "}\r\n\r\n";

	echo ".xui_elevation_".$k."-active:active {\r\n";
	$this->eElevationCss($k);
	echo "}\r\n\r\n";

};
