<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$thumbSize = $this->getArgument("thumbnail-size",array(320,240));
$collapse = $this->getArgument("collapse",false);

$collapseClass="collapse";
$collapseClassA="collapsed";
if($collapse==="in"){
	$collapseClass="collapse in";
	$collapseClassA="";
};

$this->setHtmlFooterJsSource("\$(function(){\$(\"#".$this->getElementId($element)."\").fileinput({showUpload: false});});");

$hasFile=false;
$fileName=$this->getElementValue($element);
if(strlen($fileName)){
	$hasFile=true;
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


if(!$collapse){
?>
<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <div class="xyo-form-file-image-thumbnail-delete">
	<span class="xyo-form-file-image-thumbnail-delete-sub" onclick="javascript:$('#<?php $this->eElementId($element); ?>_delete').val(1);$('#<?php $this->eElementId($element); ?>_image').html('<?php echo $fileNameNone; ?>');return false;"><i class="glyphicon glyphicon-remove"></i></span>
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
<?php } else { ?>
	<div class="panel panel-default pull-left" style="width: 32em;" id="<?php $this->eElementId($element); ?>_collapse_parent">
		<div class="panel-heading">
			<?php $this->eLanguage("label_" . $element); ?>
			<a data-toggle="collapse" data-parent="#<?php $this->eElementId($element); ?>_collapse_parent" href="#<?php $this->eElementId($element); ?>_collapse" class="xyo-form-file-image-thumbnail-toggle <?php echo $collapseClassA; ?> pull-right">
				<i class="glyphicon glyphicon-chevron-left"></i>
				<i class="glyphicon glyphicon-chevron-down"></i>
			</a>
			<?php if($hasFile){ ?>
			<a href="<?php echo $this->getElementValue($element); ?>" target="blank_" class="xyo-form-file-image-thumbnail-link-on pull-right"><i class="glyphicon glyphicon-picture"></i></a>
			<?php }else{ ?>
			<span class="xyo-form-file-image-thumbnail-link-off pull-right"><i class="glyphicon glyphicon-picture"></i></span>
			<?php }; ?>
		</div>
		<div class="panel-body <?php echo $collapseClass ?>" id="<?php $this->eElementId($element); ?>_collapse">

<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <?php if($this->isElementError($element)){echo $this->eElementError($element);}; ?>
    <div class="xyo-form-file-image-thumbnail-delete">
	<span class="xyo-form-file-image-thumbnail-delete-sub" onclick="javascript:$('#<?php $this->eElementId($element); ?>_delete').val(1);$('#<?php $this->eElementId($element); ?>_image').html('<?php echo $fileNameNone; ?>');return false;"><i class="glyphicon glyphicon-remove"></i></span>
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

		</div>
	</div>
<?php } ?>

