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

$this->language->set("label_picture","Picture");

?>

<div style="padding:32px;">
<form>

<?php

$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.form-file-image",array("element"=>"picture"));
$this->generateComponent("xui.box-1x1-end");

?>

</form>
</div>
