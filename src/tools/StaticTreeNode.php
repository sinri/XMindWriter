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
    public $children = [];
    /**
     * @var boolean
     */
    public $isBranchFolded;
    /**
     * @var XMapContentMarkerRefsEntity $markerRefs -refs: [0,1] the container of marker references from this topic 
     */
    public $markerRefs;

    /**
     * StaticTreeNode constructor.
     * @param string $id
     * @param string $title
     * @param boolean $isBranchFolded
     * @param XMapContentMarkerRefsEntity $markerRefs
     */
    public function __construct(string $id, string $title, bool $isBranchFolded = false, $markerRefs = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isBranchFolded = $isBranchFolded;
        $this->markerRefs = $markerRefs;
    }
}
