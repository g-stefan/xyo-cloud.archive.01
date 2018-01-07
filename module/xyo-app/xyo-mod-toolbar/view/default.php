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
		echo "<a class=\"xui-toolbar__item xui_left xui-toolbar__item_".$item["mode"]." xui_effect-ripple\" href=\"".$item["url"]."\">";
			echo "<div class=\"xui-toolbar__icon\">";
			echo $item["img"];
			echo "</div>";                      
			echo "<div class=\"xui-toolbar__text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;	
	};

	if($item["type"]=="item-js"){
		echo "<a class=\"xui-toolbar__item xui_left xui-toolbar__item_".$item["mode"]." xui_effect-ripple\" href=\"#\" onclick=\"".$item["parameters"]."\">";
			echo "<div class=\"xui-toolbar__icon\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui-toolbar__text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;
	};

	if($item["type"]=="item.important"){
		echo "<a class=\"xui-toolbar__item xui_left xui-toolbar__item_".$item["mode"]." xui-toolbar__item_important xui_effect-ripple\" href=\"".$item["url"]."\">";
			echo "<div class=\"xui-toolbar__icon\">";
			echo $item["img"];
			echo "</div>";                      
			echo "<div class=\"xui-toolbar__text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;	
	};

	if($item["type"]=="item-js.important"){
		echo "<a class=\"xui-toolbar__item xui_left xui-toolbar__item_".$item["mode"]." xui-toolbar__item_important xui_effect-ripple\" href=\"#\" onclick=\"".$item["parameters"]."\">";
			echo "<div class=\"xui-toolbar__icon\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui-toolbar__text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;
	};


    }

}

