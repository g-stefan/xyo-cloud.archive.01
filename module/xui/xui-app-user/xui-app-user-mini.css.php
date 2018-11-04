<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

<?php $this->setDefaultSelector(".-mini"); ?>

<?php $this->eSuperSelector(); ?>.xui.app-user<?php $this->eSelector(); ?> {
	width: 72px;
	height: 48px;
}

<?php $this->eSuperSelector(); ?>.xui.app-user<?php $this->eSelector(); ?> > .xui.app-user_content > .xui.app-user_background{	
	opacity: 1;	
}

<?php $this->eSuperSelector(); ?>.xui.app-user<?php $this->eSelector(); ?> > .xui.app-user_content > .xui.app-user_image{
	top: 2px;
	left: 12px; 
	width: 44px;
	height: 44px;
}

</style>