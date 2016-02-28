<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$compactView="";
if(1*$this->getParameterBase("xyo_com_table_compact_view")){
	$compactView="table-condensed";
};

$select_info = $this->getParameter("select_info", array());
$search_value = $this->getParameter("search_value", array());
$select_value = $this->getParameter("select_value", array());
$nr_items = $this->getParameter("nr_items", 0);
$count = $this->getParameter("count", 10);
$page = $this->getParameter("page", 1);
$sort_value = $this->getParameter("sort_value", array());
$sort_value_next = $this->getParameter("sort_value_next", array());

if ($count > 0) {
    $page_count = ceil($nr_items / $count);
} else {
    $page_count = 1;
}

$sort_img = array(
    "ascendent" => "<i class=\"fa fa-sort-asc pull-right\" style=\"color:#999;\"></i>",
    "descendent" => "<i class=\"fa fa-sort-desc pull-right\" style=\"color:#999;\"></i>",
    "none" => "<i class=\"fa fa-sort pull-right\" style=\"color:#999;\"></i>"
);

$toggle_img = array(
    0 => "<i class=\"fa fa-times\" style=\"color:#A33;\"></i>",
    1 => "<i class=\"fa fa-check\" style=\"color:#3A3;\"></i>"
);

$toggle_off_img = array(
    0 => "<i class=\"fa fa-times\" style=\"color:#888;\"></i>",
    1 => "<i class=\"fa fa-check\" style=\"color:#888;\"></i>"
);

function xyo_com_table_processImage_($image,$defaultColor){
	$img="";

	if(is_array($image)){
		if(strncmp($image[0],"#",1)==0){
			$image[0] = substr($image[0],1);
		};
		$img = "<i class=\"".$image[0]."\" style=\"color:".$image[1]."\"></i>";
	}else{
	        $img = $image;
        	if ($img) {
			if(strncmp($img,"#",1)==0){
				// icon
			        $img = substr($img,1);
				$img = "<i class=\"".$img."\" style=\"color:".$defaultColor."\"></i>";
			}else{
		            $img = "<img src=\"".$img."\" style=\"width:16px;height:16px;border:0px;\"></img>";
			};
	        } else {
        	    $img = "";
        	};
	};	
	return $img;
};


?>
<?php $this->ejsBegin(); ?>

<?php
echo "var id_=[";
$count_=count($this->viewData);
$idx_=0;
foreach ($this->viewData as $key => $value) {
    echo $value[$this->primaryKey];
	++$idx_;
	if($idx_<$count_){
		echo ",";
	}
}
echo "];\r\n";
?>
    function doCommand(action){
        var el;
        var id;

        document.forms.<?php $this->eFormName(); ?>.elements.action.value=action;
        id="";
        for(k=1;k<=id_.length; ++k){
            el=document.getElementById("cbox_"+k);
            if(el){
                if(el.checked){
                    id+=""+id_[k-1];
                    id+=",";
                }
            }
        }
        document.forms.<?php $this->eFormName(); ?>.elements.primary_key_value.value=id;
        document.forms.<?php $this->eFormName(); ?>.submit();
        return false;
    }
    
        function doOrderSave(key){
            var this_=document.forms.<?php $this->eFormName(); ?>;
                this_.elements["action"].value="table-order-save";
                this_.elements["order"].value=key;            
                this_.elements["primary_key_value"].value="<?php
    foreach ($this->viewData as $key => $value) {
        echo $value[$this->primaryKey] . ",";
    }
    ?>";
                                    
                    this_.submit();
                
            }

function doOrderUp(field,key) {
	var this_=document.forms.<?php $this->eFormName(); ?>;
		this_.elements["action"].value="table-order-up";
		this_.elements["order"].value=key;
		this_.elements["primary_key_value"].value=field;
		this_.submit();	
}

function doOrderDown(field,key) {
            var this_=document.forms.<?php $this->eFormName(); ?>;           
		this_.elements["action"].value="table-order-down";
		this_.elements["order"].value=key;
		this_.elements["primary_key_value"].value=field;
		this_.submit();
}


