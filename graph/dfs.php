<?php
function dfs($graph, $start) {
    $visited = [];
    $result = [];

    function explore($node, $graph, &$visited, &$result) {
        if (!in_array($node, $visited)) {
            $visited[] = $node;
            $result[] = $node;
            foreach ($graph->getAdjList()[$node] as $neighbor) {
                explore($neighbor, $graph, $visited, $result);
            }
        }
    }

    explore($start, $graph, $visited, $result);
    return $result;
}
?>
