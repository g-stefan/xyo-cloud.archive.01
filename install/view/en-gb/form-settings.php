<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("website_title")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("website_title"); ?>">Website title<?php if($this->isElementError("website_title")){echo " - "; $this->eElementError("website_title");}; ?></label>
    <input type="text" class="form-control" placeholder="Website title"                                                                                                          
       name="<?php $this->eElementName("website_title"); ?>"
       value="<?php $this->eElementValue("website_title", ""); ?>"
       id="<?php $this->eElementId("website_title"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-tower" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("username")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("username"); ?>">Username<?php if($this->isElementError("username")){echo " - "; $this->eElementError("username");}; ?></label>
    <input type="text" class="form-control" placeholder="Username"
       name="<?php $this->eElementName("username"); ?>"
       value="<?php $this->eElementValue("username", ""); ?>"
       id="<?php $this->eElementId("username"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-user" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("password")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("password"); ?>">Password<?php if($this->isElementError("password")){echo " - "; $this->eElementError("password");}; ?></label>
    <input type="password" class="form-control" placeholder="Password"
       name="<?php $this->eElementName("password"); ?>"
       value="<?php $this->eElementValue("password", ""); ?>"
       id="<?php $this->eElementId("password"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-lock" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("retype_password")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("retype_password"); ?>">Retype password<?php if($this->isElementError("retype_password")){echo " - "; $this->eElementError("retype_password");}; ?></label>
    <input type="password" class="form-control" placeholder="Retype password"
       name="<?php $this->eElementName("retype_password"); ?>"
       value="<?php $this->eElementValue("retype_password", ""); ?>"
       id="<?php $this->eElementId("retype_password"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-lock" style="color:#ccc;"></i>
</div>

