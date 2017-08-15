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
<form>
<hr>
<br>
<br>
<br>

<div class="xui-form-file">
<input type="file" name="x-file" id="x-file" class="xui-form-file__file"></input>
<label for="x-file" class="xui--elevation-2"><i class="material-icons">file_upload</i> Browse ...</label><!--
--><button type="button" class="xui-form-button-icon xui-form-button-icon--info xui--elevation-2" onclick="document.getElementById('x-file').value=null;$('#x-file').trigger('change');"><i class="material-icons">delete</i></button>
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
