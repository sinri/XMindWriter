<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentNotesEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentPlainNoteEntity [0,1] the plain text content
     */
    protected $plain;
    /**
     * @var XMapContentHtmlNoteEntity [0,1] the rich text content
     */
    protected $html;

    /**
     * @return XMapContentPlainNoteEntity
     */
    public function getPlain()
    {
        return $this->plain;
    }

    /**
     * @param XMapContentPlainNoteEntity $plain
     * @return XMapContentNotesEntity
     */
    public function setPlain($plain)
    {
        $this->plain = $plain;
        return $this;
    }

    /**
     * @return XMapContentHtmlNoteEntity
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Warning: may not be dealt correctly, plz use plain as much as possible
     * @param XMapContentHtmlNoteEntity $html
     * @return XMapContentNotesEntity
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        self::writeThatNode($xmlWriter, $this->plain);
        self::writeThatNode($xmlWriter, $this->html);

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "notes";
    }
}