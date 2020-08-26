<?php

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16];

findMissingNumber($arr);


function findMissingNumber($arr)
{
   if (count($arr) <= 2){
      $num = $arr[0] + 1;
      echo "the missing number is " . $num;
      return;
   }
   $base = floor(count($arr) / 2);
   $leftArr = array_slice($arr, 0, $base); 
   $rightArr = array_slice($arr, $base);


   $leftStart = 0;
   $leftEnd = count($leftArr) - 1;

   $rightStart = 0;
   $rightEnd = count($rightArr) - 1;

   $leftDen = ($leftEnd - $leftStart) / ($leftArr[$leftEnd] - $leftArr[$leftStart]);
   $rightDen = ($rightEnd - $rightStart) / ($rightArr[$rightEnd] - $rightArr[$rightStart]);


   if ($rightDen < $leftDen){
      $arr = $rightArr;
   } elseif($rightDen == $leftDen){
         echo "no missing digit in the array";
         return;
   } else {
      $arr = $leftArr; 
   }
   findMissingNumber($arr);
}


