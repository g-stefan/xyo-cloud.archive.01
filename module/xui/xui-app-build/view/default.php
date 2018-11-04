<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->buildInit();

?>

<form action="<?php $this->eFormAction(); ?>" method="POST">
	<input type="submit" name="action" value="build"></input>
</form>
<hr />

<?php

foreach($this->buildUI_ as $module){
	echo "<a href=\"".$this->requestUriModule($module)."\" target=\"_blank\">".$module."</a><br />";
};

?>

