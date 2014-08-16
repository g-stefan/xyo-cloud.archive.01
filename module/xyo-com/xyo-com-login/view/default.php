<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$language = $this->getSystemLanguage();
$languageList = array();
$languageList["*"] = $this->getFromLanguage("lang_default");
$dsLanguage = &$this->getDataSource("db.table.xyo_language");
if ($dsLanguage) {
    $dsLanguage->enabled = 1;
    $dsLanguage->setOrder("name", 1);
    for ($dsLanguage->load(); $dsLanguage->isValid(); $dsLanguage->loadNext()) {
        $languageList[$dsLanguage->name] = $dsLanguage->description;
    }
}
$rnd=$this->getElementValueStr("rnd","");
if(strlen($rnd)>=strlen(md5("x"))){
}else{
	$rnd=md5("" . rand());
	$this->setElementValue("rnd",$rnd);
};

$parameters=array("user_authorization"=>"true");

$sysCaptcha=$this->cloud->get("system_user_captcha", false);

$useCaptcha=false;
if($sysCaptcha){
	if ($this->isError("error")) {
		$useCaptcha=true;
		$_SESSION["user_captcha_force"]=1;
	}else{
		if(array_key_exists("user_captcha_force",$_SESSION)){
			$useCaptcha=true;
		}else{
			$captcha=md5("" . rand());	
			$_SESSION["user_captcha_rnd"]=$rnd;
			$_SESSION["user_captcha_key"]=md5($rnd.md5($captcha));
			$parameters=array_merge($parameters,array("user_captcha"=>$captcha));
		};
	};
};

if ($this->isError("error")) {
    $msg_lang = $this->getError("error", "error_unknown");
};

?>

		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-2"></div>
					<div class="col-lg-6 col-md-6 col-sm-8">

                <form name="<?php $this->eFormName(); ?>"
                      method="POST"
                      action="<?php $this->eFormAction(); ?>"
                      OnSubmit="javascript:return (xyoFormLoginAction(this));" >
	
	<div class="panel <?php if ($this->isError("error")) { echo "panel-danger"; }else{ echo "panel-default"; }; ?>">

		<div class="panel-heading">
	            <img src="media/sys/images/computer-login-48.png" style="width:48px;height:48px;border: 0px;vertical-align: middle;"></img>
        	    <span style="font-size:22px;font-weight:bold;vertical-align: middle;"><?php $this->eLanguage("txt_login"); ?><?php if($this->isError("error")){echo " - "; $this->eLanguage($msg_lang); }; ?></span>
		</div>
		<div class="panel-body">




<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("username")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("username"); ?>"><?php $this->eLanguage("label_username"); ?><?php if($this->isElementError("username")){echo " - "; $this->eElementError("username");}; ?></label>
    <input type="text" class="form-control" placeholder="Username"
       name="<?php $this->eElementName("username"); ?>"
       value="<?php $this->eElementValue("username", ""); ?>"
       id="<?php $this->eElementId("username"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-user" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("password")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("password"); ?>"><?php $this->eLanguage("label_password"); ?><?php if($this->isElementError("password")){echo " - "; $this->eElementError("password");}; ?></label>
    <input type="password" class="form-control" placeholder="Password"
       name="<?php $this->eElementName("password"); ?>"
       value="<?php $this->eElementValue("password", ""); ?>"
       id="<?php $this->eElementId("password"); ?>" />
    <i class="form-control-feedback glyphicon glyphicon-lock" style="color:#ccc;"></i>
</div>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError("language")){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId("language"); ?>"><?php $this->eLanguage("label_language"); ?><?php if($this->isElementError("language")){echo " - "; $this->eElementError("language");}; ?></label>
    <br />
                                        <select class="selectpicker" data-width="auto" name="<?php $this->eElementName("language"); ?>"
                                                id="<?php $this->eElementId("language"); ?>"
                                                onChange="if(xyoFormLoginAction(this.form)){this.form.submit();};">
<?php
                                                    foreach ($languageList as $key => $value) {
                                                        $selected = "";
                                                        if ($key === $language) {
                                                            $selected = "selected=\"selected\" ";
                                                        }
                                                        echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";
                                                    }
?>
                                        </select>
</div>


<?php 							
							if($useCaptcha){
								$this->generateElement("captcha","captcha",array("prefix"=>"user","rnd"=>$rnd));
							};

?>

		</div>
		<div class="panel-footer">
                    <input type="submit" class="btn btn-primary pull-right" name="<?php $this->eElementName("login"); ?>" value="<?php $this->eLanguage("cmd_login"); ?>" />	
		    <div class="clearfix" />
	        </div>

	</div>

                   	<input type="hidden"
                               name="<?php $this->eElementName("rnd"); ?>"
                               value="<?php $this->eElementValue("rnd"); ?>" />
<?php
                      $this->eFormRequest($parameters);

?>                                     
                </form>

        				</div>
				<div class="col-lg-3 col-md-3 col-sm-2"></div>
			</div>	
		</div>
