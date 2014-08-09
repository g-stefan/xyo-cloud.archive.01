<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_com_Table";

class xyo_com_Table extends xyo_com_Application {

    protected $tableComPath;
//---
    protected $tablePrimaryKey;
    protected $tableHead;
    protected $tableSearch;
    protected $tableSelect;
    protected $tableSort;        
    protected $tableSelectInfo;
    protected $tableData;
    protected $tableType;    
//---
    protected $viewData;
	protected $fnCallId_;
//---
	protected $viewKey;
	protected $viewId;

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        $this->tableComPath = $this->getModulePath("xyo-com-table");

        $this->tablePrimaryKey = "id";

        $this->tableHead = array();
        $this->tableSearch = array();
        $this->tableSelect = array();        
        $this->tableSort = array();
        $this->tableSelectInfo = array();             
	$this->tableData = array();

        $this->tableType = array();

        $this->viewData = null;
	$this->fnCallId_=0;
	$this->viewKey=null;
	$this->viewId=0;
    }

	public function setTablePrimaryKey($name){
		$this->tablePrimaryKey=$name;
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
			if(strncmp($key,"search_",7)==0){
				$this->setKeepRequest("view_x_search_".substr($key,7),$value);
	        }
			if(strncmp($key,"view_x_search_",14)==0){
				$this->transferRequest("search_".substr($key,14),"view_x_search_".substr($key,14));
			}                
			if(strncmp($key,"search_reset_",13)==0){
				$this->setKeepRequest("view_x_search_reset_".substr($key,13),$value);
	        }
			if(strncmp($key,"view_x_search_reset_",20)==0){
				$this->transferRequest("search_reset_".substr($key,20),"view_x_search_reset_".substr($key,20));
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

	public function eGenerateCallRequestJs($requestThis,$module,$request,$functionJs,$processJs){
		++$this->fnCallId_;
		$request_=$this->callRequest(
				$this->requestThisDirect($requestThis),
				$this->requestModuleDirect($module,$request)
		);
		$action_=$this->requestUri($this->moduleFromRequestDirect($request_));
		echo "<form name=\"fn_call_".$this->fnCallId_."\" method=\"POST\" action=\"".$action_."\">";
			$this->eFormBuildRequest($request_);
		echo "</form>";		
		$this->ejsBegin();
		echo "function ".$functionJs."(){";
		echo " if(".$processJs."(document.forms.fn_call_".$this->fnCallId_.")){";
		echo "	document.forms.fn_call_".$this->fnCallId_.".submit();";
		echo " };";
		echo " return false;";
		echo "};";
		$this->ejsEnd();
		return "fn_call_".$this->fnCallId_;
	}


}