function doToggle(field,key) {
            var this_=document.forms.<?php $this->eFormName(); ?>;           
		this_.elements["action"].value="table-toggle";
		this_.elements["toggle"].value=key;
		this_.elements["primary_key_value"].value=field;
		this_.submit();
}

function doRadio(field,key) {
            var this_=document.forms.<?php $this->eFormName(); ?>;           
		this_.elements["action"].value="table-radio";
		this_.elements["radio"].value=key;
		this_.elements["primary_key_value"].value=field;
		this_.submit();
}
 
function doValueSave(key){
            var this_=document.forms.<?php $this->eFormName(); ?>;           
                this_.elements["action"].value="table-value-save";
                this_.elements["value"].value=key;            
                this_.elements["primary_key_value"].value="<?php
    foreach ($this->viewData as $key => $value) {
        echo $value[$this->primaryKey] . ",";
    }
    ?>";
                                    
                this_.submit();
}

<?php $this->ejsEnd(); ?>

<form id="<?php $this->eFormName(); ?>" name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>">

<?php

	echo "<div class=\"row-fluid\" style=\"margin-bottom:6px;\">";
	echo "<div class=\"span6\">";
	
        foreach ($this->tableSearch as $key => $value) {
            if ($value) {
                ?>
		    <div class="input-group pull-left" style="width:240px;margin-left:6px;">
                    <input type="text"
                           value="<?php echo $search_value[$key]; ?>"
                           name="search_<?php echo $key; ?>"
                           class="form-control"
                           size="32"
			   placeholder="<?php $this->eLanguage("search_" . $key); ?>"></input>
			<span class="input-group-btn">
			<button class="btn btn-default" type="submit" name="submit_search_<?php echo $key; ?>" onclick="javascript:$('#submit_search_<?php echo $key; ?>').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="fa fa-search"></i></button>
			<button class="btn btn-default" type="button" name="search_reset__<?php echo $key; ?>" onclick="javascript:clearSearch(this,'search_<?php echo $key; ?>');"><i class="fa fa-times"></i></button>
			</span>
		    </div>		
                <?php
            }
        }
          

        echo "</div>";
 	echo "<div class=\"span6\">";
 	 
                        
        foreach (array_reverse($this->tableSelect,true) as $key => $value) {
            if ($value) {
                ?>
		    <div class="pull-right" style="margin-right:6px;">
                    <select name="view_select_<?php echo $key; ?>"
                            size="1"
                            onChange="javascript:this.form.submit();"
                            class="selectpicker" data-width="auto"><?php
        foreach ($select_info[$key] as $key_ => $value_) {
            $selected = "";
            if (strcmp($key_, $select_value[$key]) == 0) {
                $selected = " selected=\"selected\"";
            }
            echo "<option value=\"" . $key_ . "\" " . $selected . ">" . $value_ . "</option>";
        }
                ?></select>
			</div>
                <?php
            }
        }
       
        echo "</div>";
	echo "<div class=\"clearfix\"></div>";
        echo "</div>";




        ?>
        <div class="clearfix" ></div>
   
