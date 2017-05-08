<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
//
// Config
//

$select_info = $this->tableSelectInfo;

//
// Action
//
$search_value = array();
foreach ($this->tableSearch as $key => $value) {
    if ($value) {
	$search_value[$key] = trim($this->getRequest("search_" . $key,null));
	$search_reset_=$this->getRequest("search_reset_" . $key , 0);
	if(strlen("".$search_reset_)==0){
		$search_reset_=0;
	};
	$search_reset = 1*$search_reset_;
        if ($search_reset == 1) {
            $search_value[$key] = "";
        }
    }else{
		$search_value[$key]=null;
	}
};
$select_value = array();
foreach ($this->tableSelect as $key => $value) {
	if ($value) {
		$select_value[$key] = trim($this->getRequest("view_select_" . $key, null));	
		$this->unsetKeepRequest("view_select_" . $key);
		$this->setKeepRequest("edit_select_" . $key,$select_value[$key]);
	}else{
		$select_value[$key]=null;
	}
};

$sort_value = array();
$sort_value_next = array();
foreach ($this->tableSort as $key => $value) {
    $sort_value[$key] = trim($this->getRequest("sort_v_" . $key, $this->tableSort[$key]));
}
$sort_mark=null;
foreach ($this->tableSort as $key => $value) {
    if ($this->getRequest("sort_x_ascendent_" . $key )=="ascendent") {
        $sort_value[$key] = "ascendent";		
		$sort_mark=$key;
		break;
    } else
    if ($this->getRequest("sort_x_descendent_" . $key)=="descendent") {
        $sort_value[$key] = "descendent";
		$sort_mark=$key;
		break;
    } else
    if ($this->getRequest("sort_x_none_" . $key )=="none") {
        $sort_value[$key] = "none";
		$sort_mark=$key;
		break;
    }
}

if($sort_mark){
	foreach ($sort_value as $key => $value) {
		if($key===$sort_mark){
			continue;
		};
		$sort_value[$key] = "none";
	};
	
};

foreach ($sort_value as $key => $value) {
    if ($value === "ascendent") {
        $sort_value_next[$key] = "descendent";
    } else
    if ($value === "descendent") {
        $sort_value_next[$key] = "ascendent";
    } else
    if ($value === "none") {
        $sort_value_next[$key] = "ascendent";
    }
}


$this->viewData = array();
$data = array();


$count = trim($this->getRequest("count", 15));
$page = trim($this->getRequest("page", 1));

$this->setKeepRequest("view_count",$count);

if (1*$this->getRequest("go_first")) {
    $page = 1;	
}

if (1*$this->getRequest("go_previous")) {
    $page = $page - 1;
}

if ($page < 1) {
    $page = 1;
};
$nr_items = 0;


$select_value["count"] = $count;

$this->ds = &$this->getDataSource($this->applicationDataSource);
if ($this->ds) {
    $this->ds->clear();
    foreach ($this->tableSearch as $key => $value) {
        if ($value) {
            if (strlen($search_value[$key])) {
				$this->ds->pushOperator("and");
                $this->ds->setOperator($key, "like",$search_value[$key]);
            }
        }
    }
    foreach ($this->tableSelect as $key => $value) {
        if ($value) {
            if (strlen($select_value[$key])) {
                if ($select_value[$key] === "*") {
                    
                } else {
                    $this->ds->$key = $select_value[$key];
                }
            }
        }
    }

    foreach ($sort_value as $key => $value) {
        if ($value === "ascendent") {
            $this->ds->setOrder($key, 1);
        } else
        if ($value === "descendent") {
            $this->ds->setOrder($key, 2);
        }
    }

    $this->processModel("table-select");

    $nr_items = $this->ds->count();
    $x_count = $count;
    if ($count === "all") {
        $page = 1;
        $x_count = $nr_items;
    }


    $page_count = 1;
    if ($count > 0) {
        $page_count = ceil($nr_items / $count);
    }

    if (1*$this->getRequest("go_last")) {
        $page = $page_count;		
    }

    if (1*$this->getRequest("go_next")) {
        $page = $page + 1;
    }    

    if ($page > ($page_count - 1)) {
        $page = $page_count;
    }
    
    if ($page < 1) {
        $page = 1;
    }
	

	$this->setKeepRequest("view_page",$page);

    $index = 0;

	if($this->tableIsDelete){
		$this->ds->{$this->primaryKey}=$this->primaryKeyValue;
	};

    for ($this->ds->load((1 * $page - 1) * $x_count, $x_count); $this->ds->isValid(); $this->ds->loadNext()) {

        ++$index;

        $this->viewData[$this->ds->id] = array();
        $this->viewData[$this->ds->id]["#"] = $index;
        $this->viewData[$this->ds->id]["@write"] = true;
        foreach ($this->tableHead as $key => $value) {
            if ($key === "#")
                continue;
			if(array_key_exists($key,$this->tableData)){
			}else{
	            $this->viewData[$this->ds->id][$key] = $this->ds->$key;
			}
        }
        foreach ($this->tableData as $key => $value) {
			if(is_array($value)){
				$this->viewData[$this->ds->id][$key] = $value[0];
			}else{
				$this->viewData[$this->ds->id][$key] = $this->ds->$value;
			}
		}
    }

    $this->processModel("table-filter");
}

$select_info = array_merge($select_info, array(
    "count" => array(
        "5" => $this->getFromLanguage("select_count_5"),
        "10" => $this->getFromLanguage("select_count_10"),
        "15" => $this->getFromLanguage("select_count_15"),
        "25" => $this->getFromLanguage("select_count_25"),
        "50" => $this->getFromLanguage("select_count_50"),
        "100" => $this->getFromLanguage("select_count_100"),
        "all" => $this->getFromLanguage("select_count_all")
    )
        )
);

$this->setParameter("select_info", $select_info);
$this->setParameter("search_value", $search_value);
$this->setParameter("select_value", $select_value);
$this->setParameter("nr_items", $nr_items);
$this->setParameter("count", $count);
$this->setParameter("page", $page);
$this->setParameter("sort_value", $sort_value);
$this->setParameter("sort_value_next", $sort_value_next);


$this->toolbarParameter=array_merge($this->toolbarParameter,array(
	"dialog_new"=>$this->dialogNew_,
	"dialog_edit"=>$this->dialogEdit_
));

foreach($this->tableType as $key_=>$value_){
	if($value_[0]=="cmd-edit"){
		if($this->dialogEdit_){
			//
		}else{
			$this->tableType[$key_]=array_merge(array("action",array(
				"action" => "form-edit",
				"primary_key_value" => array($this->primaryKey)
			)),array_slice($this->tableType[$key_],1));

		};
	};
};

