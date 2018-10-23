<?php
/*
 * Created by PhpStorm.
 * User: MAMI
 * Date: 7/4/2018
 * Time: 4:34 PM
 */
function unique_coupon_codes($number_of_codes, $exclude_codes_array='', $code_length = 8) {
	$characters = "0123456789QWERTYUIOPASDFGHJKLZXCVBNM";

	$unique_codes = array();
	for($i = 1 ; $i <= $number_of_codes; $i++) {
		$code = "IA";
		for ($j = 1; $j <= $code_length; $j++) {
			$code .= $characters[mt_rand(0, strlen($characters)-1)];
		}
		if(!in_array($code,$unique_codes)) {
			if(is_array($exclude_codes_array)) {
				if(!in_array($code,$exclude_codes_array)) {
					$unique_codes[$i] = $code;
				}
				else {
					$i--;
				}
			}
			else {
				$unique_codes[$i] = $code;
			}
		}
		else {
			$i--;
		}
	}
	return $unique_codes;
}
$file = 'TEST2.txt';
header('Content-type: text/plain');
header('Content-Disposition: attachment; filename='.$file);
header("Content-Type: application/force-download");

echo print_r(unique_coupon_codes(250,'',8));



