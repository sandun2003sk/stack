<?php


class Queue {
	private $_size;
	private $_queue = [];


	public function __construct($size) {
		$this->_size = $size;
	}


	public function push($n) {
		if (count($this->_queue) >= $this->_size) {
			echo $n ."\n";
			return false;
		}
		$this->_queue[] = $n;
		echo $n ."\n";
		return true;
	}

    public function allocate($newSize) {
        
        if ($newSize < count($this->_queue)) {
            
            $this->_queue = array_slice($this->_queue, 0, $newSize);
        }
        $this->_size = $newSize;
    }

    public function capacity() {

        return $this->_size;
    }

	public function pop() {
		if(empty($this->_queue)){
			
			return false;
			
		}
		return array_pop($this->_queue);
	}

    public function isEmpty() {

        if (empty($this->_queue)) {
			
        return false;
    
        }
        return empty($this->_queue);
    }

    public function size() {
        return count($this->_queue);
    }

    public function peek() {
        if (empty($this->_queue)) {
            return false;
        }
        return end($this->_queue);
    }

    public function toArray() {

        return $this->_queue;
    }

    public function copy(){
        $newqueue =new Queue($this->_size);
        foreach ($this->_queue as $q){
            $newqueue->push($q);
        }
        return $newqueue;

    }

    public function clear(){

        $this->_queue = [];

    }


    
    
}



$s = new queue(10);
echo "capacity:" . $s->capacity(). "\n";

for ($i = 1; $i < 10; $i++) {
	$s->push($i);
}

$s1 = $s->copy();

echo "peek: " .$s1->peek(). "\n";
echo "Pop: " .$s1->pop(). "\n";
echo "isEmpty: " .$s1->isEmpty(). "\n";
echo "Size: " . $s1->size() . "\n";

$s1->allocate(5);
echo "allocate: " . $s1->size() . "\n";

print_r($s1->toArray());

echo "clear: " .$s1->clear(). "\n";

while (($val = $s1->pop()) != null) {
	echo $val . "\n";

}



