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
	Elevation
</div>

<?php
for($k=0; $k<=24; ++$k){

	echo "<div style=\"float:left;background-color:#FFFFFF;width:192px;height:64px;border-radius:8px;border:0px solid transparent;overflow:hidden;margin:32px;padding:24px;box-sizing: border-box;\" class=\"xui -elevation-".$k."\">";
	echo $k;
	echo "</div>";

}
?>

<div class="xui separator"></div>
