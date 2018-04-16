<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

echo "<div style=\"padding:30px;background-color:#D3D7CF;\">";

function generateColorPalette(&$xuiColor, $name, $rgbHex){
	$darker30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-30);
	$darker15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-15);
	$lighter15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,15);
	$lighter30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,30);

	echo "<div style=\"float:left;width:192px;height:auto;border-radius:8px;border:0px solid transparent;overflow: hidden;margin: 8px 8px 8px 8px;\">";
	echo "<div style=\"height:40px;background-color:#FFFFFF;font-size:16px;text-align:center;line-height:24px;color:#44444;\">".$name."</div>";
	echo "<div style=\"height:24px;padding-right:8px;font-size:16px;line-height:24px;text-align:right;background-color:".$darker30.";color:".$xuiColor->rgbHexContrastBlackOrWhite($darker30).";\">".$darker30."</div>";
	echo "<div style=\"height:48px;padding-right:8px;font-size:16px;line-height:24px;text-align:right;background-color:".$darker15.";color:".$xuiColor->rgbHexContrastBlackOrWhite($darker15).";\">".$darker15."</div>";
	echo "<div style=\"height:72px;padding-right:8px;font-size:16px;line-height:24px;text-align:right;background-color:".$rgbHex.";color:".$xuiColor->rgbHexContrastBlackOrWhite($rgbHex).";\">".$rgbHex."</div>";
	echo "<div style=\"height:48px;padding-right:8px;font-size:16px;line-height:24px;text-align:right;background-color:".$lighter15.";color:".$xuiColor->rgbHexContrastBlackOrWhite($lighter15).";\">".$lighter15."</div>";
	echo "<div style=\"height:24px;padding-right:8px;font-size:16px;line-height:24px;text-align:right;background-color:".$lighter30.";color:".$xuiColor->rgbHexContrastBlackOrWhite($lighter30).";\">".$lighter30."</div>";
	echo "</div>";
}

foreach($this->palette as $key=>$value){
  	generateColorPalette($this->xuiColor, $key, $value);
};

echo "<div style=\"clear:both;\"></div>";

echo "</div>";
