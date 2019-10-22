<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentPlainNoteEntity extends XMapNodeEntity
{
    protected $textContent;

    public function __construct($text)
    {
        $this->textContent = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextContent()
    {
        return $this->textContent;
    }

    /**
     * @param mixed $textContent
     * @return XMapContentPlainNoteEntity
     */
    public function setTextContent($textContent)
    {
        $this->textContent = $textContent;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->text($this->textContent);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "plain";
    }
}