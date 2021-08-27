<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentControlPositionEntity extends XMapNodeEntity
{
    /**
     * @var int (required) the index of this control point
     * currently only two control points is supported, so index should be either 0 or 1
     */
    protected $attrIndex;
    /**
     * @var XMapContentPositionEntity|null [0,1] the relative position of this control point
     */
    protected $position;

    protected function nodeTag(): string
    {
        return "control-point";
    }

    /**
     * @return int
     */
    public function getAttrIndex(): int
    {
        return $this->attrIndex;
    }

    /**
     * @param int $attrIndex
     * @return XMapContentControlPositionEntity
     */
    public function setAttrIndex(int $attrIndex): XMapContentControlPositionEntity
    {
        $this->attrIndex = $attrIndex;
        return $this;
    }

    public function getPosition(): ?XMapContentPositionEntity
    {
        return $this->position;
    }

    public function setPosition(?XMapContentPositionEntity $position): XMapContentControlPositionEntity
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("index", $this->attrIndex);

        self::writeThatNode($xmlWriter, $this->position);

        $xmlWriter->endElement();
    }
}