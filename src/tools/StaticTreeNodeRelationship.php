<?php


namespace sinri\XMindWriter\tools;


class StaticTreeNodeRelationship
{
    public $id;
    public $title;
    public $startNodeId;
    public $endNodeId;

    public function __construct($id, $title, $startNodeId, $endNodeId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->startNodeId = $startNodeId;
        $this->endNodeId = $endNodeId;
    }
}