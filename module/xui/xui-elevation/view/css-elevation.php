<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>


/*
//
//
//
*/

.xui_elevation-transition{
	transition: box-shadow 0.3s ease;
}

.xui_elevation-0{
	box-shadow: none;	
}

<?php

for($k=1; $k<=24; ++$k){
	echo ".xui_elevation-".$k." {\r\n";
	echo "\tbox-shadow: 0px 0px ".floor($k/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($k/4)."px ".$k."px ".$k."px 0px rgba(0, 0, 0, 0.12), ".floor($k/8)."px ".floor($k/4)."px ".$k."px 0px rgba(0, 0, 0, 0.14);\r\n";
	echo "}\r\n\r\n";

	echo ".xui_elevation-".$k."-hover:hover {\r\n";
	echo "\tbox-shadow: 0px 0px ".floor($k/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($k/4)."px ".$k."px ".$k."px 0px rgba(0, 0, 0, 0.12), ".floor($k/8)."px ".floor($k/4)."px ".$k."px 0px rgba(0, 0, 0, 0.14);\r\n";
	echo "}\r\n\r\n";

	echo ".xui_elevation-".$k."-focus:focus {\r\n";
	echo "\tbox-shadow: 0px 0px ".floor($k/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($k/4)."px ".$k."px ".$k."px 0px rgba(0, 0, 0, 0.12), ".floor($k/8)."px ".floor($k/4)."px ".$k."px 0px rgba(0, 0, 0, 0.14);\r\n";
	echo "}\r\n\r\n";

	echo ".xui_elevation-".$k."-active:active {\r\n";
	echo "\tbox-shadow: 0px 0px ".floor($k/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($k/4)."px ".$k."px ".$k."px 0px rgba(0, 0, 0, 0.12), ".floor($k/8)."px ".floor($k/4)."px ".$k."px 0px rgba(0, 0, 0, 0.14);\r\n";
	echo "}\r\n\r\n";

};
