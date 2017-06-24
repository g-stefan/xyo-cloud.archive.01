<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("application_title", "Users");

$this->set("head_name", "Name");
$this->set("head_username", "Username");
$this->set("head_id", "Id");
$this->set("head_logged_on", "Logged on");
$this->set("head_enabled", "Enabled");
$this->set("head_logged_in", "Logged in");
$this->set("head_created_on", "Created on");
$this->set("head_invisible","Invisible");

$this->set("select_xyo_user_group_any", "- user group -");
$this->set("select_xyo_language_any", "- language -");

$this->set("form_new_user", "New user");

$this->set("label_name", "Name");
$this->set("label_username", "Username");
$this->set("label_password1", "Password");
$this->set("label_password2", "Retype password");
$this->set("label_enabled", "Enabled");
$this->set("label_picture", "Picture");
$this->set("label_description", "Description");
$this->set("label_id_xyo_user_group", "Default user group");
$this->set("label_id_xyo_language", "Default language");
$this->set("label_invisible","Invisible");
$this->set("label_email","E-Mail");

$this->set("form_edit_user", "Edit user");
$this->set("form_title_user", "User");

$this->set("el_id_empty", "is empty");
$this->set("el_name_empty", "is empty");
$this->set("el_username_empty", "is empty");
$this->set("el_password1_empty", "is empty");
$this->set("el_password2_empty", "is empty");
$this->set("el_password1_not_match", "does not match");
$this->set("el_password2_not_match", "does not match");
$this->set("el_username_already_exists", "already exists");

$this->set("err_disable_this_user", "Unable to disable your's logged in user");
$this->set("err_save_error", "Save error");
$this->set("err_new_user_x_user_group_save_error", "Unable to save user default group");
$this->set("err_logout_this_user", "Can't logout yourself using that");
$this->set("err_delete_this_user", "Can't delete yourself");
$this->set("err_id_user_not_found", "User id not found");
$this->set("err_new_user_x_core_save_error","Unable to save user default core");

$this->set("info_logout_ok", "Logout successfully");

$this->set("select_invisible_any", "- invisible -");
$this->set("select_invisible_enabled", "yes");
$this->set("select_invisible_disabled", "no");

$this->set("select_xyo_core_any", "- core -");
$this->set("select_xyo_user_group_none","- none -");
$this->set("select_xyo_language_none","- none -");
