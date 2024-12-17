<?php
class Stack {
    private $stack;

    public function __construct() {
        $this->stack = [];
    }

    public function push($item) {
        array_push($this->stack, $item);
    }

    public function pop() {
        if ($this->isEmpty()) {
            return "empty stack";
        }
        return array_pop($this->stack);
    }

    public function peek() {
        if ($this->isEmpty()) {
            return "empty stack";
        }
        return end($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    public function size() {
        return count($this->stack);
    }
}

// Example

$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
echo "Stack after pushing: ";
print_r($stack);
echo "Let's take a peek on the top: " . $stack->peek() . PHP_EOL;
echo "Popped item: " . $stack->pop() . PHP_EOL;
echo "Stack after popping: ";
print_r($stack);
echo "Is stack empty? " . ($stack->isEmpty() ? 'true' : 'false') . PHP_EOL;
?>