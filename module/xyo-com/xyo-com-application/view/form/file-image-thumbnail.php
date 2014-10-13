<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getParameter("element");
$thumbSize = $this->getParameter("thumbnail-size",array(320,240));

$this->setHtmlFooterJsSource("\$(function(){\$(\"#".$this->getElementId($element)."\").fileinput({showUpload: false});});");

$fileName=$this->getElementValue($element);
if(strlen($fileName)){
	$modThumbnail=&$this->getModule("xyo-mod-thumbnail");
	if($modThumbnail){
		$fileThumb=$modThumbnail->makeThumbnail(dirname($fileName)."/",$fileName,$thumbSize[0],$thumbSize[1]);
		if(strlen($fileThumb)){
			$fileThumb=dirname($fileName)."/".$fileThumb;
			$fileName="<a href=\"".$fileName."\" target=\"_blank\"><img src=\"".$fileThumb."\"></img></a>";
		};
	};
};

if(strlen($fileName)==0){
	$fileName="<i class=\"glyphicon glyphicon-picture\" style=\"color:#ddd;width:".$thumbSize[0]."px;font-size:".((int)$thumbSize[0]/2)."px;line-height:".(((int)$thumbSize[0]/2)+18)."px;\"></i>";
};

$fileNameNone="<i class=\\'glyphicon glyphicon-picture\\' style=\\'color:#ddd;width:".$thumbSize[0]."px;font-size:".((int)$thumbSize[0]/2)."px;line-height:".(((int)$thumbSize[0]/2)+18)."px;\\'></i>";

?>
<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <div class="xyo-file-image-thumbnail-delete">
	<span class="xyo-file-image-thumbnail-delete-sub" onclick="javascript:$('#<?php $this->eElementId($element); ?>_delete').val(1);$('#<?php $this->eElementId($element); ?>_image').html('<?php echo $fileNameNone; ?>');return false;"><i class="glyphicon glyphicon-remove"></i></span>
    </div>
    <div class="thumbnail text-center" id="<?php $this->eElementId($element); ?>_image">
	<?php echo $fileName; ?>
    </div>
    <input type="file" class="form-control"
       name="<?php $this->eElementName($element); ?>"
       value=""
       id="<?php $this->eElementId($element); ?>" ></input>
    <input type="hidden"
       name="<?php $this->eElementName($element); ?>_delete"
       value="0"
       id="<?php $this->eElementId($element); ?>_delete" ></input>
    <input type="hidden"
       name="<?php $this->eElementName($element); ?>_file"
       value="<?php $this->eElementValue($element); ?>" ></input>
</div>
