<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className="xyo_com_Logout";

class xyo_com_Logout extends xyo_Module{
        function __construct(&$object,&$cloud){
                parent::__construct($object,$cloud);
                $user=&$this->cloud->getModule("xyo-mod-ds-user");
                if($user){
                    $user->makeResetCookie();
                    $user->doLogout();
                }
                if($this->isComponent($this->name)){
                    $this->moduleDisable();
                    $this->clearRequest();
		    $this->redirectComponent("xyo-com-login");
                    return;
                }
        }
}
