<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

/**
 *
 * @author MinhVan
 */
function w_w($mc, $vc, $pc, $sc, $mm, $vm, $sm){
	if($mm != 0 && $sm != 0 && $vc != 0 ){
		return ($mc * $pc * $sm * $vm) / ($mm * $sc * $vc);
	}
	return false;
}

function g_l($w_w, $titrong){
	if ($titrong != 0) {
		return $w_w*$titrong*10;
	}
	return false;
}

function g_kg($w_w){
	return $w_w*10;
}

function w_v($w_w, $titrong){
	if ($titrong != 0) {
		return $w_w*$titrong;
	}
	return false;
}

function danh_gia_kq($donvi_dk, $hl_dk, $ketqua)
{
	if($donvi_dk == '%(w/w)' || $donvi_dk == '%(w/v)'){
		switch (TRUE) {
			case $hl_dk>50:
				if($ketqua >= ( $hl_dk - $hl_dk*0.025) AND  $ketqua <= ($hl_dk + $hl_dk*0.025) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>25 AND $hl_dk<= 50):
				if($ketqua >= ( $hl_dk - $hl_dk*0.05) AND  $ketqua <= ($hl_dk + $hl_dk*0.05) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>10 AND $hl_dk<= 25):
				if($ketqua >= ( $hl_dk - $hl_dk*0.06) AND  $ketqua <= ($hl_dk + $hl_dk*0.06) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>2.5 AND $hl_dk<= 10):
				if($ketqua >= ( $hl_dk - $hl_dk*0.1) AND  $ketqua <= ($hl_dk + $hl_dk*0.1) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>0 AND $hl_dk<= 2.5):
				if($ketqua >= ( $hl_dk - $hl_dk*0.15) AND  $ketqua <= ($hl_dk + $hl_dk*0.15) ){return 'Đạt';}else{return 'Không đạt';}				
				break;
		}
	}

	if($donvi_dk == 'g/l' || $donvi_dk == 'g/kg'){
		switch ($hl_dk) {
			case $hl_dk>500:
				if($ketqua >= ( $hl_dk - 25) AND  $ketqua <= ($hl_dk + 25) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>250 AND $hl_dk<= 500):
				if($ketqua >= ( $hl_dk - $hl_dk*0.05) AND  $ketqua <= ($hl_dk + $hl_dk*0.05) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>100 AND $hl_dk<= 250):
				if($ketqua >= ( $hl_dk - $hl_dk*0.06) AND  $ketqua <= ($hl_dk + $hl_dk*0.06) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>25 AND $hl_dk<= 100):
				if($ketqua >= ( $hl_dk - $hl_dk*0.1) AND  $ketqua <= ($hl_dk + $hl_dk*0.1) ){return 'Đạt';}else{return 'Không đạt';}
				break;
			case ($hl_dk>0 AND $hl_dk<= 25):
				if($ketqua >= ( $hl_dk - $hl_dk*0.15) AND  $ketqua <= ($hl_dk + $hl_dk*0.15) ){return 'Đạt';}else{return 'Không đạt';}				
				break;
		}
	}
	return 'Chưa đủ thông tin';
}

?>
