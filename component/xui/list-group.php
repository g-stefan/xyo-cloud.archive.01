<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$items = $this->getArgument("items",array());


echo "<div class=\"xui list-group\">";
echo "<div class=\"xui list-group_content\">";
foreach ($items as $key => $value) {

	$id="";
	$text="";
	$selected=false;
	$iconRight="";

	if(array_key_exists("id",$value)){
		$id=$value["id"];
	};
	if(array_key_exists("text",$value)){
		$text=$value["text"];
	};
	if(array_key_exists("selected",$value)){
		$selected=$value["selected"];
	};
	if(array_key_exists("icon-right",$value)){
		$iconRight=$value["icon-right"];
	};
	
	if($selected){
		echo "<div class=\"xui list-group_item -active\">";
	}else{
		echo "<div class=\"xui list-group_item\">";
	};

	if(strlen($id)){
		echo "<div class=\"xui list-group_item_id\">".$id."</div>";
	};

	echo "<div class=\"xui list-group_item_text\">".$text."</div>";

	if(strlen($iconRight)){
		echo "<div class=\"xui list-group_item_icon-right\">".$iconRight."</div>";
	};

	echo "</div>";

};
echo "</div>";
echo "</div>";
