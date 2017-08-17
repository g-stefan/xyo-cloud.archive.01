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
<hr>
<?php foreach($xuiPalette->colorTypeButton as $key=>$value){ ?>
<div class="xui-toolbar__item xui-toolbar__item--<?php echo $key; ?> xui--effect-ripple">
	<div class="xui-toolbar__icon">
		<i class="material-icons">extension</i>	
	</div>
	<div class="xui-toolbar__text">
		<?php echo $key; ?>	
	</div>
</div>
<br><br>
<?php }; ?>
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