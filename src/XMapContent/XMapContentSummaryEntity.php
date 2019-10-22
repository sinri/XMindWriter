<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentSummaryEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the unique identifier of this summary
     */
    protected $attrId;
    /**
     * @var string the identifier of the style used by this summary
     */
    protected $attrStyleId;
    /**
     * @var string (required) the range of this summary
     * (_start_, _end_): this summary starts from the start-th subtopic to the end-th subtopic of the parent topic
     */
    protected $attrRange;
    /**
     * @var string the identifier of the summary topic
     */
    protected $attrTopicId;

    public function __construct($id, $startIndex, $endIndex, $summaryTopicId)
    {
        $this->attrId = $id;
        $this->attrRange = "({$startIndex}, {$endIndex})";
        $this->attrTopicId = $summaryTopicId;
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
     * @return XMapContentSummaryEntity
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
     * @return XMapContentSummaryEntity
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
     * @return XMapContentSummaryEntity
     */
    public function setAttrRange($attrRange)
    {
        $this->attrRange = $attrRange;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrTopicId()
    {
        return $this->attrTopicId;
    }

    /**
     * @param string $attrTopicId
     * @return XMapContentSummaryEntity
     */
    public function setAttrTopicId($attrTopicId)
    {
        $this->attrTopicId = $attrTopicId;
        return $this;
    }

    public function setRangeOfSummarizedTopics($startIndex, $endIndex)
    {
        $this->attrRange = "({$startIndex}, {$endIndex})";
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
        if ($this->attrStyleId !== null) {
            $xmlWriter->writeAttribute("style-id", $this->attrStyleId);
        }
        $xmlWriter->writeAttribute("range", $this->attrRange);
        if ($this->attrTopicId !== null) {
            $xmlWriter->writeAttribute("topic-id", $this->attrTopicId);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "summary";
    }
}