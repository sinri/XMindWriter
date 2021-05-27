<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentLabelEntity extends XMapNodeEntity
{
    /**
     * @var string the content of the label
     */
    protected $textContent;

    public function __construct($text)
    {
        $this->textContent = $text;
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
     * @return XMapContentLabelEntity
     */
    public function setTextContent(string $textContent): XMapContentLabelEntity
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
        $xmlWriter->text($this->textContent);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "label";
    }
}