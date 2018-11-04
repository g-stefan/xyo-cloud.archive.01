<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Palette
</div>
	
<?php
function generateColorPalette(&$xuiColor, $name, $rgbHex){
	$darker30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-30);
	$darker15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,-15);
	$lighter15=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,15);
	$lighter30=$xuiColor->rgbHexHSLAdjust($rgbHex,0,0,30);

	echo "<div style=\"display:inline-block;margin: 2px 2px 2px 2px;border:1px solid #CCCCCC;border-radius:3px;\">";
	echo "<div style=\"display:inline-block;height:24px;width:240px;background-color:#FFFFFF;font-size:16px;text-align:center;line-height:24px;color:#000000;\">".$name."</div>";
	echo "<div style=\"display:inline-block;height:24px;width:96px;padding-left:8px;font-size:16px;line-height:24px;text-align:left;background-color:".$darker30.";color:".$xuiColor->rgbHexContrastBlackOrWhite($darker30).";\">".$darker30."</div>";
	echo "<div style=\"display:inline-block;height:24px;width:128px;padding-left:8px;font-size:16px;line-height:24px;text-align:left;background-color:".$darker15.";color:".$xuiColor->rgbHexContrastBlackOrWhite($darker15).";\">".$darker15."</div>";
	echo "<div style=\"display:inline-block;height:24px;width:192px;padding-left:8px;font-size:16px;line-height:24px;text-align:left;background-color:".$rgbHex.";color:".$xuiColor->rgbHexContrastBlackOrWhite($rgbHex).";\">".$rgbHex."</div>";
	echo "<div style=\"display:inline-block;height:24px;width:128px;padding-left:8px;font-size:16px;line-height:24px;text-align:left;background-color:".$lighter15.";color:".$xuiColor->rgbHexContrastBlackOrWhite($lighter15).";\">".$lighter15."</div>";
	echo "<div style=\"display:inline-block;height:24px;width:96px;padding-left:8px;font-size:16px;line-height:24px;text-align:left;background-color:".$lighter30.";color:".$xuiColor->rgbHexContrastBlackOrWhite($lighter30).";\">".$lighter30."</div>";
	echo "</div>";
}

foreach($this->palette as $key=>$value){
  	generateColorPalette($this->xuiColor, $key, $value);
};

?>

<div class="xui separator"></div>