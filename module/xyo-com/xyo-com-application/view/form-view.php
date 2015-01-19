<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
if($this->isNew){
	$this->setParameter("form_title","form_title_new");
}else{
	$this->setParameter("form_title","form_title_edit");
};

?>
<?php $this->ejsBegin(); ?>
    function doCommand(action){
        document.forms.<?php $this->eFormName(); ?>.elements.action.value=action;
        document.forms.<?php $this->eFormName(); ?>.submit();
        return false;
    }
<?php $this->ejsEnd(); 

$this->generateElement("form-begin");
$this->generateView("form");
$this->generateElement("form-end",null,array(
	"parameters"=>array(
		"action"=>"default",
		$this->getElementName("primary_key_value") => $this->getElementValue("primary_key_value", "")
	)
));
$this->generateView("form-call");
