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

<div style="padding:30px;">
<br>
<br>
<form>
<hr>
<hr>
<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<div class="xui-form-checkbox2 xui-form-checkbox2_<?php echo $key; ?>">
    <input type="checkbox" id="chekbox-item-<?php echo $key; ?>" name="chekbox-item" value="chekbox-option-<?php echo $key; ?>"<?php echo $disabled; ?>></input>
    <label for="chekbox-item-<?php echo $key; ?>"><?php echo $key; ?></label>
</div>
<?php }; ?>
<hr>

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
</div>