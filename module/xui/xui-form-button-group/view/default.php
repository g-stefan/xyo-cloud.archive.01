<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>


<div style="padding:32px;">
<form>

<input type="text"
        value=""
        name="search"
        class="xui-form-text xui-form-text_group-right"
	style="width:196px;display:inline-block;position:relative;float:left;"
        size="32"
	placeholder=""></input>
<span class="xui-form-text-button-group xui-form-text-button-group_right">
	<button class="xui-form-text-button-icon" type="submit" name="button1" onclick="return false;"><i class="material-icons">search</i></button>
	<button class="xui-form-text-button-icon" type="button" name="button2" onclick="return false;"><i class="material-icons">close</i></button>
</span>

<br />
<br />
<br />

<span class="xui-form-text-button-group xui-form-text-button-group_left">
<button type="button" class="xui-form-text-button-icon" onclick="return false;"><i class="material-icons">first_page</i></button>
<button type="button" class="xui-form-text-button-icon" onclick="return false;"><i class="material-icons">chevron_left</i></button>
</span>
<input type="text"
	value=""
        name="page"
	size="4"
	class="xui-form-text xui-form-text_in-group"
	style="width:64px;display:inline-block;position:relative;float:left;"></input>
	<span class="xui-form-text-button-group xui-form-text-button-group_right">
	<button type="button" class="xui-form-text-button-icon" onclick=";return false;"><i class="material-icons">chevron_right</i></button>
	<button type="button" class="xui-form-text-button-icon" onclick=";return false;"><i class="material-icons">last_page</i></button>
</span>

</form>
</div>