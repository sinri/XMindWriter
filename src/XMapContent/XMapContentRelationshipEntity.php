<?php


namespace sinri\XMindWriter\XMapContent;

use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

/**
 * A relationship element represents a relationship between two elements such as topic and/or boundary.
 * Class XMapContentRelationshipEntity
 * @package sinri\XMindWriter\XMapContent
 */
class XMapContentRelationshipEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the unique identifier of this relationship
     */
    protected $attrId;
    /**
     * @var string `style-id`: the identifier of the style used by this relationship
     */
    protected $attrStyleId;
    /**
     * @var string (required) the identifier of one end of this relationship
     */
    protected $attrEnd1;
    /**
     * @var string (required) the identifier of the other end of this relationship
     */
    protected $attrEnd2;
    /**
     * @var XMapContentTitleEntity [0,1] the title of this relationship
     */
    protected $title;
    /**
     * @var XMapContentControlPositionsEntity [0,1] the container of control points of this relationship
     */
    protected $controlPoints;

    public function __construct($id,$titleText,$end1,$end2)
    {
        $this->attrId=$id;
        $this->title=new XMapContentTitleEntity($titleText);
        $this->attrEnd1=$end1;
        $this->attrEnd2=$end2;
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
     * @return XMapContentRelationshipEntity
     */
    public function setAttrId(string $attrId): XMapContentRelationshipEntity
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
     * @return XMapContentRelationshipEntity
     */
    public function setAttrStyleId(string $attrStyleId): XMapContentRelationshipEntity
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrEnd1(): string
    {
        return $this->attrEnd1;
    }

    /**
     * @param string $attrEnd1
     * @return XMapContentRelationshipEntity
     */
    public function setAttrEnd1(string $attrEnd1): XMapContentRelationshipEntity
    {
        $this->attrEnd1 = $attrEnd1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrEnd2(): string
    {
        return $this->attrEnd2;
    }

    /**
     * @param string $attrEnd2
     * @return XMapContentRelationshipEntity
     */
    public function setAttrEnd2(string $attrEnd2): XMapContentRelationshipEntity
    {
        $this->attrEnd2 = $attrEnd2;
        return $this;
    }

    /**
     * @return XMapContentTitleEntity
     */
    public function getTitle(): XMapContentTitleEntity
    {
        return $this->title;
    }

    /**
     * @param XMapContentTitleEntity $title
     * @return XMapContentRelationshipEntity
     */
    public function setTitle(XMapContentTitleEntity $title): XMapContentRelationshipEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return XMapContentControlPositionsEntity
     */
    public function getControlPoints(): XMapContentControlPositionsEntity
    {
        return $this->controlPoints;
    }

    /**
     * @param XMapContentControlPositionsEntity $controlPoints
     * @return XMapContentRelationshipEntity
     */
    public function setControlPoints(XMapContentControlPositionsEntity $controlPoints): XMapContentRelationshipEntity
    {
        $this->controlPoints = $controlPoints;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute('id', $this->attrId);
        if ($this->attrStyleId !== null) $xmlWriter->writeAttribute('style-id', $this->attrStyleId);
        $xmlWriter->writeAttribute('end1', $this->attrEnd1);
        $xmlWriter->writeAttribute('end2', $this->attrEnd2);

        self::writeThatNode($xmlWriter, $this->title);
        self::writeThatNode($xmlWriter, $this->controlPoints);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "relationship";
    }
}