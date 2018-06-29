<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

function xyo_mod_sys_menu__scan_activated(&$menu){
	$retV=false;
	foreach ($menu as $key => $value) {
		if ($value["type"] === "item-activated") {			
			$retV=true;
		}else
		if ($value["type"] ==="item"){
			if (count($value["popup"])) {
				if(xyo_mod_sys_menu__scan_activated($menu[$key]["popup"])){
					$menu[$key]["type"]="item-activated";
					$retV=true;
				}
			}
		}
	}
	return $retV;
}

function xyo_mod_sys_menu__generate(&$menu, $level) {
    $len = count($menu) - 1;
    $index = 0;
    $last ="*";
    foreach ($menu as $key => $value) {

        $img = $value["img"];
        if ($img) {
		if(strncmp($img,"#",1)==0){
			// icon
		        $img = substr($img,1);
			$img = "<i class=\"".$img."\" style=\"font-size:16px;margin-right:6px;color:#999;\"></i>";
		}else{
	            $img = "<img src=\"".$img."\" style=\"width:16px;height:16px;border:0px;margin-right:6px;\"></img>";
		};
        } else {
            $img = "";
        };	

        if ($value["type"] === "item"){
		if (count($value["popup"])) {
			if($level>1){
				echo "<li class=\"dropdown-submenu\">";
	                	echo "<a href=\"" . $value["url"] . "\">". $img . $value["title"] . "</a>";
				echo "<ul class=\"dropdown-menu\" role=\"menu\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			}else{				
				echo "<li class=\"dropdown\">";
	                	echo "<a href=\"" . $value["url"] . "\">". $img  . $value["title"] . "</a>";
				echo "<ul class=\"dropdown-menu\" role=\"menu\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			};				
		}else{
			echo "<li>";
	                	echo "<a href=\"" . $value["url"] . "\">". $img  . $value["title"] . "</a>";
			echo "</li>";	
		};
	}else
	if($value["type"] === "item-activated") {
            if (count($value["popup"])) {
			if($level>1){
				echo "<li class=\"dropdown-submenu active\">";
	                	echo "<a href=\"" . $value["url"] . "\">" . $img . $value["title"] . "</a>";
				echo "<ul class=\"dropdown-menu\" role=\"menu\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			}else{				
				echo "<li class=\"dropdown active\">";
	                	echo "<a href=\"" . $value["url"] . "\">". $img  . $value["title"] . "</a>";
				echo "<ul class=\"dropdown-menu\" role=\"menu\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			};				
            } else {
		echo "<li class=\"active\">";
	        echo "<a href=\"" . $value["url"] . "\">". $img  . $value["title"] . "</a>";
		echo "</li>";	
            }
        } else
        if ($value["type"] === "separator") {
            echo "<li class=\"divider\"></li>";
        }else
        if ($value["type"] === "separator-begin" && $level >0) {
			if($last==="separator-end"){}else{
				if($index>0){
					echo "<li class=\"divider\"></li>";
				};
			}
        }else
        if ($value["type"] === "separator-end" && $level >0) {
			if($index<$len){
				echo "<li class=\"divider\"></li>";
			};
        };

	$last=$value["type"];
        ++$index;
    }
}

if (count($this->menu)) {	
    xyo_mod_sys_menu__scan_activated($this->menu);
    echo "<ul class=\"nav navbar-nav\">";
    xyo_mod_sys_menu__generate($this->menu, 0);
    echo "</ul>";
};

