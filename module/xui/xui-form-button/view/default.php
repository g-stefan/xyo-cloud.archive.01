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

<div style="margin-left:30px">
<br>
<br>
<form>
<hr>
<?php foreach($xuiTheme->colorTypeButton as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<?php  ?>
<input type="button" value="<?php echo $key; ?>" class="xui-form-button xui-form-button_<?php echo $key; ?>"<?php echo $disabled; ?>></input>
<br><br>
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