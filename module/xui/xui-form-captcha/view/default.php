<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>

<div style="padding:32px;">
<form>

<div class="xui-form-captcha">
	<img id="captcha_image" src="<?php echo $this->requestUriModule("xui-image-captcha",array("stamp"=>md5(time().rand()))); ?>"></img>
	<div class="xui-form-captcha__input">
	<input type="text" value="" class="xui-form-text xui-form-text_default"></input>
	<button type="button" class="xui-form-text-button-icon" onclick="var el=document.getElementById('captcha_image');if(el){el.src='<?php echo $this->requestUriModule("xui-image-captcha"); ?>&stamp='+Math.random();};return false;"><i class="material-icons">sync</i></button>
	</div>
</div>

</form>
</div>