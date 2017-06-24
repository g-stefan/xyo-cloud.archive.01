<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->registerModuleAcl($module,"xyo-info-about",null,null,0,true);

$this->registerModule($module, null, "xyo-app-user");
$this->registerModuleAcl("xyo-app-user","xyo-control-panel","administrator","administrator",100,true);

$this->registerModule($module, null, "xyo-app-user-x-user-group");
$this->registerModuleAcl("xyo-app-user-x-user-group","xyo-none","administrator","administrator",101,true);

$this->registerModule($module, null, "xyo-app-user-x-core");
$this->registerModuleAcl("xyo-app-user-x-core","xyo-none","administrator","administrator",102,true);

$this->registerModule($module, null, "xyo-app-user-group");
$this->registerModuleAcl("xyo-app-user-group","xyo-control-panel","administrator","wheel",103,true);

$this->registerModule($module, null, "xyo-app-user-group-x-user-group");
$this->registerModuleAcl("xyo-app-user-group-x-user-group","xyo-none","administrator","wheel",104,true);

$this->registerModule($module, null, "xyo-app-core");
$this->registerModuleAcl("xyo-app-core","xyo-control-panel","administrator","wheel",110,true);

$this->registerModule($module, null, "xyo-app-module");
$this->registerModuleAcl("xyo-app-module","xyo-control-panel","administrator","wheel",120,true);

$this->registerModule($module, null, "xyo-app-module-group");
$this->registerModuleAcl("xyo-app-module-group","xyo-control-panel","administrator","wheel",121,true);

$this->registerModule($module, null, "xyo-app-module-parameter");
$this->registerModuleAcl("xyo-app-module-parameter","xyo-none","administrator","wheel",122,true);

$this->registerModule($module, null, "xyo-app-language");
$this->registerModuleAcl("xyo-app-language","xyo-control-panel","administrator","wheel",130,true);

$this->registerModule($module, null, "xyo-app-datasource");
$this->registerModuleAcl("xyo-app-datasource","xyo-control-panel","administrator","wheel",140,true);

$this->registerModule($module, null, "xyo-app-acl-module");
$this->registerModuleAcl("xyo-app-acl-module","xyo-control-panel","administrator","wheel",150,true);

$this->registerModule($module, null, "xyo-app-settings");
$this->registerModuleAcl("xyo-app-settings","xyo-control-panel","administrator","administrator",152,true);

$this->registerModule($module, null, "xyo-app-template");
$this->registerModuleAcl("xyo-app-template","xyo-control-panel","administrator","administrator",154,true);

$this->registerModule($module, null, "xyo-app-datasource-backup");
$this->registerModuleAcl("xyo-app-datasource-backup","xyo-none","administrator","wheel",156,true);

$this->registerModule($module, null, "xyo-app-example");
$this->registerModuleAcl("xyo-app-example","xyo-control-panel","administrator","administrator",200,true);

$this->registerModule($module, null, "xyo-mod-user-form");
$this->registerModuleAcl("xyo-mod-user-form", "xyo-status", "administrator", "authenticated", 18000, true);

$this->registerModule($module, null, "xyo-app-user-form");
$this->registerModuleAcl("xyo-app-user-form", "xyo-control-panel", "administrator", "authenticated", 18000, true);

