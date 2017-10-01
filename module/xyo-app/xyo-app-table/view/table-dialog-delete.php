<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$count=0;
if(count($this->tableDelete)==0){
	$this->tableDelete=$this->tableHead;
};

?>
<div class="xyo-app-table__responsive">
    <table id="xyo-app-table__table" class="xyo-app-table__table_delete">
	<thead>
                <?php
                foreach ($this->tableDelete as $key => $value) {
			if(!$value){
				continue;
			};
			if($key==="#"){
				continue;
			};
			echo "<th style=\"vertical-align:middle;\">";
				$this->eLanguage($this->tableHead[$key]);
			echo "</th>";
                };

                ?>
	</thead>
        <tbody>
            <?php
            foreach ($this->viewData as $key => $value) {
		++$count;
		if($count>10){
			continue;
		};

                echo "<tr>";
                foreach ($this->tableDelete as $key_ => $value_) {
			if(!$value){
				continue;
			};
			if($key_==="#"){
				continue;
			};
			echo "<td style=\"vertical-align:middle;\">";
				echo $value[$key_];		
			echo "</td>";
                };
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php 

if($count>10){
	$this->eLanguage("delete_this_and_many_more");
};

