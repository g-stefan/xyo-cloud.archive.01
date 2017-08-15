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

?>

<br>
<br>
<form>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<label class="xui-form-label xui-form-label--<?php echo $key; ?>"><?php echo $key; ?></label><br>
<div class="xui-form-text-icon-right xui-form-text-icon-right--<?php echo $key; ?>">
<input type="text" value="" <?php echo $disabled; ?>></input>
<i class="material-icons">person</i>
</div>
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
