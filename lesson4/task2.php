<?php

$num = 2;
$pow = 500;

function binpow ($num, $pow) {
	if ($pow == 0)
		return 1;
	if ($pow % 2 == 1)
		return binpow ($num, $pow-1) * $num;
	else {
		$b = binpow ($num, $pow/2);
      // return $b * $b;
      if(($b * $b) < 1){
         return $b * $b;
      }
      return mult($b);
	}
}
file_put_contents('otvet.txt', binpow($num, $pow));
// echo binpow($num, $pow);

function mult($num)
{
   $count = 0;
   $arr = str_split($num);
   $increment = 0;
   for ($i = count($arr) - 1; $i >= 0; $i--){
      for($j = count($arr) - 1; $j >= 0; $j--){
         $tempNum = $arr[$i] * $arr[$j] + $increment;
         if ($tempNum > 9) {
            $arr1[$count][] = $tempNum%10;
            $increment = intval($tempNum/10);
            if ($j == 0){
               $arr1[$count][] = $increment;
            }
         } else {
            $arr1[$count][] = $tempNum;
            $increment = 0;
            if ($j == 0 && $increment > 0){
               $arr1[$count][] = $increment;
            }
         }
      }
      $increment = 0;
      $count++;
   }
   return getSum($arr1);
}

function getSum($arr)
{
   if (count($arr) == 1){
      $answer = implode(array_reverse($arr[0]));
      return $answer;
   }
   $increment = 0;
   foreach ($arr as $key => $value){
      if ($key > 0) {
         array_unshift($arr[$key], 0);
      }
   }
   $arr1 = $arr[0];
   $arr2 = $arr[1];
   $lenght = count($arr1);
   if(count($arr1) < count($arr2)){
      $lenght = count($arr2);
   }
   $arr_tot = [];
   for ($i = 0; $i < $lenght; $i++){
      $num = $arr1[$i] + $arr2[$i] + $increment;
      if ($num > 9){
         $increment = 1;
      } else {
         $increment = 0;
      }
      $digit = $num % 10;
      if($i == ($lenght - 1) && $num > 9){
         $arr_tot[] =  $num%10;
         $arr_tot[] =  intval($num/10);
      } else {
         $arr_tot[] =  $digit;
      }
      
   }
   array_shift($arr);
   array_shift($arr);
   array_unshift($arr, $arr_tot);
   return getSum($arr);

}