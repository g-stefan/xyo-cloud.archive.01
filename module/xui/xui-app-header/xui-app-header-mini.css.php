<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

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

<?php $this->eSuperSelector(); ?>.xui.app-header<?php $this->eSelector(); ?> > .xui.app-brand{
	width: 72px;
}

<?php $this->eSuperSelector(); ?>.xui.app-header<?php $this->eSelector(); ?> > .xui.app-brand > .xui.app-brand_content > .xui.app-brand_name{
	opacity: 0;
}

<?php $this->eSuperSelector(); ?>.xui.app-header<?php $this->eSelector(); ?> > .xui.app-brand > .xui.app-brand_content > .xui.app-brand_mark{
	opacity: 0;
}

<?php $this->eSuperSelector(); ?>.xui.app-header<?php $this->eSelector(); ?> > .xui.app-bar{
	width: calc(100% - 72px);
}

</style>