<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

echo "<div class=\"xyo-mod-toolbar\">";
if (count($this->toolbar)) {
    foreach ($this->toolbar as $item) {
	
	if($item["type"]=="item"){

	        $img = $item["img"];
        	if ($img) {
			if(strncmp($img,"#",1)==0){
				// icon
			        $img = substr($img,1);
				$img = "<i class=\"".$img." icon\"></i>";
			}else{
		            $img = "<img src=\"".$img."\"></img>";
			};
	        } else {
        	    $img = "<img src=\"media/sys/images/applications-other-32.png\"></img>";
	        };

		
		echo "<a class=\"thumbnail\" href=\"" . $item["url"] . "\">";
			echo $img;
			echo "<p class=\"caption\">";
			echo $item["title"];
			echo "</p>";
		echo "</a>";

		continue;	
	};

	if($item["type"]=="item-js"){

	        $img = $item["img"];
        	if ($img) {
			if(strncmp($img,"#",1)==0){
				// icon
			        $img = substr($img,1);
				$img = "<i class=\"".$img." icon\"></i>";
			}else{
		            $img = "<img src=\"".$img."\"></img>";
			};
	        } else {
        	    $img = "<img src=\"media/sys/images/applications-other-32.png\"></img>";
	        };

		
		echo "<a class=\"thumbnail\" href=\"#\" onclick=\"javascript:" . $item["parameters"] . "\">";
			echo $img;
			echo "<p class=\"caption\">";
			echo $item["title"];
			echo "</p>";
		echo "</a>";

		continue;
	};

	if ($item["type"] === "separator") {
		echo "<div class=\"separator\">";
		echo "</div>";
		continue;
	};

    }
}
echo "<div class=\"clearfix\"></div>";
echo "</div>";

