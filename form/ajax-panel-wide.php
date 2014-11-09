<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$collapse = $this->getArgument("collapse",false);
$buttons= $this->getArgument("buttons",array());

$collapseClass="collapse";
$collapseClassA="collapsed";
if($collapse==="in"){
	$collapseClass="collapse in";
	$collapseClassA="";
};

$parameters=array_merge($this->getArgument("parameters",array()),array("ajax"=>1));
$jsFunctionName=$this->getArgument("js_function_name");
$url=$this->getArgument("url");

$parametersStr="{";
$first=true;
foreach($parameters as $key=>$value){
	if($first){
		$first=false;
	}else{
		$parametersStr.=",";
	};
	$parametersStr.=$key.":\"".$value."\"";	
};
$parametersStr.="}";

$this->setHtmlFooterJsSource(
	"\r\n".
	"function ".$jsFunctionName."(){".
		"$.post(\"".$url."\", ".$parametersStr." )".
  		".done(function(result){".
			"$(\"#".$this->getElementId($element)."_collapse\").html(result);".
		"});".
	"};".
	"\r\n"
);
                                                  
?>
	<div class="panel panel-default xyo-form-ajax-panel-wide" id="<?php $this->eElementId($element); ?>_collapse_parent">
		<div class="panel-heading">
			<?php $this->eLanguage("label_" . $element); ?>
			<a data-toggle="collapse" data-parent="#<?php $this->eElementId($element); ?>_collapse_parent" href="#<?php $this->eElementId($element); ?>_collapse" class="xyo-form-ajax-panel-wide-toggle <?php echo $collapseClassA; ?> pull-right">
				<i class="glyphicon glyphicon-chevron-left"></i>
				<i class="glyphicon glyphicon-chevron-down"></i>
			</a>
			<?php 
				foreach($buttons as $key=>$value){
					$img = $value["img"];
					if ($img) {
						if(strncmp($img,"#",1)==0){
							// icon
					        	$img = substr($img,1);
							$img = "<i class=\"".$img."\"></i>";
						}else{
							$img = "<img src=\"".$img."\"></img>";
						};
					} else {
						$img = "#";
					};
					echo "<a href=\"#\" onclick=\"javascript:".$value["js"]."\" class=\"pull-right xyo-form-ajax-panel-wide-icon\">".$img."</a>";
				};				

			?>
		</div>
		<div class="panel-body <?php echo $collapseClass ?>" id="<?php $this->eElementId($element); ?>_collapse">
		<?php $this->generateView($this->getArgument("view"),$parameters); ?>
		</div>
	</div>
