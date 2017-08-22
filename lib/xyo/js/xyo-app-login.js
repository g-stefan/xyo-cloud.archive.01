//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

function xyoFormLoginAction(fn) {
	var username=fn.elements.user_username.value;
	var password=fn.elements.user_password.value;
	var rnd=fn.elements.user_rnd.value;
	if(password.match("^md5:")=="md5:") {} else {
		if(password=="") {} else {
			fn.elements.user_password.value="md5:"+hex_md5(hex_md5((""+username).toLowerCase()+hex_md5(password))+rnd);
		}
	}
	return true;
}
