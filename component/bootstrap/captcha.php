<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$params=array();
$element = $this->getArgument("element");
$path =$this->cloud->getModulePath("xyo-mod-form-captcha");
$rnd = $this->getArgument("rnd","");
if($rnd){
	$params=array_merge($params,array("rnd"=>$rnd));
};
$prefix = $this->getArgument("prefix","");
if($prefix){
	$params=array_merge($params,array("prefix"=>$prefix));
};
$params=array_merge($params,array("action"=>"image"));

?>
<label for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<img class="thumbnail" id="<?php $this->eElementId($element); ?>_image" src="<?php echo $this->requestUriModule("xyo-mod-form-captcha",array_merge($params,array("stamp"=>md5(time().rand())))); ?>" style="width:200px;height:50px;"></img>
<div class="input-group <?php if($this->isElementError($element)){echo " has-error";}; ?>">                                                                                                                                                                                   
<input class="form-control" type="text" maxlength="256"
       name="<?php $this->eElementName($element); ?>"
       value=""		
       id="<?php $this->eElementId($element); ?>"></input>
<span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="javascrip:<?php $this->eElementId($element); ?>_refresh();"><i class="glyphicon glyphicon-refresh"></i></button>
</span>
</div>

<?php $this->ejsBegin(); ?>
function <?php $this->eElementId($element); ?>_refresh(){
	var el=document.getElementById("<?php $this->eElementId($element); ?>_image");
	if(el){
		el.src="<?php echo $this->requestUriModule("xyo-mod-form-captcha",$params);?>&stamp="+Math.random();
	};
	return false;
};
<?php $this->ejsEnd(); ?>