<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Menu - Accordion
</div>	
<div class="xui menu -accordion">
	<?php $this->generateView("xui-menu-content"); ?>
</div>
<div class="xui text -label-40">
	Menu - Dropdown
</div>	
<div class="xui menu -dropdown">
	<?php $this->generateView("xui-menu-content"); ?>
</div>
<div class="xui text -label-40">
	Menu - Mini
</div>	
<div class="xui menu -mini">
	<?php $this->generateView("xui-menu-content"); ?>
</div>
<div class="xui text -label-40">
	Menu - Popup
</div>	
<div class="xui menu -popup">
	<?php $this->generateView("xui-menu-content-popup"); ?>
</div>
<br />	
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />