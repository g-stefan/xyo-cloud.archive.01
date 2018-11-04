<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Form - File Image
</div>

<div class="xui box -row">
<div class="xui box -x1x1">

<form>
	<div class="xui form-file-image" id="form-file-image-component">
		<div class="xui form-file-image_image">
			<div class="cropit-preview"></div>
				<div style="height:48px;position: relative;">
				<i class="material-icons" style="font-size:24px;line-height: 48px;vertical-align: middle;">photo</i>
				<input type="range" class="cropit-image-zoom-input"></input>
				<i class="material-icons" style="font-size:48px;line-height: 48px;vertical-align: middle;">photo</i>
			</div>
			<div class="xui separator"></div>
		</div>
		<a href="#" onclick="return false;" class="xui form-file-image_link form-button -icon -success"><i class="material-icons">photo</i></a>
		<button type="button" class="xui form-file-image_delete form-button -icon -danger" onclick="return false;"><i class="material-icons">close</i></button>
		<div class="xui form-file">
			<input type="file" name="file-image" id="file-image" class="xui form-file_file cropit-image-input" accept="image/*"></input>
			<label for="file-image"><i class="material-icons">file_upload</i><span>Browse ...</span></label>
			<button type="button" class="xui form-button -icon -info" onclick="return false;"><i class="material-icons">delete</i></button>
		</div>
	</div>
</form>

</div>	
</div>

<?php

$src="$(\"#form-file-image-component\").cropit({ imageBackground: true, allowDragNDrop: false, imageBackgroundBorderWidth: 16 });";
$this->setHtmlJsSourceOrAjax($src,"load");
	