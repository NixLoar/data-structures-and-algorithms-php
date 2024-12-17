<?php
class Graph {
    private $adjList = [];

    public function addnode($node) {
        if (!array_key_exists($node, $this->adjList)) {
            $this->adjList[$node] = [];
        }
    }

    public function addEdge($v1, $v2) {
        if (!array_key_exists($v1, $this->adjList)) {
            $this->addnode($v1);
        }
        if (!array_key_exists($v2, $this->adjList)) {
            $this->addnode($v2);
        }
        $this->adjList[$v1][] = $v2;
        $this->adjList[$v2][] = $v1;
    }

    public function getAdjList() {
        return $this->adjList;
    }
}
?>
