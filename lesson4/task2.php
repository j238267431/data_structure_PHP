<?php

$num = 9;
$pow = 10;

function binpow ($num, $pow) {
	if ($pow == 0)
		return 1;
	if ($pow % 2 == 1)
		return binpow ($num, $pow-1) * $num;
	else {
		$b = binpow ($num, $pow/2);
      // return $b * $b;
      return mult($b);
	}
}
echo binpow($num, $pow);



function mult($num)
{
   $count = 0;
   $arr = str_split($num);
   for ($i = count($arr) - 1; $i >= 0; $i--){
      for($j = count($arr) - 1; $j >= 0; $j--){
         $arr1[$count] = $arr[$i] * $arr[$j];
      }
      $count++;
   }
   return
}