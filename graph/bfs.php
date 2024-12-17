<?php
function bfs($graph, $start) {
    $visited = [];
    $queue = [$start];
    $result = [];

    $visited[] = $start;

    while (count($queue) > 0) {
        $node = array_shift($queue);
        $result[] = $node;

        foreach ($graph->getAdjList()[$node] as $neighbor) {
            if (!in_array($neighbor, $visited)) {
                $visited[] = $neighbor;
                $queue[] = $neighbor;
            }
        }
    }

    return $result;
}
?>
