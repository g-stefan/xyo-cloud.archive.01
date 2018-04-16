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

<br>
<br>
<form>
<hr>

<label class="xui-form-label xui-form-label_default">Captcha</label><br>
<div class="xui-form-captcha">
	<img id="captcha_image" src="<?php echo $this->requestUriModule("xui-image-captcha",array("stamp"=>md5(time().rand()))); ?>"></img>
	<div class="xui-form-captcha__input">
	<input type="text" value="" class="xui-form-text xui-form-text_default"></input>
	<button type="button" class="xui-form-text-button-icon" onclick="console.log('refresh');"><i class="material-icons">sync</i></button>
	</div>
</div>


<hr>



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
