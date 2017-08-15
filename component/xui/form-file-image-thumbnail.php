<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$thumbSize = $this->getArgument("thumbnail-size",array(320,240));

$hasFile=false;
$fileName=$this->getElementValue($element);
if(strlen($fileName)){
	$hasFile=true;
	$modThumbnail=&$this->getModule("xyo-mod-thumbnail");
	if($modThumbnail){
		$fileThumb=$modThumbnail->makeThumbnail(dirname($fileName)."/",$fileName,$thumbSize[0],$thumbSize[1]);
		if(strlen($fileThumb)){
			$fileThumb=$this->site.dirname($fileName)."/".$fileThumb;
			$fileName="<a href=\"".$this->site.$fileName."\" target=\"_blank\"><img src=\"".$fileThumb."\"></img></a>";
		};
	};
};

if(strlen($fileName)==0){
	$fileName="<i class=\"material-icons\" style=\"color:#C0C0C0;width:".$thumbSize[0]."px;font-size:".((int)$thumbSize[0]/2)."px;line-height:".(((int)$thumbSize[0]/2)+18)."px;margin-top:".(($thumbSize[1]-(((int)$thumbSize[0]/2)+18))/2)."px;\">image</i>";
};

$fileNameNone="<i class=\\'material-icons\\' style=\\'color:#C0C0C0;width:".$thumbSize[0]."px;font-size:".((int)$thumbSize[0]/2)."px;line-height:".(((int)$thumbSize[0]/2)+18)."px;margin-top:".(($thumbSize[1]-(((int)$thumbSize[0]/2)+18))/2)."px;\\'>image</i>";

$src="\$(\"#".$this->getElementId($element)."\").on(\"change\",function(e){";
$src.="if(e.target.value){";
$src.="var el = document.createElement(\"div\");";
$src.="el.innerHTML = \"\";";
$src.="el.style.pointerEvents = \"none\";";
$src.="el.style.width = \"".$thumbSize[0]."px\";";
$src.="el.style.height = \"".$thumbSize[1]."px\";";
$src.="el.style.marginLeft = \"auto\";";
$src.="el.style.marginRight = \"auto\";";
$src.="el.style.backgroundSize = \"contain\";";
$src.="el.style.backgroundRepeat = \"no-repeat\";";
$src.="el.style.backgroundPosition = \"center\";";
$src.="el.style.backgroundImage = \"url(\"+window.URL.createObjectURL(e.target.files[0])+\")\";";
$src.="\$(\"#".$this->getElementId($element)."_image\").html(\"\");";
$src.="document.getElementById(\"".$this->getElementId($element)."_image\").appendChild(el);";
$src.="};});";

$this->setHtmlJsSource($src,"load");

?>


<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label--danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<div class="xui-form-file-image-thumbnail" style="width:100%;">
<div class="xui-form-file-image-thumbnail__image" id="<?php $this->eElementId($element); ?>_image" style="width:100%;height:<?php echo $thumbSize[1]+6; ?>px">
	<?php echo $fileName; ?>
</div>
<button type="button" class="xui-form-file-image-thumbnail__delete xui-form-button-icon xui-form-button-icon--danger xui--elevation-2" onclick="$('#<?php $this->eElementId($element); ?>_delete').val(1);$('#<?php $this->eElementId($element); ?>_image').html('<?php echo $fileNameNone; ?>');return false;"><i class="material-icons">close</i></button>
<div class="xui-form-file xui--elevation-2">
<input type="file" name="<?php $this->eElementName($element); ?>" id="<?php $this->eElementId($element); ?>" class="xui-form-file__file" accept="image/*"></input>
<label for="<?php $this->eElementId($element); ?>"><i class="material-icons">file_upload</i> Browse ...</label><!--
--><button type="button" class="xui-form-button-icon xui-form-button-icon--info" onclick="document.getElementById('<?php $this->eElementId($element); ?>').value=null;$('#<?php $this->eElementId($element); ?>').trigger('change');"><i class="material-icons">delete</i></button>
</div>
</div>
<input type="hidden"
	name="<?php $this->eElementName($element); ?>_delete"
	value="0"
	id="<?php $this->eElementId($element); ?>_delete" ></input>
<input type="hidden"
	name="<?php $this->eElementName($element); ?>_file"
	value="<?php $this->eElementValue($element); ?>" ></input>
<div class="xui-separator"></div>
