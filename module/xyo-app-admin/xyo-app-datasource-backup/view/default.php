<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
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

<div style="width:32em;margin-left: auto;margin-right:auto;">
	<div class="panel panel-default">
		<div class="panel-heading"><?php $this->eLanguage($formTitle); ?></div>
		<div class="panel-body">

                <form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >

			
						<label class="control-label" for="<?php $this->eElementId("connection"); ?>">
							<?php $this->eLanguage("select_connection"); ?>
					    	</label><br />
						<?php $this->generateView("form-select-connection"); ?>
						<br />
						<label class="control-label" for="<?php $this->eElementId("layer"); ?>">
							<?php $this->eLanguage("backup_to"); ?>
						</label><br />
						<?php $this->generateView("form-select-layer"); ?>
						<br />
			                        <?php $this->generateViewLanguage("form-datasource-" . $layer); ?>

                    <input type="hidden" name="action" value="default" />
					<input type="hidden" name="<?php $this->eElementName("id"); ?>" value="<?php echo $this->eElementValue("id", 0); ?>" />
					<?php $this->eFormRequest(); ?>
                </form>

		</div>
	</div>
</div>

<?php $this->generateView("view-return"); ?>
