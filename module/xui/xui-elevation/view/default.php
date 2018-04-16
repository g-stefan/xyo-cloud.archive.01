<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

echo "<div style=\"padding:30px;background-color:#FFFFFF;\">";

for($k=0; $k<=24; ++$k){
	echo "<div style=\"float:left;background-color:#FFFFFF;width:192px;height:64px;border-radius:8px;border:0px solid transparent;overflow: hidden;margin:32px;padding:24px;box-sizing: border-box;\" class=\"xui_elevation_".$k."\">";
	echo $k;
	echo "</div>";
};

echo "<div style=\"clear:both;\"></div>";

echo "</div>";
