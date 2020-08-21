<?php

// f(n) = O(n*log(n)) 
// 15 0000 итераций
$n = 10000;
$array[]= [];
$count=0;

   for ($i = 0; $i < $n; $i++) {
      for ($j = 1; $j < $n; $j *= 2) {
         $array[$i][$j]= true;
   } 
}

// f(n) = O(n^m) 
// 25 010 000 итераций
$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) {
   for ($j = $i; $j < $n; $j++) {
      $array[$i][$j]= true;
   } 
}

