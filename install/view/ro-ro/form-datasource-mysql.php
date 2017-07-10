<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("server")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("server"); ?>">Server<?php if($this->isElementError("server")){echo " - "; $this->eElementError("server");}; ?></label>
    <input type="text" class="form-control" placeholder="Server"                                                                                                          
       name="<?php $this->eElementName("server"); ?>"
       value="<?php $this->eElementValue("server", "localhost"); ?>"
       id="<?php $this->eElementId("server"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-tower" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("port")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("port"); ?>">Port<?php if($this->isElementError("port")){echo " - "; $this->eElementError("port");}; ?></label>
    <input type="text" class="form-control" placeholder="Port"
       name="<?php $this->eElementName("port"); ?>"
       value="<?php $this->eElementValue("port", "3306"); ?>"
       id="<?php $this->eElementId("port"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-transfer" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("username")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("username"); ?>">Nume utilizator<?php if($this->isElementError("username")){echo " - "; $this->eElementError("username");}; ?></label>
    <input type="text" class="form-control" placeholder="Nume utilizator"
       name="<?php $this->eElementName("username"); ?>"
       value="<?php $this->eElementValue("username", ""); ?>"
       id="<?php $this->eElementId("username"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-user" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("password")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("password"); ?>">Parola<?php if($this->isElementError("password")){echo " - "; $this->eElementError("password");}; ?></label>
    <input type="password" class="form-control" placeholder="Parola"
       name="<?php $this->eElementName("password"); ?>"
       value="<?php $this->eElementValue("password", ""); ?>"
       id="<?php $this->eElementId("password"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-lock" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("database")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("database"); ?>">Nume baza de date<?php if($this->isElementError("database")){echo " - "; $this->eElementError("database");}; ?></label>
    <input type="text" class="form-control" placeholder="Nume baza de date"
       name="<?php $this->eElementName("database"); ?>"
       value="<?php $this->eElementValue("database", ""); ?>"
       id="<?php $this->eElementId("database"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-hdd" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("prefix")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("prefix"); ?>">Prefix tabel<?php if($this->isElementError("prefix")){echo " - "; $this->eElementError("prefix");}; ?></label>
    <input type="text" class="form-control" placeholder="Prefix tabel"
       name="<?php $this->eElementName("prefix"); ?>"
       value="<?php $this->eElementValue("prefix", ""); ?>"
       id="<?php $this->eElementId("prefix"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-paperclip" style="color:#ccc;"></i>
</div>
<div class="alert alert-info" role="alert">
Nota: Baza de date trebuie sa existe pe server inainte de instalare.
</div>
