<?php

/**
 * Build a binary tree
 */

use sinri\XMindWriter\tools\StaticTreeNode;
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


(new StaticTreeXMindWriter($nodes[0], $srcOutputDir))
    ->buildContent("Static Tree Sample")
    ->buildMeta("Tester", "no-reply@xmind.cc")
    ->archiveXMindFile($xmindFile);