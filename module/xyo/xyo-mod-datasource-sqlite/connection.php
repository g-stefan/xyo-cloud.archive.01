<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_mod_datasource_sqlite_Connection {

    var $db;
    var $debug;
    var $log;
    var $cloud;
    var $module;
    var $name;
    var $database;
    var $mode;

    function __construct(&$cloud, &$module, $name, $database, $mode) {
        $this->cloud = &$cloud;
        $this->module = &$module;
        $this->name = $name;
        $this->database = $database;
        $this->mode = $mode;

        $this->db = null;
        $this->debug = false;
        $this->log = false;
    }

    function setLog($log) {
        $this->log = $log;
    }

    function setDebug($debug) {
        $this->debug = $debug;
    }

    function getDateNow() {
        return date("Y-m-d H:i:s");
    }

    function debug() {
        if ($this->debug) {
            if (sqlite_last_error($this->db) != 0) {
                echo sqlite_last_error($this->db) . ": " . sqlite_error_string(sqlite_last_error($this->db)) . "\n";
            };
        };
    }

    function debug2($query) {
        if ($this->debug) {
            if (sqlite_last_error($this->db) != 0) {
                echo "on:" . $query . "\n";
                echo sqlite_last_error($this->db) . ": " . sqlite_error_string(sqlite_last_error($this->db)) . "\n";
            };
        };
    }

    function open() {
        if ($this->db)
            return true;
        $this->db = sqlite_open($this->database, $this->mode, $error);
        if (!$this->db) {
            $this->db = null;
            return false;
        };
        return true;
    }

    function close() {
        if ($this->db) {
            sqlite_close($this->db);
            $this->db = null;
        }
    }

    function sqliteQuery_($query) {
        if ($this->log) {

            $retV = sqlite_unbuffered_query($this->db, $query);

            $fs = fopen($this->cloud->get("path_log") . "sqlite." . $this->name . ".log", "ab");
            if ($fs) {
                fwrite($fs, date("Y-m-d H:i:s") . "\n");
                fwrite($fs, $query);
                fwrite($fs, "\n");
                if ($retV) {
                    fwrite($fs, "Ok\n");
                } else {
                    fwrite($fs, "Fail\n");
                };
                fwrite($fs, "\n");
                fclose($fs);
            };

            return $retV;
        };
        return sqlite_unbuffered_query($this->db, $query);
    }

    function queryDirect($query) {
        $result = $this->sqliteQuery_($query);
        if (!$result) {
            $this->debug2($query);
            $result = null;
        };
        return $result;
    }

    function queryDirect2($query) {
        return sqlite_unbuffered_query($this->db, $query);
    }

    function query($query) {
        $query = $this->parseQuery($query);
        if ($query) {
            return $this->queryDirect($query);
        };
        return null;
    }

    function safeTypeValue($type_, $value_) {
        if ($type_ == "int") {
            if (strcmp($value_, "DEFAULT") == 0)
                return "NULL";
            return $this->safeValue(1 * $value_);
        }else
        if ($type_ == "float") {
            if (strcmp($value_, "DEFAULT") == 0)
                return "NULL";
            return $this->safeValue(1 * $value_);
        }else
        if ($type_ == "text") {
            if (is_null($value_)) {
                return "NULL";
            };
            return "'" . $this->safeValue($value_) . "'";
        } else
        if ($type_ == "varchar") {
            if (is_null($value_)) {
                return "NULL";
            };
            return "'" . $this->safeValue($value_) . "'";
        } else
        if ($type_ == "date") {
            if (is_null($value_)) {
                return "NULL";
            };
            if ($value_ == "NOW") {
                return "TIME('NOW','localtime')";
            };
            return "'" . $this->safeValue($value_) . "'";
        } else
        if ($type_ == "time") {
            if (is_null($value_)) {
                return "NULL";
            };
            if ($value_ == "NOW") {
                return "DATE('NOW','localtime')";
            };
            return "'" . $this->safeValue($value_) . "'";
        } else
        if ($type_ == "datetime") {
            if (is_null($value_)) {
                return "NULL";
            };
            if ($value_ == "NOW") {
                return "DATETIME('NOW','localtime')";
            };
            return "'" . $this->safeValue($value_) . "'";
        };
        return null;
    }

    function safeTypeValueSourceCode($type_, $value_) {
        if ($type_ == "int") {
            if (strcmp($value_, "DEFAULT") == 0)
                return "\"DEFAULT\"";
            return 1 * $value_;
        }else
        if ($type_ == "text") {
            if (is_null($value_)) {
                return "null";
            };
            return "\"" . addslashes($value_) . "\"";
        } else
        if ($type_ == "date") {
            if (is_null($value_)) {
                return "null";
            };
            if ($value_ == "NOW") {
                return "\"NOW\"";
            };
            return "\"" . addslashes($value_) . "\"";
        } else
        if ($type_ == "datetime") {
            if (is_null($value_)) {
                return "null";
            };
            if ($value_ == "NOW") {
                return "\"NOW\"";
            };
            return "\"" . addslashes($value_) . "\"";
        };
        return null;
    }

    function safeDefaultEmptyValue($type_) {
        if ($this->fieldType_[$type_] == "int") {
            return 0;
        }else
            return null;
    }

    function queryValue($query, $default_=null) {
        $result = $this->query($query);
        if ($result) {
            if (sqlite_valid($result)) {
                return sqlite_fetch_single($result);
            };
        };
        return $default_;
    }

    function queryValueDefaultDirect($query, $default_) {
        $result = $this->sqliteQuery_($query);
        if (!$result) {
            $this->debug2($query);
            return $default_;
        };
        if (sqlite_valid($result)) {
            return sqlite_fetch_single($result);
        };
        return $default_;
    }

    function queryAssoc($query) {
        $result = $this->query($query);
        if ($result) {
            $data = sqlite_fetch_array($result, SQLITE_ASSOC);
            if ($data) {
                return $data;
            };
        };
        return false;
    }

    function parseQuery($query) {
        // extract #(name),check,replace #(name) with `table`
        $allOk = true;
        $replaceSource = array();
        $replaceDestination = array();
        $regex_pattern = "/#\(`([^`\)]*)`\)/";
        if (preg_match_all($regex_pattern, $query, $matches) >= 1) {
            foreach ($matches[1] as $match) {
                $table = $this->module->getDataSourceParameter($this->name . ".table." . $match);
                if ($table) {
                    $replaceSource[] = "#(`" . $match . "`)";
                    $replaceDestination[] = $table;
                } else {
                    $allOk = false;
                    break;
                };
            };
            if ($allOk) {
                return str_replace($replaceSource, $replaceDestination, $query);
            };
        } else {
            return $query;
        };
        return false;
    }

    function safeQuery($query, $params) {
        // extract @(name),check,replace @(name) with safe `value`
        $allOk = true;
        $replaceSource = array();
        $replaceDestination = array();
        $regex_pattern = "/@\(`([^`\)]*)`\)/";
        if (preg_match_all($regex_pattern, $query, $matches) >= 1) {
            foreach ($matches[1] as $match) {
                $value = array_key_exists($match, $params);
                if ($value) {
                    $replaceSource[] = "@(`" . $match . "`)";
                    $replaceDestination[] = $this->safeValue($params[$match]);
                } else {
                    $allOk = false;
                    break;
                };
            };
            if ($allOk) {
                return $this->parseQuery(str_replace($replaceSource, $replaceDestination, $query));
            };
        } else {
            return $this->parseQuery($query);
        };
        return false;
    }

    function safeValue($value) {
        return sqlite_escape_string($value);
    }

    function safeLikeValue($value) {
        return sqlite_escape_string($value);
    }

}

;