<div class="table-responsive" style="margin-left:6px;margin-right:6px;">
    <table class="table table-striped table-bordered table-hover <?php echo $compactView; ?>" id="com_table">
	<thead>
                <?php
                foreach ($this->tableHead as $key => $value) {

	                    echo "<th style=\"vertical-align:middle;\">";


                    if ($key === "#") {						
                        echo "<input type=\"checkbox\" name=\"id_0\" value=\"0\" onchange=\"javascript:setCheckboxState(this);\" onclick=\"javascript:setCheckboxState(this);\" />";
                    } else
		   if (array_key_exists($key, $this->tableType)) {
                    
				if ($this->tableType[$key][0]=="order") {
					if (array_key_exists($key, $this->tableSort)){

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
		                        $this->eLanguage($value);
					echo "</a>";

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
					echo $sort_img[$sort_value[$key]];	
					echo "</a>";

					}else{
						$this->eLanguage($value);
					};

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"javascript:doOrderSave('" . $key . "');return false;\">";
					echo "<i class=\"fa fa-floppy-o pull-right\" style=\"color:#999;font-size:1.3em;\"></i>";
					echo "</a>";


				}else
				if ($this->tableType[$key][0]=="value") {

					if (array_key_exists($key, $this->tableSort)){

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
		                        $this->eLanguage($value);
					echo "</a>";

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
					echo $sort_img[$sort_value[$key]];	
					echo "</a>";
			

					}else{
						$this->eLanguage($value);

					};

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"javascript:doValueSave('" . $key . "');return false;\">";
					echo "<i class=\"fa fa-floppy-o pull-right\" style=\"color:#999;font-size:1.3em;\"></i>";
					echo "</a>";


				}else{

					if (array_key_exists($key, $this->tableSort)){

						echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
			                        $this->eLanguage($value);
						echo $sort_img[$sort_value[$key]];	
						echo "</a>";

					}else{
			                        $this->eLanguage($value);
					};

				};
		}else{
					if (array_key_exists($key, $this->tableSort)){

						echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"javascript:$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
			                        $this->eLanguage($value);
						echo $sort_img[$sort_value[$key]];	
						echo "</a>";

					}else{
			                        $this->eLanguage($value);
					};
                 };

                 echo "</th>";
                }

                ?>
	</thead>
        <tbody>
            <?php
	    $recordId=0;
            foreach ($this->viewData as $key => $value) {

                echo "<tr>";
                foreach ($this->tableHead as $key_ => $value_) {

                    echo "<td style=\"vertical-align:middle;\">";
                    if ($key_ === "#") {
				++$recordId;
				if($value["@write"]){
	                        	echo "<input type=\"checkbox\" id=\"cbox_" . $recordId . "\"  name=\"id_" . $value[$this->primaryKey] . "\" value=\"" . $value[$this->primaryKey] . "\" />";
				}else{
					echo "&#160;";
				};
                    } else
                    if (array_key_exists($key_, $this->tableType)) {
			if($this->tableType[$key_][0]=="toggle"){

                       		$img = 0;
	                        if ($value[$key_]) {
        	                    $img = 1;
                	        };

				$toggle_img_=$toggle_img;
				$toggle_off_img_=$toggle_off_img;
				if(array_key_exists(1,$this->tableType[$key_])){
					if(array_key_exists("on",$this->tableType[$key_][1])){
						$toggle_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][0],"#A33"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][1],"#3A3")                 
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][0],"#888"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][1],"#888")
						);
					};
				};

				if($value["@write"]){

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"javascript:doToggle('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\">";
					echo $toggle_img_[$img];
					echo "</a>";

				}else{
					echo $toggle_off_img_[$img];
				};
			}else
			if(($this->tableType[$key_][0]=="toggle-read-only")||($this->tableType[$key_][0]=="radio-read-only")){

                       		$img = 0;
	                        if ($value[$key_]) {
        	                    $img = 1;
                	        };

				$toggle_img_=$toggle_img;
				$toggle_off_img_=$toggle_off_img;
				if(array_key_exists(1,$this->tableType[$key_])){
					if(array_key_exists("on",$this->tableType[$key_][1][$key_])){
						$toggle_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][0],"#A33"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][1],"#3A3")                 
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][0],"#888"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][1],"#888")
						);
					};
				};

				if($value["@write"]){
					echo $toggle_img_[$img];

				}else{
					echo $toggle_off_img_[$img];
				};
			}else
			if($this->tableType[$key_][0]=="radio"){

                       		$img = 0;
	                        if ($value[$key_]) {
        	                    $img = 1;
                	        };

				$toggle_img_=$toggle_img;
				$toggle_off_img_=$toggle_off_img;
				if(array_key_exists(1,$this->tableType[$key_])){
					if(array_key_exists("on",$this->tableType[$key_][1])){
						$toggle_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][0],"#A33"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["on"][1],"#3A3")                 
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][0],"#888"),
							1=>xyo_com_table_processImage_($this->tableType[$key_][1]["off"][1],"#888")
						);
					};
				};

				if($value["@write"]){

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"javascript:doRadio('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\">";
					echo $toggle_img_[$img];
					echo "</a>";

				}else{
					echo $toggle_off_img_[$img];
				};
			}else
			if($this->tableType[$key_][0]=="order"){

				echo "<div class=\"input-group\" style=\"width:12em;\">";
		        		echo "<input type=\"text\"";
			                       echo " name=\"order_" . $value[$this->primaryKey] . "\"";
			                       echo " value=\"" . $value[$key_] . "\"";
			                       echo " size=\"4\"";
		        		       echo "class=\"form-control\"></input>";
					echo "<span class=\"input-group-btn\">";
						echo "<button type=\"button\" class=\"btn btn-default\" onclick=\"javascript:doOrderUp('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\"><i class=\"fa fa-chevron-up\"></i></button>";
						echo "<button type=\"button\" class=\"btn btn-default\" onclick=\"javascript:doOrderDown('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\"><i class=\"fa fa-chevron-down\"></i></button>";
					echo "</span>";
				echo "</div>";
				
			}else			
			if($this->tableType[$key_][0]=="value"){
	                        echo "<input type=\"text\"";
        	                echo " name=\"value_" . $value[$this->primaryKey] . "\"";
                	        echo " value=\"" . $value[$key_] . "\"";
                        	echo " size=\"8\"";
	                        echo " class=\"form-control\"";
        	                echo " />";
			}else
			if($this->tableType[$key_][0]=="date"){
				$format=$this->tableType[$key_][1];
				if($format=="d-m-Y"){
					echo substr($value[$key_],8,2)."-".substr($value[$key_],5,2)."-".substr($value[$key_],0,4); 
				}else
				if($format=="d/m/Y"){
					echo substr($value[$key_],8,2)."/".substr($value[$key_],5,2)."/".substr($value[$key_],0,4); 
				}else{
					echo $value[$key_];
				};				
			}else
			if($this->tableType[$key_][0]=="action"){
				if($value["@write"]){
					$p = "{";
					$first=false;
		                        foreach ($this->tableType[$key_][1] as $k => $v) {
						if($first){
							$p.=",";
						}else{
							$first=true;
						}
			                        if (is_array($v)) {
								$p.="'".addcslashes(rawurlencode($k), "\\\'\"&\n\r<>")."'";
								$p.=":";
								$p.="'".addcslashes(rawurlencode($value[$v[0]]), "\\\'\"&\n\r<>")."'";
			                            }else{
								$p.="'".addcslashes(rawurlencode($k), "\\\'\"&\n\r<>")."'";
								$p.=":";
								$p.="'".addcslashes(rawurlencode($v), "\\\'\"&\n\r<>")."'";									
							}
                        		}
					$p .= "}";
		                        echo "<a href=\"#\" onclick=\"javascript:callActionLink_".$key_."(".$p.");return false;\">" . $value[$key_] . "</a>";
				}else{
					echo $value[$key_];
				};				
			}else
			if($this->tableType[$key_][0]=="cmd-edit"){
				if($value["@write"]){
		                        echo "<a href=\"#\" onclick=\"javascript:cmdDialogEdit('".$value[$this->primaryKey]."');return false;\">" . $value[$key_] . "</a>";
				}else{
					echo $value[$key_];
				};				
			}else
			if($this->tableType[$key_][0]=="custom"){
					$this->viewKey=$key_;
					$this->viewId=$key;
					if(is_array($this->tableType[$key_][1])){
						call_user_func_array($this->tableType[$key_][1][0],$this->tableType[$key_][1][1]);
					}else{
						$this->generateView($this->tableType[$key_][1]);
					}				
			}else{
				echo $value[$key_];
			};
		    }else{
				echo $value[$key_];
		};
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
        <div style="margin-left:6px;margin-right:6px">
	<div class="row-fluid">
	<div class="span12">

	<div class="pull-left" style="width:210px;">
	<div class="input-group">
		<span class="input-group-btn">
			<button type="button" class="btn btn-default" onclick="javascript:$('#go_first').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="fa fa-step-backward"></i></button>
		<button type="button" class="btn btn-default" onclick="javascript:$('#go_previous').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="fa fa-chevron-left"></i></button>
		</span>
        	<input type="text"
	               value="<?php echo $page; ?>"
        	       name="page"
	               size="4"
        	       class="form-control"></input>
		<span class="input-group-btn">
		<button type="button" class="btn btn-default" onclick="javascript:$('#go_next').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="fa fa-chevron-right"></i></button>
		<button type="button" class="btn btn-default" onclick="javascript:$('#go_last').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="fa fa-step-forward"></i></button>
		</span>
	</div>
	</div>

	<div class="pull-left" style="margin-left:6px;">

        <select name="count"
                size="1"
                onChange="javascript:this.form.submit();"
                class="selectpicker" data-width="auto">

            <?php
            $key = "count";
            foreach ($select_info[$key] as $key_ => $value_) {
                $selected = "";
                if (strcmp($key_, $select_value[$key]) == 0) {
                    $selected = " selected=\"selected\"";
                }
                echo "<option value=\"" . $key_ . "\" " . $selected . ">" . $value_ . "</option>";
            }
            ?>
        </select>
	<span style="position:relative;">
	items <span style="color: #999;"> - </span> <?php echo $page_count; ?> pages <span style="color: #999;"> - </span> <?php echo $nr_items; ?> total
	</span>

	</div>
        </div>
	</div>
	</div>
        <div class="clearfix"></div>
    
    <input type="hidden" name="action" value="table-view" />
    <input type="hidden" name="primary_key_value" value="0;" />
    <input type="hidden" name="toggle" value="" />
    <input type="hidden" name="radio" value="" />
    <input type="hidden" name="order" value="" />
    <input type="hidden" name="value" value="" />
    <input type="hidden" name="go_first" id="go_first" value="0" />
    <input type="hidden" name="go_previous" id="go_previous" value="0" />
    <input type="hidden" name="go_next" id="go_next" value="0" />
    <input type="hidden" name="go_last" id="go_last" value="0" />

