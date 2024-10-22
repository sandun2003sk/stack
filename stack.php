<?php


class Stack {
	private $_size;
	private $_stack = [];


	public function __construct($size) {
		$this->_size = $size;
	}


	public function push($n) {
		if (count($this->_stack) >= $this->_size) {
			echo $n ."\n";
			return false;
		}
		$this->_stack[] = $n;
		echo $n ."\n";
		return true;
	}


	public function pop() {
		if(empty($this->_stack)){
			
			return false;
			
		}
		return array_pop($this->_stack);
	}


	public function top() {

		if (empty($this->_stack)) {
			
            return false;

        }
		return end($this->_stack);
	}
}



$s1 = new Stack(10);


for ($i = 1; $i < 10; $i++) {
	$s1->push($i);
}


echo "Top: " .$s1->top(). "\n";
echo "Pop: " .$s1->pop(). "\n";

while (($val = $s1->pop()) != null) {
	echo $val . "\n";

}

