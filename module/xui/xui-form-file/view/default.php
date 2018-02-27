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
$xuiTheme=&$this->getModule("xui-theme");

?>

<br>
<br>
<form style="padding:30px;">
<hr>
<br>
<br>
<br>

<div class="xui-form-file">
<input type="file" name="x-file" id="x-file" class="xui-form-file__file"></input>
<label for="x-file" ><i class="material-icons">file_upload</i> Browse ...</label><!--
--><button type="button" class="xui-form-button-icon xui-form-button-icon_info" onclick="document.getElementById('x-file').value=null;$('#x-file').trigger('change');"><i class="material-icons">delete</i></button>
</div>

<br>
<br>
<br>
<br>
<br>
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
