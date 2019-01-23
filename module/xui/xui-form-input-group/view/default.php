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
	Form - Input Group
</div>
<form>
	<div class="xui form-input-group">
		<input type="text" name="search" value=""></input>
		<button type="button" name="search-button-search"><i class="material-icons">search</i></button>
		<button type="button" name="search-button-reset"><i class="material-icons">close</i></button>
	</div>		
</form>

<div class="xui separator"></div>
<br />

<form>
	<div class="xui form-input-group">
		<input type="text" name="search" value=""></input>
		<button type="button" name="search-button-search"><i class="material-icons">search</i></button>
	</div>		
</form>

<div class="xui separator"></div>
<br />

<form>
	<div class="xui form-input-group">
		<button type="button" name="seek-button-first"><i class="material-icons">first_page</i></button>
		<button type="button" name="seek-button-previous"><i class="material-icons">chevron_left</i></button>
		<input type="text" name="seek" value=""></input>
		<button type="button" name="seek-button-next"><i class="material-icons">chevron_right</i></button>
		<button type="button" name="seek-button-last"><i class="material-icons">last_page</i></button>
	</div>
</form>

<div class="xui separator"></div>
<br />

<form>
	<div class="xui form-input-group">
		<button type="button" name="seek-button-first"><i class="material-icons">first_page</i></button>
		<input type="text" name="seek" value=""></input>
		<button type="button" name="seek-button-last"><i class="material-icons">last_page</i></button>
	</div>
</form>
	