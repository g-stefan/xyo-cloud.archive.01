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

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<div class="xui-form-radio xui-form-radio_<?php echo $key; ?>">
    <input type="radio" id="radio-item-<?php echo $key; ?>" name="radio-item" value="radio-option-<?php echo $key; ?>"<?php echo $disabled; ?>></input>
    <label for="radio-item-<?php echo $key; ?>"><?php echo $key; ?></label>
</div>
<br />
<?php }; ?>

</form>
</div>
