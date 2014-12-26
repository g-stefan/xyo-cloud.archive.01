<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->registerModuleAcl($module,"xyo-info-about",null,null,0,true);

$this->registerModule($module, null, "xyo-com-user", true, true, null);
$this->registerModuleAcl("xyo-com-user","xyo-control-panel","administrator","administrator",100,true);

$this->registerModule($module, null, "xyo-com-user-x-user-group", true, true, null);
$this->registerModuleAcl("xyo-com-user-x-user-group","xyo-none","administrator","administrator",101,true);

$this->registerModule($module, null, "xyo-com-user-x-core", true, true, null);
$this->registerModuleAcl("xyo-com-user-x-core","xyo-none","administrator","administrator",102,true);

$this->registerModule($module, null, "xyo-com-user-group", true, true, null);
$this->registerModuleAcl("xyo-com-user-group","xyo-control-panel","administrator","wheel",103,true);

$this->registerModule($module, null, "xyo-com-user-group-x-user-group", true, true, null);
$this->registerModuleAcl("xyo-com-user-group-x-user-group","xyo-none","administrator","wheel",104,true);

$this->registerModule($module, null, "xyo-com-core", true, true, null);
$this->registerModuleAcl("xyo-com-core","xyo-control-panel","administrator","wheel",110,true);

$this->registerModule($module, null, "xyo-com-module", true, true, null);
$this->registerModuleAcl("xyo-com-module","xyo-control-panel","administrator","wheel",120,true);

$this->registerModule($module, null, "xyo-com-module-group", true, true, null);
$this->registerModuleAcl("xyo-com-module-group","xyo-control-panel","administrator","wheel",121,true);

$this->registerModule($module, null, "xyo-com-module-parameter", true, true, null);
$this->registerModuleAcl("xyo-com-module-parameter","xyo-none","administrator","wheel",122,true);

$this->registerModule($module, null, "xyo-com-language", true, true, null);
$this->registerModuleAcl("xyo-com-language","xyo-control-panel","administrator","wheel",130,true);

$this->registerModule($module, null, "xyo-com-datasource", true, true, null);
$this->registerModuleAcl("xyo-com-datasource","xyo-control-panel","administrator","wheel",140,true);

$this->registerModule($module, null, "xyo-com-acl-module", true, true, null);
$this->registerModuleAcl("xyo-com-acl-module","xyo-control-panel","administrator","wheel",150,true);

$this->registerModule($module, null, "xyo-com-settings", true, true, null);
$this->registerModuleAcl("xyo-com-settings","xyo-control-panel","administrator","administrator",152,true);

$this->registerModule($module, null, "xyo-com-template", true, true, null);
$this->registerModuleAcl("xyo-com-template","xyo-control-panel","administrator","administrator",154,true);

$this->registerModule($module, null, "xyo-com-datasource-backup", true, true, null);
$this->registerModuleAcl("xyo-com-datasource-backup","xyo-none","administrator","wheel",156,true);

$this->registerModule($module, null, "xyo-com-example", true, true, null);
$this->registerModuleAcl("xyo-com-example","xyo-control-panel","administrator","administrator",200,true);

$this->registerModule($module, null, "xyo-mod-user-form", true, true, null);
$this->registerModuleAcl("xyo-mod-user-form", "xyo-status", "administrator", "authenticated", 18000, true);

$this->registerModule($module, null, "xyo-com-user-form", true, true, null);
$this->registerModuleAcl("xyo-com-user-form", "xyo-control-panel", "administrator", "authenticated", 18000, true);

