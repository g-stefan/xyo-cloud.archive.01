<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Table - <?php echo ucfirst($context); ?>
</div>

<table class="xui table -<?php echo $context; ?>">
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

<?php }; ?>
	