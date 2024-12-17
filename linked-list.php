<?php
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    public function insertAtBeginning($data) {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function insertAtEnd($data) {
        $newNode = new Node($data);
        if (!$this->head) {
            $this->head = $newNode;
            return;
        }
        $current = $this->head;
        while ($current->next) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }

    public function insertAfterNode($prevData, $data) {
        $current = $this->head;
        while ($current && $current->data !== $prevData) {
            $current = $current->next;
        }
        if (!$current) {
            return "$prevData not found.";
        }
        $newNode = new Node($data);
        $newNode->next = $current->next;
        $current->next = $newNode;
    }

    public function deleteNode($key) {
        $current = $this->head;

        if ($current && $current->data === $key) {
            $this->head = $current->next;
            return;
        }

        $prev = null;
        while ($current && $current->data !== $key) {
            $prev = $current;
            $current = $current->next;
        }

        if (!$current) {
            return "$key not found.";
        }

        $prev->next = $current->next;
    }

    public function traverse() {
        $result = [];
        $current = $this->head;
        while ($current) {
            $result[] = $current->data;
            $current = $current->next;
        }
        return $result;
    }

    public function __toString() {
        $result = [];
        $current = $this->head;
        while ($current) {
            $result[] = $current->data;
            $current = $current->next;
        }
        return $result ? implode(" -> ", $result) : "Empty List";
    }
}

// Example usage
$linkedList = new LinkedList();
$linkedList->insertAtBeginning(10);
$linkedList->insertAtEnd(20);
$linkedList->insertAtEnd(30);
$linkedList->insertAfterNode(20, 25);

echo "Linked List after insertions:\n";
echo $linkedList . "\n";

echo "\nTraversed List:\n";
print_r($linkedList->traverse());

$linkedList->deleteNode(25);
echo "\nLinked List after deletion:\n";
echo $linkedList . "\n";
?>
