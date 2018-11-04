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
	Form - Captcha
</div>

<form>
	<div class="xui form-captcha">
		<img id="captcha_image" src="<?php echo $this->requestUriModule("xui-image-captcha",array("stamp"=>md5(time().rand()))); ?>"></img>
		<div class="xui form-input-group">
			<input type="text" value=""></input>
			<button type="button" onclick="var el=document.getElementById('captcha_image');if(el){el.src='<?php echo $this->requestUriModule("xui-image-captcha"); ?>&stamp='+Math.random();};return false;"><i class="material-icons">sync</i></button>
		</div>
	</div>
</form>
	