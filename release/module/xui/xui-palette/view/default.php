<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Palette
</div>

<style>
.palette {
	position: relative;
	display: block;
	width: 1024px;
	height: auto;
	box-sizing: border-box;
}

.palette_card {
	margin-left: 0px;
	margin-right: auto;
}

.palette_name {
	text-transform: uppercase;
	font-size: 16px;
	text-align: center;
	line-height: 40px;
}
</style>
	
<?php

$itemList=array(
	"butter",
	"orange",
	"chocolate",

	"chameleon",
	"sky-blue",
	"plum",

	"scarlet-red",
	"aluminium",
	"aqua",

	"mint",
	"sunflower",
	"science-blue",

	"rock",
	"",
	""
);

echo "<div class=\"palette\">";

$index=0;
foreach($itemList as $value){
	if($index==0){
		echo "<div class=\"xui grid -row\" style=\"padding-top:12px;\">";
	};
	echo "<div class=\"xui grid -col12 -x4\">";
	if(strlen($value)>0){
		echo "<div class=\"palette_card xui card -horizontal -mini -elevation-2\">";
			echo "<div class=\"xui grid -row\">";
				if(($value!="aluminium")&&($value!="rock")){
					echo "<div class=\"xui grid -col12 -x4 -bg-".$value."-1\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x4 -bg-".$value."-2\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x4 -bg-".$value."-3\" style=\"height:100%;\"></div>";
				}else{
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-1\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-2\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-3\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-4\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-5\" style=\"height:100%;\"></div>";
					echo "<div class=\"xui grid -col12 -x2 -bg-".$value."-6\" style=\"height:100%;\"></div>";
				};
			echo "</div>";
			echo "<div class=\"palette_name xui\">";
				echo $value;
			echo "</div>";
		echo "</div>";
	};
	echo "</div>";
	++$index;
	if($index==3){
		echo "</div>";
		$index=0;
	};
};

echo "</div>";


