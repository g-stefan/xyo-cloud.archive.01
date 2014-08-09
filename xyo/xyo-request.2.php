<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

function xyo_cloud__strip_slashes_deep($value) {
	return is_array($value) ? array_map("xyo_cloud__strip_slashes_deep", $value) : stripslashes($value);
}

class xyo_Request extends xyo_Attributes {

	public function __construct() {
		parent::__construct(array_map("xyo_cloud__strip_slashes_deep",array_merge($_COOKIE, array_merge($_GET, $_POST))));
	}

}
