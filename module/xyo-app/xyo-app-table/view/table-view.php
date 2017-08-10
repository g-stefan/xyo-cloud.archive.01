<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$compactView="";
if(1*$this->getParameterBase("xyo_app_table_compact_view",1)){
	$compactView="table-condensed";
};

$has_search=false;
foreach ($this->tableSearch as $key => $value) {
	if ($value) {
		$has_search=true;
	};
};

$select_info = $this->getParameter("select_info", array());
$search_value = $this->getParameter("search_value", "");
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
    0 => "<i class=\"fa fa-times\" style=\"display:block;color:#B71C1C;font-size:16px;\"></i>",
    1 => "<i class=\"fa fa-check\" style=\"display:block;color:#1B5E20;font-size:16px;\"></i>"
);

$toggle_off_img = array(
    0 => "<i class=\"fa fa-times\" style=\"display:block;color:#888;font-size:16px;\"></i>",
    1 => "<i class=\"fa fa-check\" style=\"display:block;color:#888;font-size:16px;\"></i>"
);

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


<form id="<?php $this->eFormName(); ?>" name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" style="width:100%;height:100%;position:relative;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px;overflow:hidden;">

<?php
		
	echo "<div class=\"xui-table\">";
	echo "<div class=\"xui-table-toolbar-top\">";
	echo "<div class=\"span6\">";
	
	if($has_search){
                ?>
		    <div class="xui xui--left" style="margin-left:4px;height:32px;">
                    <input type="text"
                           value="<?php echo $search_value; ?>"
                           name="search"
                           class="xui-form-text"
                           style="width:196px;display:inline-block;position:relative;float:left;"
                           size="32"
			   placeholder="<?php $this->eLanguage("search"); ?>"></input>
			<span class="xui-form-text-button-group xui-form-text-button-group--right"><button class="xui-form-text-button-icon" type="submit" name="submit_search" onclick="$('#submit_search').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="material-icons">search</i></button>
			<button class="xui-form-text-button-icon" type="button" name="search_reset" onclick="clearSearch(this,'search');"><i class="material-icons">close</i></button>
			</span>
 		    </div>
                <?php
        }
          

        echo "</div>";
 	echo "<div class=\"span6\">";
 	                        
        foreach (array_reverse($this->tableSelect,true) as $key => $value) {
            if ($value) {
                ?>
		    <div class="pull-right" style="margin-right:6px;">
                    <select name="view_select_<?php echo $key; ?>"
                            size="1"
                            onChange="this.form.submit();"
                            class="xui-form-select"><?php
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

        echo "</div>";
?>
<div class="xui-content" id="table-content">

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover <?php echo $compactView; ?>" id="com_table">
	<thead>
                <?php
                foreach ($this->tableHead as $key => $value) {

	                if ($key === "#") {
	                    echo "<th style=\"vertical-align:middle;width:32px;padding-top:0px;padding-bottom:4px;height:32px;\">";
			}else{
	                    echo "<th style=\"vertical-align:middle;\">";
			}


                    if ($key === "#") {
                        echo "<div class=\"xui-form-checkbox\"><input type=\"checkbox\" name=\"id_0\" id=\"id_0\" value=\"0\" onchange=\"setCheckboxState(this);\" onclick=\"setCheckboxState(this);\"></input><label for=\"id_0\" style=\"margin-bottom: 0px;\"></label></div>";
                    } else
		   if (array_key_exists($key, $this->tableType)) {
                    
				if ($this->tableType[$key][0]=="order") {
					if (array_key_exists($key, $this->tableSort)){

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
		                        $this->eLanguage($value);
					echo "</a>";

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
					echo $sort_img[$sort_value[$key]];	
					echo "</a>";

					}else{
						$this->eLanguage($value);
					};

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"doOrderSave('" . $key . "');return false;\">";
					echo "<i class=\"fa fa-floppy-o pull-right\" style=\"color:#999;font-size:1.3em;\"></i>";
					echo "</a>";


				}else
				if ($this->tableType[$key][0]=="value") {

					if (array_key_exists($key, $this->tableSort)){

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
		                        $this->eLanguage($value);
					echo "</a>";

					echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
					echo $sort_img[$sort_value[$key]];	
					echo "</a>";
			

					}else{
						$this->eLanguage($value);

					};

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"doValueSave('" . $key . "');return false;\">";
					echo "<i class=\"fa fa-floppy-o pull-right\" style=\"color:#999;font-size:1.3em;\"></i>";
					echo "</a>";


				}else{

					if (array_key_exists($key, $this->tableSort)){

						echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
			                        $this->eLanguage($value);
						echo $sort_img[$sort_value[$key]];	
						echo "</a>";

					}else{
			                        $this->eLanguage($value);
					};

				};
		}else{
					if (array_key_exists($key, $this->tableSort)){

						echo "<a href=\"#\" style=\"text-decoration:none;color:#000;\" onclick=\"$('#sort_x_" . $sort_value_next[$key] . "_" . $key . "').val('".$sort_value_next[$key]."');$('#".$this->getFormName()."').submit();return false;\">";
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

			if ($key_ === "#") {
				echo "<td style=\"vertical-align:middle;width:32px;padding-top:0px;padding-bottom:4px;height:32px;\">";
			}else{
				echo "<td style=\"vertical-align:middle;\">";
			};
                    if ($key_ === "#") {
				++$recordId;
				if($value["@write"]){
	                        	echo "<div class=\"xui-form-checkbox\"><input type=\"checkbox\" id=\"cbox_" . $recordId . "\"  name=\"id_" . $value[$this->primaryKey] . "\" value=\"" . $value[$this->primaryKey] . "\" ></input><label for=\"cbox_" . $recordId . "\" style=\"margin-bottom: 0px;\"></label></div>";
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
							0=>$this->tableType[$key_][1]["on"][0],
							1=>$this->tableType[$key_][1]["on"][1]
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>$this->tableType[$key_][1]["off"][0],
							1=>$this->tableType[$key_][1]["off"][1]
						);
					};
				};

				if($value["@write"]){

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"doToggle('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\">";
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
							0=>$this->tableType[$key_][1]["on"][0],
							1=>$this->tableType[$key_][1]["on"][1]                 
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>$this->tableType[$key_][1]["off"][0],
							1=>$this->tableType[$key_][1]["off"][1]
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
							0=>$this->tableType[$key_][1]["on"][0],
							1=>$this->tableType[$key_][1]["on"][1]                 
						);									
					};
					if(array_key_exists("off",$this->tableType[$key_][1])){
						$toggle_off_img_=array(
							0=>$this->tableType[$key_][1]["off"][0],
							1=>$this->tableType[$key_][1]["off"][1]
						);
					};
				};

				if($value["@write"]){

					echo "<a href=\"#\" style=\"text-decoration:none;\" onclick=\"doRadio('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\">";
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
						echo "<button type=\"button\" class=\"btn btn-default\" onclick=\"doOrderUp('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\"><i class=\"fa fa-chevron-up\"></i></button>";
						echo "<button type=\"button\" class=\"btn btn-default\" onclick=\"doOrderDown('" . $value[$this->primaryKey] . "','" . $key_ . "');return false;\"><i class=\"fa fa-chevron-down\"></i></button>";
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
				if(count($this->tableType[$key_])>0){
					$format=$this->tableType[$key_][1];
				}else{
					$format=$this->cloud->$this->cloud->get("locale_date_format","");
				};
				if($format=="Y-m-d"){
					echo substr($value[$key_],0,4)."-".substr($value[$key_],5,2)."-".substr($value[$key_],8,2); 
				}else
				if($format=="Y/m/d"){
					echo substr($value[$key_],0,4)."/".substr($value[$key_],5,2)."/".substr($value[$key_],8,2); 
				}else
				if($format=="d-m-Y"){
					echo substr($value[$key_],8,2)."-".substr($value[$key_],5,2)."-".substr($value[$key_],0,4); 
				}else
				if($format=="d/m/Y"){
					echo substr($value[$key_],8,2)."/".substr($value[$key_],5,2)."/".substr($value[$key_],0,4); 
				}else{
					echo $value[$key_];
				};				
			}else
			if($this->tableType[$key_][0]=="datetime"){
				if(count($this->tableType[$key_])>0){
					$format=$this->tableType[$key_][1];
				}else{
					$format=$this->cloud->$this->cloud->get("locale_date_format","");
				};
				if($format=="Y-m-d"){
					echo substr($value[$key_],0,4)."-".substr($value[$key_],5,2)."-".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
				}else
				if($format=="Y/m/d"){
					echo substr($value[$key_],0,4)."/".substr($value[$key_],5,2)."/".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
				}else
				if($format=="d-m-Y"){
					echo substr($value[$key_],8,2)."-".substr($value[$key_],5,2)."-".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
				}else
				if($format=="d/m/Y"){
					echo substr($value[$key_],8,2)."/".substr($value[$key_],5,2)."/".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
				}else{
					echo $value[$key_];
				};				
			}else
			if($this->tableType[$key_][0]=="action"){
                                $valueX=$value[$key_];

				if(count($this->tableType[$key_])>=3){
					if($this->tableType[$key_][2]=="datetime"){
						if(count($this->tableType[$key_])>=4){
							$format=$this->tableType[$key_][3];
						}else{
							$format=$this->cloud->$this->cloud->get("locale_date_format","");
						};
						if($format=="Y-m-d"){
							$valueX=substr($value[$key_],0,4)."-".substr($value[$key_],5,2)."-".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
						}else
						if($format=="Y/m/d"){
							$valueX=substr($value[$key_],0,4)."/".substr($value[$key_],5,2)."/".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
						}else
						if($format=="d-m-Y"){
							$valueX=substr($value[$key_],8,2)."-".substr($value[$key_],5,2)."-".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
						}else
						if($format=="d/m/Y"){
							$valueX=substr($value[$key_],8,2)."/".substr($value[$key_],5,2)."/".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
						}else{
							//
						};				
					};
				};


				if($value["@write"]){
					$parameters = array();
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
								$parameters[$k]=$value[$v[0]];
			                            }else{
								$p.="'".addcslashes(rawurlencode($k), "\\\'\"&\n\r<>")."'";
								$p.=":";
								$p.="'".addcslashes(rawurlencode($v), "\\\'\"&\n\r<>")."'";									
								$parameters[$k]=$v;
							}
                        		}
					$p .= "}";
		                        echo "<a href=\"".$this->requestUriThis($parameters)."\" onclick=\"callActionLink_".$key_."(".$p.");return false;\">" . $valueX . "</a>";
				}else{
					echo $valueX;
				};				
			}else
			if($this->tableType[$key_][0]=="cmd-edit"){
			        $valueX=$value[$key_];
				if(count($this->tableType[$key_])>=2){
					if($this->tableType[$key_][1]=="datetime"){
						if(count($this->tableType[$key_])>=3){
							$format=$this->tableType[$key_][2];
						}else{
							$format=$this->cloud->$this->cloud->get("locale_date_format","");
						};
						if($format=="Y-m-d"){
							$valueX=substr($value[$key_],0,4)."-".substr($value[$key_],5,2)."-".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
						}else
						if($format=="Y/m/d"){
							$valueX=substr($value[$key_],0,4)."/".substr($value[$key_],5,2)."/".substr($value[$key_],8,2)." ".substr($value[$key_],9); 
						}else
						if($format=="d-m-Y"){
							$valueX=substr($value[$key_],8,2)."-".substr($value[$key_],5,2)."-".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
						}else
						if($format=="d/m/Y"){
							$valueX=substr($value[$key_],8,2)."/".substr($value[$key_],5,2)."/".substr($value[$key_],0,4)." ".substr($value[$key_],9); 
						}else{
							//
						};				
					};
				};

				if($value["@write"]){
		                        echo "<a href=\"".$this->requestUriThis(array("action"=>"form-edit","primary_key_value"=>$value[$this->primaryKey]))."\" onclick=\"cmdDialogEdit('".$value[$this->primaryKey]."');return false;\">" . $valueX . "</a>";
				}else{
					echo $valueX;
				};
			}else
			if($this->tableType[$key_][0]=="custom"){
					$this->viewKey=$key_;
					$this->viewId=$key;
					$this->viewValue=$value[$key_];
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

</div>
<div class="xui-table-toolbar-bottom">
        <div style="margin-left:4px;margin-right:4px">
	<div class="row-fluid">
	<div class="span12">

	<div class="xui xui--left">

		<span class="xui-form-text-button-group xui-form-text-button-group--left">
		<button type="button" class="xui-form-text-button-icon" onclick="$('#go_first').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="material-icons">first_page</i></button>
		<button type="button" class="xui-form-text-button-icon" onclick="$('#go_previous').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="material-icons">chevron_left</i></button>
		</span>
        	<input type="text"
	               value="<?php echo $page; ?>"
        	       name="page"
	               size="4"
        	       class="xui-form-text"
                       style="width:64px;display:inline-block;position:relative;float:left;" ></input>
		<span class="xui-form-text-button-group xui-form-text-button-group--right">
		<button type="button" class="xui-form-text-button-icon" onclick="$('#go_next').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="material-icons">chevron_right</i></button>
		<button type="button" class="xui-form-text-button-icon" onclick="$('#go_last').val(1);$('#<?php $this->eFormName(); ?>').submit();return false;"><i class="material-icons">last_page</i></button>
		</span>

	</div>

	<div class="pull-left" style="margin-left:6px;">
        <select name="count"
                size="1"
                onChange="this.form.submit();"
                class="xui-form-select" data-width="auto">

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
	<span style="position:relative;font-family:'Roboto', sans-serif;font-size: 16px;line-height: 20px;font-weight: normal;">
	items <span style="color: #999;"> - </span> <?php echo $page_count; ?> pages <span style="color: #999;"> - </span> <?php echo $nr_items; ?> total items
	</span>
	</div>

        </div>
	</div>
	</div>
</div> 
</div>       

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


	if($has_search){
                ?>
                    <input type="hidden" name="submit_search" value="" id="submit_search" />
                    <input type="hidden" name="search_reset" value="" id="search_reset" />
                <?php
	};
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

	$this->setHtmlJsSource(
		"$(\"#com_table\").stickyTableHeaders({scrollableArea:$(\"#table-content\")});"
	,"load");

	
	$this->setHtmlJsSource(
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
		$this->setHtmlJsSource(
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
		$this->setHtmlJsSource(
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


