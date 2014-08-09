<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->registerModuleAcl($module,"xyo-info-about",null,null,0,true);

$this->registerModule($module, null, "xyo-com-user", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-user");
$this->registerModuleAcl("xyo-com-user","xyo-control-panel","administrator","administrator",100,true);

$this->registerModule($module, null, "xyo-com-user-x-user-group", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-user-x-user-group");
$this->registerModuleAcl("xyo-com-user-x-user-group","xyo-control-panel","administrator","administrator",101,true);

$this->registerModule($module, null, "xyo-com-user-x-core", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-user-x-core");
$this->registerModuleAcl("xyo-com-user-x-core","xyo-control-panel","administrator","administrator",102,true);

$this->registerModule($module, null, "xyo-com-user-group", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-user-group");
$this->registerModuleAcl("xyo-com-user-group","xyo-control-panel","administrator","wheel",103,true);

$this->registerModule($module, null, "xyo-com-user-group-x-user-group", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-user-group-x-user-group");
$this->registerModuleAcl("xyo-com-user-group-x-user-group","xyo-control-panel","administrator","wheel",104,true);

$this->registerModule($module, null, "xyo-com-core", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-core");
$this->registerModuleAcl("xyo-com-core","xyo-control-panel","administrator","wheel",110,true);

$this->registerModule($module, null, "xyo-com-module", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-module");
$this->registerModuleAcl("xyo-com-module","xyo-control-panel","administrator","wheel",120,true);

$this->registerModule($module, null, "xyo-com-module-group", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-module-group");
$this->registerModuleAcl("xyo-com-module-group","xyo-control-panel","administrator","wheel",121,true);

$this->registerModule($module, null, "xyo-com-module-parameter", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-module-parameter");
$this->registerModuleAcl("xyo-com-module-parameter","xyo-none","administrator","wheel",122,true);

$this->registerModule($module, null, "xyo-com-language", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-language");
$this->registerModuleAcl("xyo-com-language","xyo-control-panel","administrator","wheel",130,true);

$this->registerModule($module, null, "xyo-com-datasource", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-datasource");
$this->registerModuleAcl("xyo-com-datasource","xyo-control-panel","administrator","wheel",140,true);

$this->registerModule($module, null, "xyo-com-acl-module", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-acl-module");
$this->registerModuleAcl("xyo-com-acl-module","xyo-control-panel","administrator","wheel",150,true);

$this->registerModule($module, null, "xyo-com-settings", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-settings");
$this->registerModuleAcl("xyo-com-settings","xyo-control-panel","administrator","administrator",152,true);

$this->registerModule($module, null, "xyo-com-template", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-template");
$this->registerModuleAcl("xyo-com-template","xyo-control-panel","administrator","administrator",154,true);

$this->registerModule($module, null, "xyo-com-datasource-backup", true, false, true, null, null);
$this->linkModuleVersion("xyo-com-datasource-backup");
$this->registerModuleAcl("xyo-com-datasource-backup","xyo-none","administrator","wheel",156,true);
