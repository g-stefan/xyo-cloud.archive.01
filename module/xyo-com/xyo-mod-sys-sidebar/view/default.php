<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

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
			$img = "<i class=\"icon ".$img."\"></i>";
		}else{
	            $img = "<img class=\"icon\" src=\"".$img."\"></img>";
		};
        } else {
            $img = "";
        };	

        if ($value["type"] === "item"){
		if (count($value["popup"])) {
			if($level>0){
				echo "<li id=\"nav-sidebar-".$level."-".$index."\">";
				echo 	"<div class=\"wrapper\">";				
	                	echo 		"<a href=\"" . $value["url"] . "\">". $img  . "<span>" . $value["title"] . "</span>" ."</a>";
				echo 		"<a data-toggle=\"collapse\" data-parent=\"#nav-sidebar-".$level."-".$index."\" href=\"#nav-sidebar-child-".$level."-".$index."\" class=\"nav-sidebar-toggle collapsed pull-right\"><i class=\"glyphicon glyphicon-chevron-left\"></i><i class=\"glyphicon glyphicon-chevron-down\"></i></a>";
				echo 	"</div>";
				echo "<ul class=\"collapse\" id=\"nav-sidebar-child-".$level."-".$index."\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			}else{	
				echo "<li id=\"nav-sidebar-".$level."-".$index."\">";
				echo 	"<div class=\"wrapper\">";				
	                	echo 		"<a href=\"" . $value["url"] . "\">". $img  . "<span>" . $value["title"] . "</span>" ."</a>";
				echo 		"<a data-toggle=\"collapse\" data-parent=\"#nav-sidebar-".$level."-".$index."\" href=\"#nav-sidebar-child-".$level."-".$index."\" class=\"nav-sidebar-toggle collapsed pull-right\"><i class=\"glyphicon glyphicon-chevron-left\"></i><i class=\"glyphicon glyphicon-chevron-down\"></i></a>";
				echo 	"</div>";
				echo "<ul class=\"collapse\" id=\"nav-sidebar-child-".$level."-".$index."\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			};				
		}else{
			echo "<li>";
				echo 	"<div class=\"wrapper\">";			
	                	echo "<a href=\"" . $value["url"] . "\">". $img  . "<span>" .$value["title"] . "</span>" . "</a>";
				echo 	"</div>";
			echo "</li>";	
		};
	}else
	if($value["type"] === "item-activated") {
            if (count($value["popup"])) {
			if($level>0){
				echo "<li class=\"active\" id=\"nav-sidebar-".$level."-".$index."\">";
				echo 	"<div class=\"wrapper\">";			
	                	echo 		"<a href=\"" . $value["url"] . "\">". $img  . "<span>". $value["title"]. "</span>" . "</a>";
				echo 		"<a data-toggle=\"collapse\" data-parent=\"#nav-sidebar-".$level."-".$index."\" href=\"#nav-sidebar-child-".$level."-".$index."\" class=\"nav-sidebar-toggle collapse in pull-right\"><i class=\"glyphicon glyphicon-chevron-left\"></i><i class=\"glyphicon glyphicon-chevron-down\"></i></a>";
				echo 	"</div>";
				echo "<ul class=\"collapse in\" id=\"nav-sidebar-child-".$level."-".$index."\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			}else{				
				echo "<li class=\"active\" id=\"nav-sidebar-".$level."-".$index."\">";
				echo 	"<div class=\"wrapper\">";			
	                	echo 		"<a href=\"" . $value["url"] . "\">". $img  . "<span>". $value["title"]. "</span>" . "</a>";
				echo 		"<a data-toggle=\"collapse\" data-parent=\"#nav-sidebar-".$level."-".$index."\" href=\"#nav-sidebar-child-".$level."-".$index."\" class=\"nav-sidebar-toggle collapse in pull-right\"><i class=\"glyphicon glyphicon-chevron-left\"></i><i class=\"glyphicon glyphicon-chevron-down\"></i></a>";
				echo 		"<i class=\"glyphicon glyphicon-chevron-down pull-right\"></i>";
				echo 	"</div>";
				echo "<ul class=\"collapse in\" id=\"nav-sidebar-child-".$level."-".$index."\">";
			                xyo_mod_sys_menu__generate($value["popup"], $level + 1);
				echo "</ul>";
				echo "</li>";
			};				
            } else {
		echo "<li class=\"active\">";
		echo "<div class=\"wrapper\">";			
	        	echo "<a href=\"" . $value["url"] . "\">". $img  . "<span>". $value["title"] . "</span>". "</a>";
		echo "</div>";
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
	echo "<ul class=\"nav nav-sidebar\">";
		xyo_mod_sys_menu__generate($this->menu, 0);
	echo "</ul>";
};


