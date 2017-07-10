<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$maxlength= 1*$this->getArgument("maxlength");

if($maxlength==0){
	$maxlength="";
}else{
	$maxlength=" maxlength=\"".$maxlength."\"";
};

$width= 1*$this->getArgument("width");

if($width==0){
	$width="";
}else{
	$width="width:".$maxlength.";";
};

$this->setHtmlJsSource("\$(\"#".($this->getElementId($element))."\").".
"typeahead({\r\n".
"	highlight: true\r\n".
"},{\r\n".
"	name: \"value\",\r\n".
"	displayKey: \"value\",\r\n".
"	source: ((function(){\r\n".
"		var engine = new Bloodhound({\r\n".
"			name: \"value\",\r\n".
"			local: [],\r\n".
"			remote: \"".$this->requestUriThis(array("action"=>"typeahead","name"=>$element,"json"=>1))."&query=%QUERY\",\r\n".
"			datumTokenizer: Bloodhound.tokenizers.obj.whitespace(\"value\"),\r\n".
"			queryTokenizer: Bloodhound.tokenizers.whitespace\r\n".
"		});\r\n".
"		engine.initialize();\r\n".
"		return engine;\r\n".	
"	})()).ttAdapter()\r\n".
"});","load");

//
// json result must be
// [{"value":"resut1"},{"value":"resut2"},...]
//
//

?>
<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <br />
    <input type="text"<?php echo $maxlength; ?> class="form-control" style="<?php echo $width; ?>"
       name="<?php $this->eElementName($element); ?>"
       value="<?php $this->eElementValue($element, ""); ?>"
       id="<?php $this->eElementId($element); ?>" ></input>
</div>
