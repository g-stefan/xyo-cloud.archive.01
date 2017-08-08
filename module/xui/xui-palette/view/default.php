<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");

function generateColorPalette(&$xuiColor, $name, $rgbHex){
	$darker30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-30);
	$darker15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-15);
	$lighter15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,15);
	$lighter30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,30);

	echo "<div style=\"float:left;width:180px;height:auto;border-radius:8px;border:0px solid transparent;overflow: hidden;margin: 8px 8px 8px 8px;\">";
	echo "<div style=\"width:180px;height:30px;background-color:#FFFFFF;font-size:16px;text-align:center;line-height:30px;color:#44444;\">".$name."</div>";
	echo "<div style=\"width:180px;height:15px;background-color:".$darker30.";\"></div>";
	echo "<div style=\"width:180px;height:30px;background-color:".$darker15.";\"></div>";
	echo "<div style=\"width:180px;height:60px;background-color:".$rgbHex.";\"></div>";
	echo "<div style=\"width:180px;height:30px;background-color:".$lighter15.";\"></div>";
	echo "<div style=\"width:180px;height:15px;background-color:".$lighter30.";\"></div>";
	echo "</div>";
}

function generateColorCore(&$xuiColor, $name, $color, $darker){
	echo "<div style=\"float:left;width:180px;height:auto;border-radius:8px;border:0px solid transparent;overflow: hidden;margin: 8px 8px 8px 8px;\">";
	echo "<div style=\"width:180px;height:30px;background-color:#FFFFFF;font-size:16px;text-align:center;line-height:30px;color:#44444;\">".$name."</div>";
	echo "<div style=\"width:90px;height:60px;background-color:".$color.";float:left;\"></div>";
	echo "<div style=\"width:90px;height:60px;background-color:".$darker.";float:right;\"></div>";
	echo "</div>";
}

function generateColor(&$xuiColor, $name, $color){
	echo "<div style=\"float:left;width:180px;height:auto;border-radius:8px;border:0px solid transparent;overflow: hidden;margin: 8px 8px 8px 8px;\">";
	echo "<div style=\"width:180px;height:30px;background-color:#FFFFFF;font-size:16px;text-align:center;line-height:30px;color:#44444;\">".$name."</div>";
	echo "<div style=\"width:180px;height:60px;background-color:".$color.";\"></div>";
	echo "</div>";
}


echo "<div style=\"background-color:#E0E0E0;margin:60px 60px 60px 60px;padding:30px 30px 30px 30px;border-radius:8px;border:0px solid transparent;overflow: hidden;\">";
	foreach($this->colorCore as $key=>$value){
	  	generateColorCore($xuiColor, $key, $value[0], $value[1]);
	};
echo "<div style=\"clear:both;\"></div>";
echo "<hr>";
	foreach($this->colorPalette as $key=>$value){
	  	generateColorPalette($xuiColor, $key, $value);
	};
echo "<div style=\"clear:both;\"></div>";
echo "<hr>";
	foreach($this->colorTypeButton as $key=>$value){
	  	generateColor($xuiColor, $key, $value);
	};
echo "<div style=\"clear:both;\"></div>";
echo "</div>";
