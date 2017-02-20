<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$items = $this->parameters;

echo "\r\n";
echo "<ul class=\"list-group\">\r\n";
$count=0;
foreach ($items as $key => $value) {
	++$count;
	if ($value["selected"]) {
		echo "  <li class=\"list-group-item active\">\r\n";
		echo "     <span class=\"text-in-circle-active pull-left\">".$count."</span>\r\n";
		echo "     ".$value["text"]."\r\n";
		echo "     <span class=\"glyphicon glyphicon-chevron-right pull-right hidden-xs\"></span>\r\n";
		echo "  </li>\r\n";
	} else {
		echo "  <li class=\"list-group-item visible-lg visible-md visible-sm\">\r\n";
		echo "     <span class=\"text-in-circle pull-left\">".$count."</span>\r\n";
		echo "     ".$value["text"]."\r\n";
		echo "  </li>\r\n";
	};
};
echo "</ul>\r\n";
echo "\r\n";
