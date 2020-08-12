<?php

$start = microtime(true);
$before = memory_get_usage();
$count = 600851475143;
$stack = new SplStack();

for ($i=2; $i < sqrt($count)/2; $i++){

   if ($count%$i == 0){
    $flag = true;
    $it = sqrt($i);
      for($s = 2; $s < $it; $s++){
         if($i%$s == 0){
            $flag = false;
            $s=$i;
         }
      }  
      if ($flag){
         $stack->push($i); 
      }
   }
}

var_dump($stack);

echo microtime(true) - $start;
echo PHP_EOL;
echo memory_get_usage() - $before;
echo PHP_EOL;