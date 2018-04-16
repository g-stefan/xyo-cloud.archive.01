<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$dsUserGroupXUserGroup = &$dataSource;

$dsUserGroupX = &$this->getDataSource("db.table.xyo_user_group");
$dsUserGroupY = &$this->getDataSource("db.table.xyo_user_group");


$dsUserGroupX->clear();
$dsUserGroupX->name = "administrator";
$dsUserGroupX->enabled = 1;
if ($dsUserGroupX->load(0, 1)) {

	$dsUserGroupY->clear();
	$dsUserGroupY->name = "authenticated";
	$dsUserGroupY->enabled = 1;
	if ($dsUserGroupY->load(0, 1)) {


		$dsUserGroupXUserGroup->clear();
		$dsUserGroupXUserGroup->id_xyo_user_group_super = $dsUserGroupX->id;
		$dsUserGroupXUserGroup->id_xyo_user_group = $dsUserGroupY->id;
		$dsUserGroupXUserGroup->tryLoad();
		$dsUserGroupXUserGroup->enabled = 1;
		$dsUserGroupXUserGroup->save();

	}
}



$dsUserGroupX->clear();
$dsUserGroupX->name = "wheel";
$dsUserGroupX->enabled = 1;
if ($dsUserGroupX->load(0, 1)) {


	$dsUserGroupY->clear();
	$dsUserGroupY->name = "authenticated";
	$dsUserGroupY->enabled = 1;
	if ($dsUserGroupY->load(0, 1)) {


		$dsUserGroupXUserGroup->clear();
		$dsUserGroupXUserGroup->id_xyo_user_group_super = $dsUserGroupX->id;
		$dsUserGroupXUserGroup->id_xyo_user_group = $dsUserGroupY->id;
		$dsUserGroupXUserGroup->tryLoad();
		$dsUserGroupXUserGroup->enabled = 1;
		$dsUserGroupXUserGroup->save();

	}

	$dsUserGroupY->clear();
	$dsUserGroupY->name = "administrator";
	$dsUserGroupY->enabled = 1;
	if ($dsUserGroupY->load(0, 1)) {


		$dsUserGroupXUserGroup->clear();
		$dsUserGroupXUserGroup->id_xyo_user_group_super = $dsUserGroupX->id;
		$dsUserGroupXUserGroup->id_xyo_user_group = $dsUserGroupY->id;
		$dsUserGroupXUserGroup->tryLoad();
		$dsUserGroupXUserGroup->enabled = 1;
		$dsUserGroupXUserGroup->save();

	}
}

