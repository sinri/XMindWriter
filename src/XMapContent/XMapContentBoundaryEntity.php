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
    public function getAttrId()
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapContentBoundaryEntity
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
     * @return XMapContentBoundaryEntity
     */
    public function setAttrStyleId($attrStyleId)
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrRange()
    {
        return $this->attrRange;
    }

    /**
     * @param string $attrRange
     * @return XMapContentBoundaryEntity
     */
    public function setAttrRange($attrRange)
    {
        $this->attrRange = $attrRange;
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
     * @return XMapContentBoundaryEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $start
     * @param int $end
     * @return $this
     */
    public function setRangeWithStartAndEnd($start, $end)
    {
        $this->attrRange = "({$start},{$end})";
        return $this;
    }

    /**
     * @return $this
     */
    public function setRangeAsMaster()
    {
        $this->attrRange = "master";
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("id", $this->attrId);
        if ($this->attrStyleId !== null) $xmlWriter->writeAttribute("style-id", $this->attrStyleId);
        $xmlWriter->writeAttribute("range", $this->attrRange);

        self::writeThatNode($xmlWriter, $this->title);

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "boundary";
    }
}