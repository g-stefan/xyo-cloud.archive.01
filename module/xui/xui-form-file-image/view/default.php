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
$xuiTheme=&$this->getModule("xui-theme");

?>

<br>
<br>
<br>
<br>
<br>
<form>


<?php

$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.form-file-image",array("element"=>"picture"));
$this->generateComponent("xui.box-1x1-end");

 ?>

</form>
<br>
<br>
<br>
<br>
