<?php
$arr = [[1,2,3,4,5], [6,7,8,9,3], [5,6,4,3,2], [5,6,7,8,9]];

echo getSum($arr);

function getSum($arr)
{
   if (count($arr) == 1){
      $answer = implode($arr[0]);
      return $answer;
   }
   $increment = 0;
   foreach ($arr as $key => $value){
      if ($key > 0) {
         array_push($arr[$key], 0);
      }
   }
   $arr1 = $arr[0];
   $arr2 = $arr[1];
   $arr_tot = [];
   for ($i = count($arr2) - 1; $i >= 0; $i--){
      $num = $arr1[$i-1] + $arr2[$i] + $increment;
      if ($num > 9){
         $increment = 1;
      } else {
         $increment = 0;
      }
      $digit = $num % 10;
      $arr_tot[] =  $digit;
   }
   array_shift($arr);
   array_shift($arr);
   array_unshift($arr, array_reverse($arr_tot));
   return getSum($arr);

}