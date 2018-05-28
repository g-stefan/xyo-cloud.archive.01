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
<form style="padding-left: 30px;">
<hr>
<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<label class="xui-form-label xui-form-label_<?php echo $key; ?>"><?php echo $key; ?></label><br>
<input type="text" value="" class="xui-form-text xui-form-text_<?php echo $key; ?>"<?php echo $disabled; ?>></input>
<br><br>
<?php }; ?>
<hr>
<br>
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
