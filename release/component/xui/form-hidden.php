<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$element = $this->getArgument("element");
?>
<input type="hidden" name="<?php $this->eElementName($element); ?>" value="<?php $this->eElementValue($element); ?>" id="<?php $this->eElementId($element); ?>" ></input>
