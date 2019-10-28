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
		<div class="xui grid -col12 -x<?php echo $k; ?> -bg-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col12 -x<?php echo (12-$k); ?> -bg-sky-blue-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col12 -x12 -bg-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 10
</div>
<div class="xui grid">
	<?php for($k=1;$k<10;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col10 -x<?php echo $k; ?> -bg-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col10 -x<?php echo (10-$k); ?> -bg-sky-blue-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col10 -x10 -bg-aqua-1" style="height:40px;"></div>
	</div>
</div>

<div class="xui text -label-40">
	Grid - 8
</div>
<div class="xui grid">
	<?php for($k=1;$k<8;++$k){ ?>
	<div class="xui grid -row">
		<div class="xui grid -col8 -x<?php echo $k; ?> -bg-aqua-1" style="height:40px;"></div>
		<div class="xui grid -col8 -x<?php echo (8-$k); ?> -bg-sky-blue-2" style="height:40px;"></div>
	</div>
	<?php }; ?>
	<div class="xui grid -row">
		<div class="xui grid -col8 -x8 -bg-aqua-1" style="height:40px;"></div>
	</div>

</div>
	
<div class="xui separator"></div>
