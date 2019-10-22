<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentTopicEntity extends XMapNodeEntity
{
    const BRANCH_FOLDED = "folded";

    /**
     * @var string (required) the unique identifier of this topic
     */
    protected $attrId;
    /**
     * @var string the identifier of the style this topic uses
     */
    protected $attrStyleId;
    /**
     * @var string `xlink:href` the hyperlink reference of this topic
     */
    protected $attrXlinkHref;
    /**
     * @var string the time this topic was last modified
     */
    protected $attrTimestamp;
    /**
     * @var string the state of this topic's branch, maybe `folded` or undefined
     */
    protected $attrBranch;
    /**
     * @var string the structure class of this topic
     */
    protected $attrStructureClass;
    /**
     * @var XMapContentTitleEntity [0,1] the title of this topic
     */
    protected $title;
    /**
     * @var ? [0,1] the image of this topic
     * @todo
     */
    protected $image;
    /**
     * @var XMapContentNotesEntity [0,1] the notes of this topic
     */
    protected $notes;
    /**
     * @var XMapContentPositionEntity [0,1] the position of this topic
     */
    protected $position;
    /**
     * @var ?  [0,1] the numbering information of this topic's subtopics
     * @todo
     */
    protected $numbering;
    /**
     * @var XMapContentChildrenOfTopicsEntity [0,1] the container of subtopics of this topic
     */
    protected $children;
    /**
     * @var ? $marker-refs: [0,1] the container of marker references from this topic
     * @todo
     */
    protected $markerRefs;
    /**
     * @var ? [0,1] the container of labels of this topic
     * @todo
     */
    protected $labels;
    /**
     * @var ? [0,1] the container of boundaries of this topic
     * @todo
     */
    protected $boundaries;
    /**
     * @var ? [0,1] the container of summaries of this topic
     * @todo
     */
    protected $summaries;
    /**
     * @var ? [0,1] the container of extensions of this topic
     * @todo
     */
    protected $extensions;

    public function __construct($id,$titleText=null)
    {
        $this->attrId=$id;
        if($titleText!==null)$this->title=new XMapContentTitleEntity($titleText);
    }

    /**
     * @return string
     */
    public function getAttrId()
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapContentTopicEntity
     */
    public function setAttrId($attrId)
    {
        $this->attrId = $attrId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrStyleId()
    {
        return $this->attrStyleId;
    }

    /**
     * @param string $attrStyleId
     * @return XMapContentTopicEntity
     */
    public function setAttrStyleId($attrStyleId)
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrXlinkHref()
    {
        return $this->attrXlinkHref;
    }

    /**
     * @param string $attrXlinkHref
     * @return XMapContentTopicEntity
     */
    public function setAttrXlinkHref($attrXlinkHref)
    {
        $this->attrXlinkHref = $attrXlinkHref;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrTimestamp()
    {
        return $this->attrTimestamp;
    }

    /**
     * @param string $attrTimestamp
     * @return XMapContentTopicEntity
     */
    public function setAttrTimestamp($attrTimestamp)
    {
        $this->attrTimestamp = $attrTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrBranch()
    {
        return $this->attrBranch;
    }

    /**
     * @param string $attrBranch
     * @return XMapContentTopicEntity
     */
    public function setAttrBranch($attrBranch)
    {
        $this->attrBranch = $attrBranch;
        return $this;
    }

    /**
     * @param boolean $folded make the children invisible
     * @return $this
     */
    public function setChildrenFolded($folded)
    {
        if ($folded) {
            $this->attrBranch = self::BRANCH_FOLDED;
        } else {
            $this->attrBranch = null;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrStructureClass()
    {
        return $this->attrStructureClass;
    }

    /**
     * @param string $attrStructureClass
     * @return XMapContentTopicEntity
     */
    public function setAttrStructureClass($attrStructureClass)
    {
        $this->attrStructureClass = $attrStructureClass;
        return $this;
    }

    /**
     * @return XMapContentTitleEntity
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param XMapContentTitleEntity $title
     * @return XMapContentTopicEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return XMapContentPositionEntity
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param XMapContentPositionEntity $position
     * @return XMapContentTopicEntity
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return XMapContentChildrenOfTopicsEntity
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param XMapContentChildrenOfTopicsEntity $children
     * @return XMapContentTopicEntity
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * Note: this is not a final resolution, just a trail for quick experience
     * @param XMapContentTopicEntity $childTopic
     * @param int $topicsIndex
     * @return XMapContentTopicEntity
     */
    public function addChildTopicToTopics($childTopic,$topicsIndex=0){
        if($this->children===null){
            $this->children=new XMapContentChildrenOfTopicsEntity();
            $this->children->addTopicsEntity(new XMapContentTopicsEntity(XMapContentTopicsEntity::ATTR_TYPE_ATTACHED));
        }
        $this->children->getTopicsList()[$topicsIndex]->addTopicEntity($childTopic);
        return $this;
    }

    /**
     * @return XMapContentNotesEntity
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param XMapContentNotesEntity $notes
     * @return XMapContentTopicEntity
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return XMapContentNumberingEntity
     */
    public function getNumbering()
    {
        return $this->numbering;
    }

    /**
     * @param XMapContentNumberingEntity $numbering
     * @return XMapContentTopicEntity
     */
    public function setNumbering($numbering)
    {
        $this->numbering = $numbering;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("id",$this->attrId);
        if($this->attrStyleId!==null)$xmlWriter->writeAttribute("style-id",$this->attrStyleId);
        if($this->attrXlinkHref!==null)$xmlWriter->writeAttribute("xlink:href",$this->attrXlinkHref);
        if($this->attrTimestamp!==null)$xmlWriter->writeAttribute("timestamp",$this->attrTimestamp);
        if($this->attrBranch!==null)$xmlWriter->writeAttribute("branch",$this->attrBranch);
        if($this->attrStructureClass!==null)$xmlWriter->writeAttribute("structure-class",$this->attrStructureClass);

        self::writeThatNode($xmlWriter,$this->title);
        self::writeThatNode($xmlWriter,$this->image);
        self::writeThatNode($xmlWriter,$this->notes);
        self::writeThatNode($xmlWriter,$this->position);
        self::writeThatNode($xmlWriter,$this->numbering);
        self::writeThatNode($xmlWriter,$this->children);
        self::writeThatNode($xmlWriter,$this->markerRefs);
        self::writeThatNode($xmlWriter,$this->labels);
        self::writeThatNode($xmlWriter,$this->boundaries);
        self::writeThatNode($xmlWriter,$this->summaries);
        self::writeThatNode($xmlWriter,$this->extensions);

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "topic";
    }
}