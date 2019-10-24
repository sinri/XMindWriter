<?php

/**
 * Build a binary tree
 */

use sinri\XMindWriter\tools\StaticTreeNode;
use sinri\XMindWriter\tools\StaticTreeNodeRelationship;
use sinri\XMindWriter\tools\StaticTreeXMindWriter;

require_once __DIR__ . '/../../vendor/autoload.php';

$srcOutputDir = __DIR__ . '/../../debug/sample';
$xmindFile = __DIR__ . '/../../debug/sample.xmind';

$nodes = [];
$nodes[] = new StaticTreeNode(0, "Root Node", false);
$nodes[0]->children = [];
for ($i = 1; $i <= 100; $i++) {
    $node = new StaticTreeNode($i, "Node-" . $i, false);
    $node->children = [];
    $nodes[] = $node;
}

for ($i = 0; $i < 100; $i++) {
    if (2 * $i + 1 <= 100) $nodes[$i]->children[] = $nodes[2 * $i + 1];
    if (2 * $i + 2 <= 100) $nodes[$i]->children[] = $nodes[2 * $i + 2];
}

$floatingNodes = [];
$floatingNodes[] = new StaticTreeNode('Point-A', "Point A");

$relationships = [];
for ($i = 1; $i < 90; $i += 7) {
    $relationships[] = new StaticTreeNodeRelationship("R-" . $i, "R-" . $i, 'Point-A', $nodes[$i]->id);
}


(new StaticTreeXMindWriter($nodes[0], $floatingNodes, $relationships, $srcOutputDir))
    ->buildContent("Static Tree Sample")
    ->buildMeta("Tester", "no-reply@xmind.cc")
    ->archiveXMindFile($xmindFile);