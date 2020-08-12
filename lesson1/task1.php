<?php

class MyStack
{
   public $brackets = ['{','[','(','}',']',')'];
   public $existingOpenBrackets = ['}'=>'{',']'=>'[',')'=>'('];
   public $existingCloseBrackets = ['}',']',')'];

   public $string = '"([ошибка)"';
	public $stack = [];
   public $limit;
   public $result;
   public $arrayOpenBrackets =[];
   public $array=[];

	public function __construct($limit = 20)
	{
      $this->limit = $limit;
      $this->stack = str_split($this->string);
      $this->result = current($this->stack);
	}

	//push
	public function push($element)
	{
		if (count($this->stack) < $this->limit) {
			array_unshift($this->stack, $element);
		} else {
			throw  new RuntimeException('Стек переполнен');
		}

	}

	//pop
	public function pop()
	{
		if (!empty($this->stack)) {
			return array_shift($this->stack);
		}
		throw new RuntimeException('Стек пустой');

	}

	//top
	public function top() {
		return reset($this->stack);
   }
   
   public function isCloseBrackets()
   {
      return in_array(current($this->stack), $this->existingCloseBrackets);
   }

   public function checkBrackets()
   {
      if(empty($this->array)){
         if($this->isCloseBrackets()){
            $this->result = false;
            return array_unshift($this->array, current($this->stack));
         }
         return array_unshift($this->array, current($this->stack));
      }


      if(!empty($this->array)){
         if($this->isCloseBrackets()){
            if ($this->isBracketsAreCouple()){
               return array_shift($this->array);
            }
         }
         return array_unshift($this->array, current($this->stack));
      } 
   }


   public function isBracket()
   {
      $curr = current($this->stack);
      return in_array(next($this->stack), $this->brackets);
   }

   public function ifBracketIsText()
   {
      $current = current($this->stack);
      if ($current == '"'){
         if($this->isBracket()){
            if(next($this->stack) == '"'){
               return true;
            }
         }
      }
      return false;
   }

   
   public function isBracketsAreCouple()
   {
      $openBracket = $this->existingOpenBrackets[current($this->stack)];
      return reset($this->array) == $openBracket;
   }

public function check(){
      while($this->result){
         if (!$this->ifBracketIsText()){
            if (in_array(current($this->stack), $this->brackets)){
               $this->checkBrackets();
            }
         }
         $this->result = next($this->stack);
      }
      if (empty($this->array)){
         echo 'все скобки на месте';
         return;
      }
      echo 'ошибка';
   }
}

$stack = new MyStack();
$stack->check();