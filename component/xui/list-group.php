<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$items = $this->getArgument("items",array());


echo "<div class=\"xui-list-group\">";
foreach ($items as $key => $value) {

	$id="";
	$text="";
	$selected=false;
	$iconLeft="";

	if(array_key_exists("id",$value)){
		$id=$value["id"];
	};
	if(array_key_exists("text",$value)){
		$text=$value["text"];
	};
	if(array_key_exists("selected",$value)){
		$selected=$value["selected"];
	};
	if(array_key_exists("icon-left",$value)){
		$iconLeft=$value["icon-left"];
	};
	
	if($selected){
		echo "<div class=\"xui-list-group__item xui-list-group__item--active\">";
	}else{
		echo "<div class=\"xui-list-group__item\">";
	};

	if(strlen($id)){
		echo "<div class=\"xui-list-group__item__id\">".$id."</div>";
	};

	echo "<div class=\"xui-list-group__item__text\">".$text."</div>";

	if(strlen($iconLeft)){
		echo "<div class=\"xui-list-group__item__icon-left\">".$iconLeft."</div>";
	};

	echo "</div>";

};
echo "</div>";
