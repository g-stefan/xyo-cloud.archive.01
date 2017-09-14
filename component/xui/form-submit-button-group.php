<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$group = $this->getArgument("group");
if(count($group)>0){

	echo "<div class=\"xui-form-button-group\">";

	foreach($group as $key=>$value){
		if($value=="disabled"){
			echo "<input type=\"submit\" class=\"xui-form-button xui-form-button--disabled\" name=\"".$this->getElementName($key)."\" value=\"".$this->getFromLanguage("button_".$key)."\" disabled=\"disabled\"></input>";
			continue;
		};	
		echo "<input type=\"submit\" class=\"xui-form-button xui-form-button--".$value."\" name=\"".$this->getElementName($key)."\" value=\"".$this->getFromLanguage("button_".$key)."\"></input>";
	}

	echo "</div>";

};
