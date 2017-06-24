<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$connection=$this->getElementValueStr("connection","db");

?>
            <select class="selectpicker" data-width="auto" name="<?php $this->eElementName("connection"); ?>" id="<?php $this->eElementId("connection"); ?>" >
            <?php
					$selectConnection=$this->getParameter("select_connection",array());
                    foreach ($selectConnection as $value) {
                        $selected = "";
                        if ($value === $connection) {
                            $selected = "selected=\"selected\" ";
                        }
                        echo "<option value=\"" . $value . "\" " . $selected . ">" . $value . "</option>";
                    }
            ?>
            </select>			
