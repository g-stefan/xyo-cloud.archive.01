<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

echo "<div class=\"xyo-mod-sys-panel\">";

if (count($this->panel)) {

    foreach ($this->panel as $item) {

	if($item["type"]=="item"){

		echo "<a class=\"thumbnail\" href=\"" . $item["url"] . "\">";
			echo $item["img"];
			echo "<p class=\"caption\">";
			echo $item["title"];
			echo "</p>";
		echo "</a>";

	};

     };
}

echo "<div class=\"clearfix\"></div>";
echo "</div>";

