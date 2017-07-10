<?php
$item=$this->getArgument("item",array());

$active=false;
if(array_key_exists("active",$item)){
	$active=$item["active"];
};

if(array_key_exists("popup",$item)){
	if(count($item["popup"])){
		$on=false;
		if(array_key_exists("on",$item)){
			$on=$item["on"];
		};
		if($on){
			if($active){
				echo "<div class=\"xui popup active on\">";
			}else{
				echo "<div class=\"xui popup on\">";
			}
		}else{
			echo "<div class=\"xui popup off\">";
		};

		if($active){
			echo "<div class=\"xui action active effect-ripple toggle\" toggle=\"parent\">";
		}else{
			echo "<div class=\"xui action effect-ripple toggle\" toggle=\"parent\">";
		};

		echo "<div class=\"xui icon-left\">";
		if(array_key_exists("icon",$item)){
			echo $item["icon"];
		};
		echo "</div>";
		echo "<div class=\"xui text\">";
		if(array_key_exists("text",$item)){
			echo $item["text"];
		};
		echo "</div>";
		echo "<div class=\"xui icon-right\">";
			echo "<i class=\"material-icons\">chevron_right</i>";
		echo "</div>";
        
		echo "</div>";

		echo "<div class=\"xui next\">";
		$this->generateNavigationDrawerMenuView($item["popup"]);
		echo "</div>";

		echo "</div>";
		return;
	};	
};

$separator=false;
if(array_key_exists("separator",$item)){
	if($item["separator"]){
		echo "<div class=\"xui separator\">";
		echo "<div class=\"xui line\">";
		echo "</div>";
		echo "</div>";
		return;
	};
};
if(array_key_exists("url",$item)){

	if($active){
		echo "<a class=\"xui action active effect-ripple\" href=\"".$item["url"]."\">";
	}else{
		echo "<a class=\"xui action effect-ripple\" href=\"".$item["url"]."\">";
	};
	echo "<div class=\"xui icon-left\">";
	if(array_key_exists("icon",$item)){
		echo $item["icon"];
	};
	echo "</div>";
	echo "<div class=\"xui text\">";
	if(array_key_exists("text",$item)){
		echo $item["text"];
	};
	echo "</div>";
	echo "</a>";
	return;
};

if($active){
	echo "<div class=\"xui action active effect-ripple\">";
}else{
	echo "<div class=\"xui action effect-ripple\">";
};
echo "<div class=\"xui icon-left\">";
if(array_key_exists("icon",$item)){
	echo $item["icon"];
};
echo "</div>";
echo "<div class=\"xui text\">";
if(array_key_exists("text",$item)){
	echo $item["text"];
};
echo "</div>";
echo "</div>";

