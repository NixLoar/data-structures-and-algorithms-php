<?php
include_once 'Graph.php';
include_once 'DFS.php';
include_once 'BFS.php';

$graph = new Graph();

$graph->addnode('A');
$graph->addnode('B');
$graph->addnode('C');
$graph->addnode('D');
$graph->addnode('E');
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'E');

echo "DFS from A: ";
print_r(dfs($graph, 'A'));

echo "BFS from A: ";
print_r(bfs($graph, 'A'));
?>