<?php

	foreach ($this->tableHead as $key => $value) {
	       if (array_key_exists($key, $this->tableSort)) {
       			echo "<input type=\"hidden\" name=\"sort_x_" . $sort_value_next[$key] . "_" . $key . "\" value=\"\" id=\"sort_x_" . $sort_value_next[$key] . "_" . $key . "\"></input>";
	       };
	};


        foreach ($this->tableSearch as $key => $value) {
            if ($value) {
                ?>
                    <input type="hidden" name="submit_search_<?php echo $key; ?>" value="" id="submit_search_<?php echo $key; ?>" />
                    <input type="hidden" name="search_reset_<?php echo $key; ?>" value="" id="search_reset_<?php echo $key; ?>" />
                <?php
            }
        }

?>

    <?php

    foreach ($sort_value as $key => $value) {
        echo "<input type=\"hidden\" name=\"sort_v_" . $key . "\" value=\"" . $value . "\" />";
    };

	$this->eFormRequest();

    ?>
</form>
<?php


//callActionLink
foreach($this->tableType as $key_=>$value_){
	if($value_[0]=="action"){				
			$p=array();
			foreach($value_[1] as $kk=>$vv){
				$p[$kk]="";
			};
			$request_=$this->requestThisDirect($p);
			$action_=$this->requestUri($this->moduleFromRequestDirect($request_));
			echo "<form name=\"fn_action_".$key_."\" method=\"POST\" action=\"".$action_."\">";
				$this->eFormBuildRequest($request_);
			echo "</form>";		
			$this->ejsBegin();
			echo "function callActionLink_".$key_."(request_){";
			echo " for(var k in request_){";
		    echo "  document.forms.fn_action_".$key_.".elements[k].value=request_[k];";
	    	echo " };";
			echo " document.forms.fn_action_".$key_.".submit();";
			echo "};";			
			$this->ejsEnd();
		
	};
};


	$this->generateView("table-view-return");
	$this->generateView("table-view-call");
	
	$this->setHtmlFooterJsSource(
		"$(document).ready(function() {".
			"if($('#template-navbar-fixed-top').length){".
				"$(\"#com_table\").stickyTableHeaders({fixedOffset: $('#template-navbar-fixed-top').height()});".
			"}else{".
				"$(\"#com_table\").stickyTableHeaders();".
			"}".
		"});".
		"\r\n".
		"function cmdDialogDelete(){".
        		"var el;".
        		"var id;".
			"var found=false;".		       
		        "id=\"\";".
		        "for(k=1;k<=id_.length; ++k){".
				"el=document.getElementById(\"cbox_\"+k);".
				"if(el){".
					"if(el.checked){".
			                    "id+=\"\"+id_[k-1];".
			                    "id+=\",\";".
					    "found=true;".
					"}".
				"}".
		        "};".
			"if(!found){return};".
			"$.post(\"".$this->cloud->requestUriModule($this->name)."\", { action: \"table-dialog-delete\", primary_key_value: id, ajax: 1 } )".
  			".done(function(result){".
				"window.dialogDelete=BootstrapDialog.show({".
					"type: BootstrapDialog.TYPE_DANGER,".
					"title: '".$this->getFromLanguage("form_title_delete")."',".
					"nl2br: false,".
					"buttons: [".
						"{".
						"label: '".$this->getFromLanguage("label_button_delete")."',".
						"cssClass: 'btn-primary btn-danger',".
						"action: function(dialog){".
							"doCommand('table-delete');".
						"}}".
					"],".
					"message: result".
        			"});".
			"});".
		"};".
		"\r\n"			
	);

	if($this->dialogNew_){
		$originalFormName=$this->getFormName();			
		$this->setFormName($originalFormName."_new");
		$this->setHtmlFooterJsSource(
		"\r\n".
		"function cmdDialogNew(){".
			"$.post(\"".$this->cloud->requestUriModule($this->name)."\", { action: \"table-dialog-new\", ajax: 1 } )".
  			".done(function(result){".
				"window.dialogNew=BootstrapDialog.show({".
					"title: '".$this->getFromLanguage("form_title_new")."',".
					"nl2br: false,".
					"buttons: [".
						"{".
						"label: '".$this->getFromLanguage("label_button_new")."',".
						"cssClass: 'btn-primary',".
						"action: function(dialog){".
							"$(\"#".$this->getFormName()."\").ajaxForm({url: \"".$this->cloud->requestUriModule($this->name)."\", type: \"post\", success: function(responseText){".
								"dialog.setMessage(responseText);".
							"}});".
							"$(\"#".$this->getFormName()."\").submit();".
						"}}".
					"],".
					"message: result".
        			"});".
			"});".
		"};".
		"\r\n"
		);
		$this->setFormName($originalFormName);		
	};

	if($this->dialogEdit_){
		$originalFormName=$this->getFormName();			
		$this->setFormName($originalFormName."_edit");
		$this->setHtmlFooterJsSource(
		"\r\n".
		"function cmdDialogEdit(pkv){".			
        		"var el;".
        		"var id;".
        		"var found=false;".
			"if(typeof pkv != 'undefined'){".
				"id=pkv;".
			"}else{".			
		        "id=\"\";".
		        "for(k=1;k<=id_.length; ++k){".
				"el=document.getElementById(\"cbox_\"+k);".
				"if(el){".
					"if(el.checked){".
			                    "id+=\"\"+id_[k-1];".
			                    "id+=\",\";".
					    "found=true;".
					    "break;".
					"}".
				"}".
		        "};".			
			"if(!found){return};".
			"};".
			"$.post(\"".$this->cloud->requestUriModule($this->name)."\", { action: \"table-dialog-edit\", primary_key_value: id, ajax: 1 } )".
  			".done(function(result){".
				"window.dialogEdit=BootstrapDialog.show({".
					"title: '".$this->getFromLanguage("form_title_edit")."',".
					"nl2br: false,".
					"buttons: [".
						"{".
						"label: '".$this->getFromLanguage("label_button_edit")."',".
						"cssClass: 'btn-primary',".
						"action: function(dialog){".
							"$(\"#".$this->getFormName()."\").ajaxForm({url: \"".$this->cloud->requestUriModule($this->name)."\", type: \"post\", success: function(responseText){".
								"dialog.setMessage(responseText);".
							"}});".
							"$(\"#".$this->getFormName()."\").submit();".
						"}}".
					"],".
					"message: result".
        			"});".
			"});".
		"};".
		"\r\n"
		);
		$this->setFormName($originalFormName);		
	};


