<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>

<div style="padding:32px;">
<div style="width:320px;position:relative;display:block;">

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<table class="xui-table xui-table_<?php echo $key; ?>">
	<thead>
		<tr>
			<th>Firstname</th>
			<th>Lastname</th> 
			<th>Age</th>
		</tr>
	</thead>
<tbody>
	<tr>
		<td>Bryan</td>
		<td>Pineda</td> 
		<td>25</td>
	</tr>
	<tr>
		<td>Alejandra</td>
		<td>Warren</td> 
		<td>22</td>
	</tr>
	<tr>
		<td>Ruthie</td>
		<td>Mattera</td> 
		<td>32</td>
	</tr>
	<tr>
		<td>Hailey</td>
		<td>Berke</td> 
		<td>34</td>
	</tr>
	<tr>
		<td>Milo</td>
		<td>Tarnowski</td> 
		<td>42</td>
	</tr>
</tbody>
</table>
<br />
<?php }; ?>

</div>
</div>