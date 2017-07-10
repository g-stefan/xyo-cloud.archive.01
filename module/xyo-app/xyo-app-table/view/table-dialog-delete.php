<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$count=0;

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed" id="com_table">
	<thead>
                <?php
                foreach ($this->tableHead as $key => $value) {
			if($key==="#"){
				continue;
			};
			echo "<th style=\"vertical-align:middle;\">";
				$this->eLanguage($value);
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
                foreach ($this->tableHead as $key_ => $value_) {
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

