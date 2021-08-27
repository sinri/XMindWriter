<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentHtmlSpanEntity extends XMapNodeEntity
{
    /**
     * @var string|null the identifier of the style used by this span
     */
    protected $attrStyleId;
    /**
     * @var string the text content of this span
     */
    protected $textContent;

    public function __construct($text, $styleId = null)
    {
        $this->textContent = $text;
        $this->attrStyleId = $styleId;
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
     * @return XMapContentHtmlSpanEntity
     */
    public function setTextContent(string $textContent): XMapContentHtmlSpanEntity
    {
        $this->textContent = $textContent;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrStyleId(): ?string
    {
        return $this->attrStyleId;
    }

    /**
     * @param string|null $attrStyleId
     * @return XMapContentHtmlSpanEntity
     */
    public function setAttrStyleId(?string $attrStyleId): XMapContentHtmlSpanEntity
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->attrStyleId !== null) $xmlWriter->writeAttribute("style-id", $this->attrStyleId);
        $xmlWriter->text($this->textContent);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "xhtml:span";
//        return "span";
    }
}