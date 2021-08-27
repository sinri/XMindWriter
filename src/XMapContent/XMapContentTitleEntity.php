<?php


namespace sinri\XMindWriter\XMapContent;

use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

/**
 * A title element represents the title of an element such as topic, sheet, relationship, boundary.
 * Class XMapContentTitleEntity
 * @package sinri\XMindWriter\XMapContent
 */
class XMapContentTitleEntity extends XMapNodeEntity
{
    /**
     * @var string|null svg:width: the wrap width of this title (only available in topic elements)
     */
    protected $attrSvgWidth;
    /**
     * @var string the content of this title
     */
    protected $textContent;

    public function __construct(string $text, ?string $widthInsideTopic = null)
    {
        $this->textContent = $text;
        $this->attrSvgWidth = $widthInsideTopic;
    }

    /**
     * @return string
     */
    public function getAttrSvgWidth(): ?string
    {
        return $this->attrSvgWidth;
    }

    /**
     * @param string $attrSvgWidth
     * @return XMapContentTitleEntity
     */
    public function setAttrSvgWidth(string $attrSvgWidth): XMapContentTitleEntity
    {
        $this->attrSvgWidth = $attrSvgWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextContent(): string
    {
        return $this->textContent;
    }

    /**
     * @param string $textContent
     * @return XMapContentTitleEntity
     */
    public function setTextContent(string $textContent): XMapContentTitleEntity
    {
        $this->textContent = $textContent;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->attrSvgWidth !== null) $xmlWriter->writeAttribute('svg:width', $this->attrSvgWidth);

        $xmlWriter->text($this->textContent);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "title";
    }
}