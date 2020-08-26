<?php
$arr = [5,3,1,8,4,2,6,9];

var_dump(mergingSort($arr));

function mergingSort($arr)
{
   $count = count($arr);
   $base = $count / 2;

   if ($count <= 1){
      return $arr;
   }
   $left = array_slice($arr, 0, $base);
   $right = array_slice($arr, $base);
  
   $left = mergingSort($left);
   $right = mergingSort($right);

return merge($left, $right);


}
   
   function merge(array $left, array $right) {
      $newArr = [];
   for ($i = 0; $i < count($left); $i++){


   }
      return $newArr;
}

