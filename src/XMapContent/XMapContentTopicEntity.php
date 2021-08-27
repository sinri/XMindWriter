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
     * @var XMapContentTitleEntity|null [0,1] the title of this topic
     */
    protected $title;
    /**
     * @var XMapContentImageEntity|null [0,1] the image of this topic
     */
    protected $image;
    /**
     * @var XMapContentNotesEntity|null [0,1] the notes of this topic
     */
    protected $notes;
    /**
     * @var XMapContentPositionEntity|null [0,1] the position of this topic
     */
    protected $position;
    /**
     * @var XMapContentNumberingEntity|null [0,1] the numbering information of this topic's subtopics
     */
    protected $numbering;
    /**
     * @var XMapContentChildrenOfTopicsEntity|null [0,1] the container of subtopics of this topic
     */
    protected $children;
    /**
     * @var XMapContentMarkerRefsEntity|null $marker -refs: [0,1] the container of marker references from this topic
     */
    protected $markerRefs;

    /**
     * @return XMapContentMarkerRefsEntity|null
     */
    public function getMarkerRefs(): ?XMapContentMarkerRefsEntity
    {
        return $this->markerRefs;
    }

    /**
     * @param XMapContentMarkerRefsEntity|null $markerRefs
     * @return XMapContentTopicEntity
     */
    public function setMarkerRefs(?XMapContentMarkerRefsEntity $markerRefs): XMapContentTopicEntity
    {
        $this->markerRefs = $markerRefs;
        return $this;
    }

    /**
     * @var XMapContentLabelsEntity|null [0,1] the container of labels of this topic
     */
    protected $labels;
    /**
     * @var XMapContentBoundariesEntity|null [0,1] the container of boundaries of this topic
     */
    protected $boundaries;
    /**
     * @var XMapContentSummariesEntity|null [0,1] the container of summaries of this topic
     */
    protected $summaries;
    /**
     * @var XMapContentResourceRefsEntity|null [0,1] the container of extensions of this topic
     */
    protected $extensions;

    public function __construct(string $id, ?string $titleText = null)
    {
        $this->attrId = $id;
        if ($titleText !== null) {
            $this->title = new XMapContentTitleEntity($titleText);
        }
    }

    /**
     * @return string
     */
    public function getAttrId(): string
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapContentTopicEntity
     */
    public function setAttrId(string $attrId): XMapContentTopicEntity
    {
        $this->attrId = $attrId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrStyleId(): string
    {
        return $this->attrStyleId;
    }

    /**
     * @param string $attrStyleId
     * @return XMapContentTopicEntity
     */
    public function setAttrStyleId(string $attrStyleId): XMapContentTopicEntity
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrXlinkHref(): string
    {
        return $this->attrXlinkHref;
    }

    /**
     * @param string $attrXlinkHref
     * @return XMapContentTopicEntity
     */
    public function setAttrXlinkHref(string $attrXlinkHref): XMapContentTopicEntity
    {
        $this->attrXlinkHref = $attrXlinkHref;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrTimestamp(): string
    {
        return $this->attrTimestamp;
    }

    /**
     * @param string $attrTimestamp
     * @return XMapContentTopicEntity
     */
    public function setAttrTimestamp(string $attrTimestamp): XMapContentTopicEntity
    {
        $this->attrTimestamp = $attrTimestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrBranch(): string
    {
        return $this->attrBranch;
    }

    /**
     * @param string $attrBranch
     * @return XMapContentTopicEntity
     */
    public function setAttrBranch(string $attrBranch): XMapContentTopicEntity
    {
        $this->attrBranch = $attrBranch;
        return $this;
    }

    /**
     * @param boolean $folded make the children invisible
     * @return $this
     */
    public function setChildrenFolded(bool $folded): XMapContentTopicEntity
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
    public function getAttrStructureClass(): string
    {
        return $this->attrStructureClass;
    }

    /**
     * @param string $attrStructureClass
     * @return XMapContentTopicEntity
     */
    public function setAttrStructureClass(string $attrStructureClass): XMapContentTopicEntity
    {
        $this->attrStructureClass = $attrStructureClass;
        return $this;
    }

    /**
     * @return XMapContentTitleEntity|null
     */
    public function getTitle(): ?XMapContentTitleEntity
    {
        return $this->title;
    }

    /**
     * @param XMapContentTitleEntity|null $title
     * @return XMapContentTopicEntity
     */
    public function setTitle(?XMapContentTitleEntity $title): XMapContentTopicEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return XMapContentPositionEntity|null
     */
    public function getPosition(): ?XMapContentPositionEntity
    {
        return $this->position;
    }

    /**
     * @param XMapContentPositionEntity|null $position
     * @return XMapContentTopicEntity
     */
    public function setPosition(?XMapContentPositionEntity $position): XMapContentTopicEntity
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return XMapContentChildrenOfTopicsEntity|null
     */
    public function getChildren(): ?XMapContentChildrenOfTopicsEntity
    {
        return $this->children;
    }

    /**
     * @param XMapContentChildrenOfTopicsEntity|null $children
     * @return XMapContentTopicEntity
     */
    public function setChildren(?XMapContentChildrenOfTopicsEntity $children): XMapContentTopicEntity
    {
        $this->children = $children;
        return $this;
    }

    /**
     * Note: this is not a final resolution, just a trail for quick experience
     * @param XMapContentTopicEntity $childTopic
     * @param string $type
     * @return XMapContentTopicEntity
     */
    public function addChildTopicToTopics(XMapContentTopicEntity $childTopic, string $type = XMapContentTopicsEntity::ATTR_TYPE_ATTACHED): XMapContentTopicEntity
    {
        if ($this->children === null) {
            $this->children = new XMapContentChildrenOfTopicsEntity();
        }
        $list = $this->children->getTopicsList();
        if (isset($list[$type])) {
            $list[$type]->addTopicEntity($childTopic);
        } else {
            $topics = new XMapContentTopicsEntity($type);
            $this->children->addTopicsEntity($topics);
            $topics->addTopicEntity($childTopic);
        }
        return $this;
    }

    /**
     * @return XMapContentNotesEntity|null
     */
    public function getNotes(): ?XMapContentNotesEntity
    {
        return $this->notes;
    }

    /**
     * @param XMapContentNotesEntity|null $notes
     * @return XMapContentTopicEntity
     */
    public function setNotes(?XMapContentNotesEntity $notes): XMapContentTopicEntity
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return XMapContentNumberingEntity|null
     */
    public function getNumbering(): ?XMapContentNumberingEntity
    {
        return $this->numbering;
    }

    /**
     * @param XMapContentNumberingEntity|null $numbering
     * @return XMapContentTopicEntity
     */
    public function setNumbering(?XMapContentNumberingEntity $numbering): XMapContentTopicEntity
    {
        $this->numbering = $numbering;
        return $this;
    }

    /**
     * @return XMapContentSummariesEntity|null
     */
    public function getSummaries(): ?XMapContentSummariesEntity
    {
        return $this->summaries;
    }

    /**
     * @param XMapContentSummariesEntity|null $summaries
     */
    public function setSummaries(?XMapContentSummariesEntity $summaries)
    {
        $this->summaries = $summaries;
    }

    /**
     * @param XMapContentImageEntity|null $image
     * @return XMapContentTopicEntity
     */
    public function setImage(?XMapContentImageEntity $image): XMapContentTopicEntity
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return XMapContentImageEntity|null
     */
    public function getImage(): ?XMapContentImageEntity
    {
        return $this->image;
    }

    /**
     * @return XMapContentLabelsEntity|null
     */
    public function getLabels(): ?XMapContentLabelsEntity
    {
        return $this->labels;
    }

    /**
     * @param XMapContentLabelsEntity|null $labels
     * @return XMapContentTopicEntity
     */
    public function setLabels(?XMapContentLabelsEntity $labels): XMapContentTopicEntity
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return XMapContentBoundariesEntity|null
     */
    public function getBoundaries(): ?XMapContentBoundariesEntity
    {
        return $this->boundaries;
    }

    /**
     * @param XMapContentBoundariesEntity|null $boundaries
     * @return XMapContentTopicEntity
     */
    public function setBoundaries(?XMapContentBoundariesEntity $boundaries): XMapContentTopicEntity
    {
        $this->boundaries = $boundaries;
        return $this;
    }

    /**
     * @return XMapContentResourceRefsEntity|null
     */
    public function getExtensions(): ?XMapContentResourceRefsEntity
    {
        return $this->extensions;
    }

    /**
     * @param XMapContentResourceRefsEntity|null $extensions
     * @return XMapContentTopicEntity
     */
    public function setExtensions(?XMapContentResourceRefsEntity $extensions): XMapContentTopicEntity
    {
        $this->extensions = $extensions;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("id", $this->attrId);
        if ($this->attrStyleId !== null) $xmlWriter->writeAttribute("style-id", $this->attrStyleId);
        if ($this->attrXlinkHref !== null) $xmlWriter->writeAttribute("xlink:href", $this->attrXlinkHref);
        if ($this->attrTimestamp !== null) $xmlWriter->writeAttribute("timestamp", $this->attrTimestamp);
        if ($this->attrBranch !== null) $xmlWriter->writeAttribute("branch", $this->attrBranch);
        if ($this->attrStructureClass !== null) $xmlWriter->writeAttribute("structure-class", $this->attrStructureClass);

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

    protected function nodeTag(): string
    {
        return "topic";
    }
}