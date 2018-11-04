<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if (count($this->toolbar)) {

    foreach ($this->toolbar as $item) {
	
	if($item["type"]=="item"){
		echo "<a class=\"xui app-toolbar_button -".$item["mode"]." -effect-ripple\" href=\"".$item["url"]."\">";
			echo "<div class=\"xui app-toolbar_button_icon\">";
			echo $item["img"];
			echo "</div>";                      
			echo "<div class=\"xui app-toolbar_button_text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;	
	};

	if($item["type"]=="item-js"){
		echo "<a class=\"xui app-toolbar_button -".$item["mode"]." -effect-ripple\" href=\"#\" onclick=\"".$item["parameters"]."\">";
			echo "<div class=\"xui app-toolbar_button_icon\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui app-toolbar_button_text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;
	};

	if($item["type"]=="item.important"){
		echo "<a class=\"xui app-toolbar_button -".$item["mode"]." -important -effect-ripple\" href=\"".$item["url"]."\">";
			echo "<div class=\"xui app-toolbar_button_icon\">";
			echo $item["img"];
			echo "</div>";                      
			echo "<div class=\"xui app-toolbar_button_text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;	
	};

	if($item["type"]=="item-js.important"){
		echo "<a class=\"xui app-toolbar_button -".$item["mode"]." -important -effect-ripple\" href=\"#\" onclick=\"".$item["parameters"]."\">";
			echo "<div class=\"xui app-toolbar_button_icon\">";
			echo $item["img"];
			echo "</div>";
			echo "<div class=\"xui app-toolbar_button_text\">";
			echo $item["title"];
			echo "</div>";
		echo "</a>";
		continue;
	};


    }

}

