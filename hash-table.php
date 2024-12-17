<?php
class HashTable {
    private $size;
    private $table;

    public function __construct($size = 10) {
        $this->size = $size;
        $this->table = array_fill(0, $size, []);
    }

    private function _hash($key) {
        $hash = 0;
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash + ord($key[$i])) % $this->size;
        }
        return $hash;
    }

    public function insert($key, $value) {
        $index = $this->_hash($key);
        foreach ($this->table[$index] as &$pair) {
            if ($pair[0] === $key) {
                $pair[1] = $value;
                return;
            }
        }
        $this->table[$index][] = [$key, $value];
    }

    public function get($key) {
        $index = $this->_hash($key);
        foreach ($this->table[$index] as $pair) {
            if ($pair[0] === $key) {
                return $pair[1];
            }
        }
        return "Key {$key} not found";
    }

    public function remove($key) {
        $index = $this->_hash($key);
        foreach ($this->table[$index] as $i => $pair) {
            if ($pair[0] === $key) {
                unset($this->table[$index][$i]);
                return;
            }
        }
        return "Key {$key} not found";
    }

    public function __toString() {
        $result = [];
        foreach ($this->table as $bucket) {
            $result[] = implode(', ', array_map(function($pair) {
                return "{$pair[0]}: {$pair[1]}";
            }, $bucket));
        }
        return implode(' | ', $result);
    }
}

// Example

$ht = new HashTable(5);
$ht->insert("name", "Maria");
$ht->insert("age", 25);
$ht->insert("city", "Sao Paulo");
$ht->insert("name", "Carlos"); 
echo "Hash Table: " . $ht . PHP_EOL;
echo "Get 'name': " . $ht->get('name') . PHP_EOL;
echo "Get 'city': " . $ht->get('city') . PHP_EOL;
$ht->remove("age");
echo "Hash Table after removing 'age': " . $ht . PHP_EOL;
?>