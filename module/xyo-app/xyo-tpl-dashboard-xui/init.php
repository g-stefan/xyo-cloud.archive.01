<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
//
// this code will push request to force login
//
if($this->user->isAuthorized()){
		if($this->isApplication("xyo-app-logout")){
			$this->setViewTemplate("login");
		};
}else{
		$request=$this->getRequestDirect();
		$module=$this->moduleFromRequest($request);
		if($module=="xyo-app-login"
			||$module=="xyo-app-logout"){
		}else{
			$this->setRequestDirect($this->callRequest($this->requestModuleDirect($module),$request));
		};
		$this->setApplication("xyo-app-login");
		$this->setViewTemplate("login");
};

