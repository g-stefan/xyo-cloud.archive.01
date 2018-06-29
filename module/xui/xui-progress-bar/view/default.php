<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>

<div style="padding:32px;">

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<div class="xui-progress-bar xui-progress-bar_<?php echo $key; ?>">
	<div class="xui-progress-bar__background"></div>
	<div class="xui-progress-bar__bar"></div>
	<div class="xui-progress-bar__label">50%</div>
</div>
<br />
<?php }; ?>

</div>
