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
     * @var string svg:width: the wrap width of this title (only available in topic elements)
     */
    protected $attrSvgWidth;
    /**
     * @var string the content of this title
     */
    protected $textContent;

    public function __construct($text, $widthInsideTopic=null)
    {
        $this->textContent=$text;
        $this->attrSvgWidth=$widthInsideTopic;
    }

    /**
     * @return string
     */
    public function getAttrSvgWidth(): string
    {
        return $this->attrSvgWidth;
    }

    /**
     * @param string $attrSvgWidth
     */
    public function setAttrSvgWidth(string $attrSvgWidth)
    {
        $this->attrSvgWidth = $attrSvgWidth;
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
     */
    public function setTextContent(string $textContent)
    {
        $this->textContent = $textContent;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if($this->attrSvgWidth!==null)$xmlWriter->writeAttribute('svg:width',$this->attrSvgWidth);

        $xmlWriter->text($this->textContent);

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "title";
    }
}