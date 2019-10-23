<?php


namespace sinri\XMindWriter\tools;


class StaticTreeNode
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var StaticTreeNode[]
     */
    public $children;
    /**
     * @var boolean
     */
    public $isBranchFolded;

    /**
     * StaticTreeNode constructor.
     * @param string $id
     * @param string $title
     * @param boolean $isBranchFolded
     */
    public function __construct($id, $title, $isBranchFolded = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isBranchFolded = $isBranchFolded;
    }
}