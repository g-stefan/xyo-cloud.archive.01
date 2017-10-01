<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
?>                 
<a class="xui_effect-ripple xui-button xui-button_size-40x40 xui_left" href="<?php echo $this->requestUriModule("xyo-app-logout", array("stamp"=>md5(time().rand()))); ?>" style="text-align:center;">
	<i class="material-icons">eject</i>
</a>



