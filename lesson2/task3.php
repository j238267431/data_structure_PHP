<?php



class Spiral
{
   public $arr = [];
   public $currentFigure = 1;
   public $totalFigures;
   public $currentRow = 1;
   public $secondFigure;
   public $currentCol=3;
   public $k = 0;
   public $direction = 'down';
   public $rows;
   public $cols;
   public $initRows;
   public $initCols;
   public $rightK = 1;
   public $upK = 1;


   public function directionSwitcher()
   {
      switch($this->direction){
         case 'down';
         $this->direction = 'right';
      break;
         case 'right';
         $this->direction = 'up';
      break;
         case 'up';
         $this->direction = 'left';
      break;
         case 'left';
         $this->direction = 'down';
      break;

      }
   
   }

   public function downDirection()
   {
      $rowTotal = $this->rows;
      $currentRow = 0;
      $flag = false;
      if($this->arr){
         $flag = true;
      }
      while ($rowTotal > $currentRow){
         if($flag){
            if (count($this->arr[$currentRow]) == $this->initCols){
               $currentRow++;
               continue;           
            }
         }
         if ($flag){
            array_splice($this->arr[$currentRow], $this->initRows - $this->rows, 0, $this->currentFigure);
            $currentRow++;
            $this->currentFigure++;
            continue;
         } 
         $this->arr[$currentRow][] = $this->currentFigure;
         $currentRow++;
         $this->currentFigure++;

      }         
      $this->cols--;
   }
   public function rightDirection()
   {
      
      $colTotal = $this->cols;
      $currentCol = 0;
      $flag = false;
      // if (count($this->arr[$this->initRows - 1]) == $this->initRows){
         if (count($this->arr[array_key_last($this->arr)]) == $this->initCols){
         $flag = true;
         $colTotal--;
         $this->rightK++;
      }
         while (count($this->arr[$this->rows - 1]) != $this->initCols) {
         if ($flag){
            array_splice($this->arr[$this->rows - 1], $currentCol + $this->rightK, 0, $this->currentFigure);
            $currentCol++;
            $this->currentFigure++;
            continue;
         }
         $this->arr[$this->rows - 1][] = $this->currentFigure;
         $currentCol++;
         $this->currentFigure++;
      }
      $this->rows--;
   }

   public function upDirection()
   {
      $rowTotal = $this->rows - 1;
      $currentRow = 0;
      $flag = false;
   if(count($this->arr[$rowTotal]) > 2){
      $flag = true;
      $rowTotal--;
      $this->upK++;
   }

      while ($rowTotal >= $currentRow){
         if ($flag){
            if(count($this->arr[$rowTotal + 1]) == $this->initCols){
               $rowTotal--;
               continue;
            }
            array_splice($this->arr[$rowTotal + 1], $this->upK, 0, $this->currentFigure);
            $rowTotal--;
            $this->currentFigure++;
            continue;

         }
         $this->arr[$rowTotal][] = $this->currentFigure;
         $rowTotal--;
         $this->currentFigure++;
      }
   }

   public function leftDirection()
   {
      $colTotal = $this->cols;
      $currentCol = 0;
      $arr = [];
      
      $this->k++;
      while ($colTotal - $this->k > $currentCol){
         array_unshift($arr, $this->currentFigure);
         $colTotal--;
         $this->currentFigure++;
      }
      array_splice($this->arr[$this->initCols - $this->cols - 1], $this->initCols - $this->cols,0, $arr);
   }


   public function getSpiral($cols, $rows)
   {

      $this->totalFigures = $cols * $rows;
      $this->cols = $cols;
      $this->rows = $rows;
      $this->initCols = $cols;
      $this->initRows = $rows;

      while ($this->currentFigure <= $this->totalFigures){
         if ($this->direction == 'down'){
            $this->downDirection();
            $this->directionSwitcher();
            if ($this->currentFigure > $this->totalFigures){
               continue;
            }
         }
         if ($this->direction == 'right'){
            $this->rightDirection();
            $this->directionSwitcher();
            if ($this->currentFigure > $this->totalFigures){
               continue;
            }
         }
         if ($this->direction == 'up'){
            $this->upDirection();
            $this->directionSwitcher();
            if ($this->currentFigure > $this->totalFigures){
               continue;
            }
         }
         if ($this->direction == 'left'){
            $this->leftDirection();
            $this->directionSwitcher();
            if ($this->currentFigure > $this->totalFigures){
               continue;
            }
         }
      }
   }
              
}
$spiral = new Spiral;
$spiral->getSpiral(3, 10);
// var_dump($spiral->arr);

$table = '<table>';
foreach($spiral->arr as $val){
   $table .= '<tr>';
   foreach ($val as $item){
      $table .= '<td  style="width: 25px; height: 25px; text-align: center" >' . $item . '</td>';
   }
   $table .= '</tr>';
}
echo $table . '</table>';


