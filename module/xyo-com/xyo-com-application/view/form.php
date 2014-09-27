<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->isNew){
	$this->setParameter("title","form_title_new");
	$formView="form-new";
}else{
	$this->setParameter("title","form_title_edit");
	$formView="form-edit";
};

?>
<?php $this->ejsBegin(); ?>
    function doCommand(action){
        var el;
        var id;

        document.forms.<?php $this->eFormName(); ?>.elements.action.value=action;
        document.forms.<?php $this->eFormName(); ?>.submit();
        return false;
    }
<?php $this->ejsEnd(); ?>
<form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" enctype="multipart/form-data">
	<?php $this->generateView($formView); ?>                    
        <input type="hidden" name="action" value="default" />
	<input type="hidden" name="<?php $this->eElementName("id"); ?>" value="<?php echo $this->eElementValue("id", 0); ?>" />
	<?php $this->eFormRequest(); ?>
</form>
