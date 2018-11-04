<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$item=$this->getArgument("item",array());

$isPopup=false;
if(array_key_exists("popup",$item)){
	if(count($item["popup"])){
		$isPopup=true;
	};
};

$active=false;
if(array_key_exists("active",$item)){
	$active=$item["active"];
};

$url=" href=\"#\" onclick=\"return false;\"";
if(array_key_exists("url",$item)){
	$url=" href=\"".$item["url"]."\"";
	if($isPopup){
		$url.=" onclick=\"return false;\"";
	};
};

$icon="";
if(array_key_exists("icon",$item)){
	$icon=$item["icon"];
};

$text="";
if(array_key_exists("text",$item)){
	$text=$item["text"];
};


if(array_key_exists("separator",$item)){
	if($item["separator"]){
		echo "<div class=\"xui separator\">";
			echo "<div class=\"xui line\"></div>";
		echo "</div>";
		return;
	};
};

echo "<div class=\"xui menu_item".($isPopup?" -submenu":"")."\">";
echo "<div class=\"xui menu_item_content\">";
	echo "<a class=\"xui action -effect-ripple".($active?" -selected":"").($isPopup?" -toggle":"")."\"".$url.($isPopup?" data-xui-toggle=\"parent-2\"":"").">";
		echo "<div class=\"xui action_content\">";
			echo "<div class=\"xui action_left\"></div>";
			echo "<div class=\"xui action_icon-left\">";
				echo $icon;
			echo "</div>";
			echo "<div class=\"xui action_text\">".$text."</div>";
			echo "<div class=\"xui action_right\"></div>";
			if($isPopup){
				echo "<div class=\"xui action_icon-right\">";
					echo "<i class=\"material-icons\">chevron_right</i>";
				echo "</div>";
			};
		echo "</div>";
	echo "</a>";
echo "</div>";
if($isPopup){
	echo "<div class=\"xui menu_submenu\">";
		echo "<div class=\"xui menu_submenu_content\">";
			$this->generateNavigationDrawerMenuView($item["popup"]);
		echo "</div>";
	echo "</div>";
};
echo "</div>";

