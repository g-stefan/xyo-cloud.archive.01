<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>                 
<a class="xui button -size-32x40 -circle -left -effect-ripple" href="<?php echo $this->requestUriModule("xyo-app-logout", array("stamp"=>md5(time().rand()))); ?>">
	<i class="material-icons">eject</i>
</a>



