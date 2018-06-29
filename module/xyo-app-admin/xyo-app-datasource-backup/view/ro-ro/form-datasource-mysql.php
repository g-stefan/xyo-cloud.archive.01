<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setElementDefaultValue("server","localhost");
$this->setElementDefaultValue("port","3306");

$this->generateComponent("xui.form-text-icon-left",array("element"=>"server","icon"=>"<i class=\"material-icons\">dns</i>"));
$this->generateComponent("xui.form-text-icon-left",array("element"=>"port","icon"=>"<i class=\"material-icons\">swap_horiz</i>"));
$this->generateComponent("xui.form-username",array("element"=>"username"));
$this->generateComponent("xui.form-password",array("element"=>"password"));
$this->generateComponent("xui.form-text-icon-left",array("element"=>"database","icon"=>"<i class=\"material-icons\">storage</i>"));
$this->generateComponent("xui.form-text-icon-left",array("element"=>"prefix","icon"=>"<i class=\"material-icons\">device_hub</i>"));


?>
<div class="xui-alert xui-alert_info">
Nota: Baza de date trebuie sa existe pe server inainte de instalare.
</div>
