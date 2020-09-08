<?php

$resultArr = [];
$increment = 0;
$numbers = file_get_contents('chisla.txt');
$arr = explode("\n", $numbers);
$fisrtNum = str_split($arr[0]);
$secondNum = str_split($arr[1]);
$firstNumRev = array_reverse($fisrtNum);
$secondNumRev = array_reverse($secondNum);

$length = count($fisrtNum);

if ($length < count($secondNum)){
   $length = count($secondNum);
}
for ($i=0; $i < $length; $i++){
   $tempNum = $firstNumRev[$i] + $secondNumRev[$i];
   $num = $tempNum % 10 + $increment;
   $resultArr[] = $num;
      $increment = 0;
   if($tempNum > 9){
      $increment = 1;
   }
}
$resultArr = array_reverse($resultArr);
$answer = implode($resultArr);
$numbers .= "\n" . $answer;
file_put_contents('chisla.txt', $numbers);