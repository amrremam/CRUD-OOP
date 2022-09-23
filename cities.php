<?php include('header.php'); ?>
<?php  $page_active = "cities"; ?>
<?php include('nav.php'); ?>
<body style="background-color: grey;"></body>



<?php

class Stack{

    public $item = 5;
    public $size = array();
    public $pointer = 0;

    public function puch($data){
        if($this->pointer = $this->item){
            echo"Stack is empty ya negm";
        }else{
            $this->size[$this->pointer] = $data;
            $this->pointer++;
        }
    }
    public function pop(){
        if(empty($this->size)){
            echo"array is empty";
        }else{
            array_pop($this->size);
        }
    }
}

$stack = new Stack();
$stack->puch(11);
echo"<br>";
$stack->puch(12);
echo"<br>";
$stack->puch(13);
echo"<br>";
$stack->puch(14);
echo"<br>";
$stack->puch(15);
echo"<br>";
$stack->puch(16);
echo"<br>";
$stack->puch(17);
echo"<br>";
$stack->pop();



?>