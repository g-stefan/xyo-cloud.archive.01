<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");

?>

<br>
<br>
<form>
<hr>
<hr>
<div style="width:640px;margin-left: 30px;">
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<div class="xui-progress-bar xui-progress-bar_<?php echo $key; ?> xui_elevation-1">
	<div class="xui-progress-bar__bar"></div>
	<div class="xui-progress-bar__label">50%</div>
</div><br>
<br><br>
<?php }; ?>
</div>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>

</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
