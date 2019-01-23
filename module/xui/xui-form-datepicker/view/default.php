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
	Form - Datepicker - Date
</div>
<form>
	<input type="text" class="xui form-text" id="datepicker-1" name="datepicker-1" value="" data-language="en"></input>
</form>

<div class="xui text -label-40">
	Form - Datepicker - Datetime
</div>
<form>
	<input type="text" class="xui form-text" id="datepicker-2" name="datepicker-2" value="" data-timepicker="true" data-language="en"></input>
</form>

<div class="xui text -label-40">
	Form - Datepicker - Time
</div>
<form>
	<input type="text" class="xui form-text" id="datepicker-3" name="datepicker-3" value="" data-timepicker="true" data-time-format="hh:ii" data-language="en"></input>
</form>

<?php

$js="\$(\"#datepicker-1\").datepicker({autoClose:true});";
$js.="\$(\"#datepicker-2\").datepicker({autoClose:true});";
$js.="\$(\"#datepicker-3\").datepicker({autoClose:true,onlyTimepicker:true});";

$this->setHtmlJsSourceOrAjax($js,"load");
