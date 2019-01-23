<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Grid - 12
</div>
<div class="xui grid">
	<?php for($k=1;$k<12;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x<?php echo $k; ?>x12 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x<?php echo (12-$k); ?>x12 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x12x12 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 8
</div>
<div class="xui grid">
	<?php for($k=1;$k<8;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x<?php echo $k; ?>x8 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x<?php echo (8-$k); ?>x8 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x8x8 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 6
</div>
<div class="xui grid">
	<?php for($k=1;$k<6;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x<?php echo $k; ?>x6 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x<?php echo (6-$k); ?>x6 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x6x6 -bg-core-aqua-1" style="height:40px;"></div>
	</div>

</div>

<div class="xui text -label-40">
	Grid - 4
</div>
<div class="xui grid">
	<?php for($k=1;$k<4;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x<?php echo $k; ?>x4 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x<?php echo (4-$k); ?>x4 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x4x4 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
		Grid - 3
</div>
<div class="xui grid">
	<?php for($k=1;$k<3;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x<?php echo $k; ?>x3 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x<?php echo (3-$k); ?>x3 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col -x3x3 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 2
</div>
<div class="xui grid">
	<div class="xui grid -row">
		<div class="xui grid -col -x1x2 -bg-core-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col -x1x2 -bg-core-blue-jeans-2" style="height:40px;"></div>
	</div>
	<div class="xui grid -row">
		<div class="xui grid -col -x2x2 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 1
</div>
<div class="xui grid">
	<div class="xui grid -row">
		<div class="xui grid -col -x1x1 -bg-core-aqua-1" style="height:40px;"></div>
	</div>
</div>
	
<div class="xui separator"></div>
