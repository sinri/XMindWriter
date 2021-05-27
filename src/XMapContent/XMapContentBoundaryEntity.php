<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentBoundaryEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the unique identifier of this boundary
     */
    protected $attrId;
    /**
     * @var string the identifier of the style used by this boundary
     */
    protected $attrStyleId;
    /**
     * @var string (required) the range of this boundary
     * Might be:
     *  `(_start_, _end_)`: this boundary starts from the start-th subtopic to the end-th subtopic of the parent topic
     *  `master`: this boundary covers the whole parent topic
     */
    protected $attrRange;
    /**
     * @var XMapContentTitleEntity
     */
    protected $title;

    /**
     * @return string
     */
    public function getAttrId(): string
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapContentBoundaryEntity
     */
    public function setAttrId(string $attrId): XMapContentBoundaryEntity
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
     * @return XMapContentBoundaryEntity
     */
    public function setAttrStyleId(string $attrStyleId): XMapContentBoundaryEntity
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrRange(): string
    {
        return $this->attrRange;
    }

    /**
     * @param string $attrRange
     * @return XMapContentBoundaryEntity
     */
    public function setAttrRange(string $attrRange): XMapContentBoundaryEntity
    {
        $this->attrRange = $attrRange;
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
     * @return XMapContentBoundaryEntity
     */
    public function setTitle(XMapContentTitleEntity $title): XMapContentBoundaryEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $start
     * @param int $end
     * @return $this
     */
    public function setRangeWithStartAndEnd(int $start, int $end): XMapContentBoundaryEntity
    {
        $this->attrRange = "($start,$end)";
        return $this;
    }

    /**
     * @return $this
     */
    public function setRangeAsMaster(): XMapContentBoundaryEntity
    {
        $this->attrRange = "master";
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
        $xmlWriter->writeAttribute("range", $this->attrRange);

        self::writeThatNode($xmlWriter, $this->title);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "boundary";
    }
}