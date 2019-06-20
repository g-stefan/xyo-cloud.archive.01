<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_Table";

class xyo_app_Table extends xyo_app_Application {

	protected $tableComPath;
//---
	protected $tableHead;
	protected $tableSearch;
	protected $tableSelect;
	protected $tableSort;        
	protected $tableSelectInfo;
	protected $tableData;
	protected $tableType; 
	protected $tableDelete;
	protected $tableImportant;
//---
	protected $viewData;
//---
	protected $viewKey;
	protected $viewId;
	protected $viewValue;

//---
	protected $tableIsDelete;
//
	protected $dialogNew_;
	protected $dialogEdit_;
	protected $dialogFilter_;
        protected $isDialog;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

	        $this->tableComPath = $this->getModulePath("xyo-app-table");

        	$this->tableHead = array();
	        $this->tableSearch = array();
	        $this->tableSelect = array();        
	        $this->tableSort = array();
	        $this->tableSelectInfo = array();             
		$this->tableData = array();

	        $this->tableType = array();
	        $this->tableDelete = array();
		$this->tableImportant = array();

	        $this->viewData = null;
		$this->viewKey=null;
		$this->viewId=0;
		$this->tableIsDelete=false;
		$this->dialogNew_=false;
		$this->dialogEdit_=false;
		$this->dialogFilter_=false;
		$this->isDialog=false;
	}

	public function viewKeepRequest(){
		$this->transferRequest("page","view_page");
		$this->keepRequest("view_page");

		$this->transferRequest("count","view_count");
		$this->keepRequest("view_count");

		foreach($this->getRequestDirect() as $key=>$value){
			if(strncmp($key,"view_select_",12)==0){
				$this->setKeepRequest("view_x_select_".substr($key,12),$value);
			}
			if(strncmp($key,"view_x_select_",14)==0){
				$this->transferRequest("view_select_".substr($key,14),"view_x_select_".substr($key,14));
				$this->keepRequest("view_select_".substr($key,14));
			}
			if(strncmp($key,"sort_v_",7)==0){
				$this->setKeepRequest("view_x_sort_v_".substr($key,7),$value);
			}
			if(strncmp($key,"view_x_sort_v_",14)==0){
				$this->transferRequest("sort_v_".substr($key,14),"view_x_sort_v_".substr($key,14));
			}
			if(strncmp($key,"search",6)==0){
				$this->setKeepRequest("view_x_search",$value);
	        }
			if(strncmp($key,"view_x_search",13)==0){
				$this->transferRequest("search","view_x_search");
			}                
			if(strncmp($key,"search_reset",12)==0){
				$this->setKeepRequest("view_x_search_reset",$value);
	        }
			if(strncmp($key,"view_x_search_reset",19)==0){
				$this->transferRequest("search_reset","view_x_search_reset");
			}
			
		}
	}

	public function selectEditRequest(){
		foreach($this->getRequestDirect() as $key=>$value){
			if(strncmp($key,"edit_select_",12)==0){				
				$this->setElementValue(substr($key,12),$value);
			}
		}
	}

	public function eGenerateCallRequest($requestThis,$module,$request,$selector,$functionJs){
		$pJs="function(form_){".
			 " var id;".
			 " id=selectIdOne();".
			 " if(id){".
			 "  form_.".$selector.".value=id;".
			 "  return true;".
			 " };".
			 " return false;".
			 "}";

		return $this->eGenerateCallRequestJs($requestThis,$module,$request,$functionJs,$pJs);
	}

	public function setDialogNew($value){
		$this->dialogNew_=$value;
	}

	public function setDialogEdit($value){
		$this->dialogEdit_=$value;
	}

	public function setDialogFilter($value){
		$this->dialogFilter_=$value;
	}

}
