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
<form style="padding:30px;">
<br>
<br>

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>

<div class="xui-form-textarea-material xui-form-textarea-material_<?php echo $key; ?>">
	<label for="textarea-material-<?php echo $key; ?>"><?php echo $key; ?></label>
	<textarea id="textarea-material-<?php echo $key; ?>" <?php echo $disabled; ?>></textarea>
	<div class="xui-form-textarea-material__border"></div>
</div>

<br>

<?php }; ?>


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
