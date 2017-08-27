<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$formTitle="form_title_select";
$layer=$this->getElementValueStr("layer","xyo");


?>
<script>
    function doCommand(action){
        var el;
        var id;

        document.forms.<?php $this->eFormName(); ?>.elements.action.value=action;
        document.forms.<?php $this->eFormName(); ?>.submit();
        return false;
    }
</script>

<?php
$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.panel-begin",array("title-text"=>$this->getFromLanguage($formTitle)));

?>
                <form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >

			
						<label class="xui-form-label" for="<?php $this->eElementId("connection"); ?>">
							<?php $this->eLanguage("select_connection"); ?>
					    	</label><br />
						<?php $this->generateView("form-select-connection"); ?>
						<br />
						<label class="xui-form-label" for="<?php $this->eElementId("layer"); ?>">
							<?php $this->eLanguage("backup_to"); ?>
						</label><br />
						<?php $this->generateView("form-select-layer"); ?>
						<br />
			                        <?php $this->generateViewLanguage("form-datasource-" . $layer); ?>

                    <input type="hidden" name="action" value="default" />
					<input type="hidden" name="<?php $this->eElementName("id"); ?>" value="<?php echo $this->eElementValue("id", 0); ?>" />
					<?php $this->eFormRequest(); ?>
                </form>

<?php 

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x1-end");

$this->generateView("view-return");
