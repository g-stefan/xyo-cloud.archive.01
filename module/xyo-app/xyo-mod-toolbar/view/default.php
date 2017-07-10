<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if (count($this->toolbar)) {

    foreach ($this->toolbar as $item) {
	
	if($item["type"]=="item"){
		echo "<a class=\"xui toolbar item left effect-ripple ".$item["mode"]."\" href=\"".$item["url"]."\">";
			echo "<div class=\"xui icon\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;	
	};

	if($item["type"]=="item-js"){
		echo "<a class=\"xui toolbar item left effect-ripple ".$item["mode"]."\" href=\"#\" onclick=\"".$item["parameters"]."\">";
			echo "<div class=\"xui icon left\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui text left\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;
	};

    }

}
