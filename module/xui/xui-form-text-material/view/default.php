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
<form style="padding-left:30px;">


<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>

<div class="xui-form-text-material xui-form-text-material_<?php echo $key; ?>">
	<label for="text-material-<?php echo $key; ?>"><?php echo $key; ?></label>
	<input id="text-material-<?php echo $key; ?>" type="text" value="" <?php echo $disabled; ?>></input>
	<div class="xui-form-text-material__border"></div>
</div>

<br>

<?php }; ?>

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
