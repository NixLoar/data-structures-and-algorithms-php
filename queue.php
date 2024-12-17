<?php
class Queue {
    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return "Empty queue";
        }
        return array_shift($this->queue);
    }

    public function peek() {
        if ($this->isEmpty()) {
            return "Empty queue";
        }
        return $this->queue[0];
    }

    public function isEmpty() {
        return empty($this->queue);
    }

    public function size() {
        return count($this->queue);
    }
}

// Example

$queue = new Queue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo "Queue after enqueuing: ";
print_r($queue);
echo "Front item: " . $queue->peek() . PHP_EOL;
echo "Dequeued item: " . $queue->dequeue() . PHP_EOL;
echo "Queue after dequeuing: ";
print_r($queue);
echo "Is queue empty? " . ($queue->isEmpty() ? 'true' : 'false') . PHP_EOL;
?>