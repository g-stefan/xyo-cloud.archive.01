<?php
//
// Copyright (c) 2016 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

class xyo_Object extends stdClass{

	public function __call($closure, $args){
		return call_user_func_array($this->{$closure}->bindTo($this),$args);
	}

}

