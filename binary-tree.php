<?php
class TreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($value) {
        if (!$this->root) {
            $this->root = new TreeNode($value);
        } else {
            $this->_insertRecursive($this->root, $value);
        }
    }

    private function _insertRecursive($node, $value) {
        if ($value < $node->value) {
            if (!$node->left) {
                $node->left = new TreeNode($value);
            } else {
                $this->_insertRecursive($node->left, $value);
            }
        } else {
            if (!$node->right) {
                $node->right = new TreeNode($value);
            } else {
                $this->_insertRecursive($node->right, $value);
            }
        }
    }

    public function search($value) {
        return $this->_searchRecursive($this->root, $value);
    }

    private function _searchRecursive($node, $value) {
        if (!$node) {
            return false;
        }
        if ($value == $node->value) {
            return true;
        }
        if ($value < $node->value) {
            return $this->_searchRecursive($node->left, $value);
        } else {
            return $this->_searchRecursive($node->right, $value);
        }
    }

    public function inorderTraversal() {
        $result = [];
        $this->_inorderRecursive($this->root, $result);
        return $result;
    }

    private function _inorderRecursive($node, &$result) {
        if ($node) {
            $this->_inorderRecursive($node->left, $result);
            $result[] = $node->value;
            $this->_inorderRecursive($node->right, $result);
        }
    }

    public function __toString() {
        return "In-order: " . implode(", ", $this->inorderTraversal());
    }
}

// Example

$tree = new BinaryTree();
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(2);
$tree->insert(4);
$tree->insert(6);
$tree->insert(8);

echo $tree . PHP_EOL;
echo "Search 4: " . ($tree->search(4) ? "Found" : "Not Found") . PHP_EOL;
echo "Search 10: " . ($tree->search(10) ? "Found" : "Not Found") . PHP_EOL;
echo "Inorder Traversal: " . implode(", ", $tree->inorderTraversal()) . PHP_EOL;
?>
