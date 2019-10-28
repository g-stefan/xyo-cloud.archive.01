<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Color";

class xui_Color extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
	}

	function toHex($value) {
		return strtoupper(str_pad(dechex($value), 2, "0", STR_PAD_LEFT));
	}

	public function hueToColor($m1, $m2, $h){
		if($h<0){
			$h=$h+1;
		};
		if($h>1){
			$h=$h-1;
		};
		if($h*6<1){
			return $m1+($m2-$m1)*$h*6;
		};
		if($h*2<1){
			return $m2;
		};
		if($h*3<2){
			return $m1+($m2-$m1)*(2/3-$h)*6;
		};
		return $m1;
	}

	public function hslXToRGBHex($hsl){
		return $this->hslToRGBHex($hsl[0], $hsl[1], $hsl[2]);
	}

	public function hslToRGBHex($h, $s, $l){

		while($h>360){
			$h-=360;
		};
		while($h<0){
			$h+=360;
		};

		if($l>100){
			$l=100;
		};
		if($l<0){
			$l=0;
		};

		if($s>100){
			$s=100;
		};
		if($s<0){
			$s=0;
		};


		$h=$h/360;
		$l=$l/100;
		$s=$s/100;

		$m2=0;
		if($l<=0.5){
			$m2=$l*($s+1);
		}else{
			$m2=$l+$s-$l*$s;
		};
		$m1=$l*2-$m2;

		$r=round($this->hueToColor($m1, $m2, $h+1/3)*255);
		$g=round($this->hueToColor($m1, $m2, $h)*255);
		$b=round($this->hueToColor($m1, $m2, $h-1/3)*255);

		return "#".$this->toHex($r).$this->toHex($g).$this->toHex($b);
	}

	public function rgbHexToHSL($hex){
		$r=hexdec($hex[1].$hex[2])/255;
		$g=hexdec($hex[3].$hex[4])/255;
		$b=hexdec($hex[5].$hex[6])/255;

		$min=min($r, $g, $b);
		$max=max($r, $g, $b);

		$l=round((($max+$min)/2)*100,2);
		$h=0;
		$s=0;
		
		if($max==$min){
			return array(0,0, $l);
		}

		$max_min=$max-$min;

		if($l<=50){
			$s=($max_min)/($max+$min);
		}else{
			$s=($max_min)/(2.0-$max-$min);
		}

		$s=round($s*100,2);

		if($r==$max){
			$h=($g-$b)/($max_min);
			$h=round($h*60,2);
			if($h<0){
				$h+=360;
			};
			return array($h,$s,$l);
		};

		if($g==$max){
			$h=2.0+($b-$r)/($max_min);
			$h=round($h*60,2);
			if($h<0){
				$h+=360;
			};
			return array($h,$s,$l);
		};

		$h=4.0+($r-$g)/($max_min);
		$h=round($h*60,2);
		if($h<0){
			$h+=360;
		};
		return array($h,$s,$l);
	}

	public function rgbHexHSLAdjustH($hex, $h_){
		list($h,$s,$l)=$this->rgbHexToHSL($hex);
		$h+=$h_;
		return $this->hslToRGBHex($h,$s,$l);
	}

	public function rgbHexHSLAdjustS($hex, $s_){
		list($h,$s,$l)=$this->rgbHexToHSL($hex);
		$s+=$s_;
		return $this->hslToRGBHex($h,$s,$l);
	}

	public function rgbHexHSLAdjustL($hex, $l_){
		list($h,$s,$l)=$this->rgbHexToHSL($hex);
		$l+=$l_;
		return $this->hslToRGBHex($h,$s,$l);
	}

        public function rgbHexBlend($rgbHex1,$rgbHex2,$alphaHex){
		$r1=hexdec($rgbHex1[1].$rgbHex1[2]);
		$g1=hexdec($rgbHex1[3].$rgbHex1[4]);
		$b1=hexdec($rgbHex1[5].$rgbHex1[6]);

		$r2=hexdec($rgbHex2[1].$rgbHex2[2]);
		$g2=hexdec($rgbHex2[3].$rgbHex2[4]);
		$b2=hexdec($rgbHex2[5].$rgbHex2[6]);

		$alpha=hexdec($alphaHex);

		$r=floor(($r1*(255-$alpha)+$r2*$alpha)/255);
		$g=floor(($g1*(255-$alpha)+$g2*$alpha)/255);
		$b=floor(($b1*(255-$alpha)+$b2*$alpha)/255);

		return "#".$this->toHex($r).$this->toHex($g).$this->toHex($b);
	}

	public function rgbHexToRGBA($hex,$alpha){
		return "rgba(".hexdec($hex[1].$hex[2]).",".hexdec($hex[3].$hex[4]).",".hexdec($hex[5].$hex[6]).",".number_format(hexdec($alpha[0].$alpha[1])/255,4,".","").")";
	}

	public function rgbHexToY($hex,$scale=255){
		$r=hexdec($hex[1].$hex[2])/255;
		$g=hexdec($hex[3].$hex[4])/255;
		$b=hexdec($hex[5].$hex[6])/255;
		
		$y=(0.2126*$r) + (0.7152*$g) + (0.0722*$b);

		return	floor($scale*$y);
	}

	public function rgbHexContrastBlackOrWhite($hex,$delta=60){
		$y=$this->rgbHexToY($hex,100);
		if($y>=$delta){
			return "#000000";
		};
		return "#FFFFFF";
	}
	
}
