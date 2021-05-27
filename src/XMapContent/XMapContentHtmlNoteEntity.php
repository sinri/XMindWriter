<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

/**
 * Class XMapContentHtmlNoteEntity
 * @package sinri\XMindWriter\XMapContent
 * Note: XMind ZEN Trail Version would treat this as plain
 */
class XMapContentHtmlNoteEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentHtmlParagraphEntity[] [0,n) the paragraphs in this rich text content
     */
    protected $xHtmlPList;
    /**
     * @var string a raw x-html script as array of `xhtml:p`, each of which contains `xhtml:a`, `xhtml:span` or `xhtml:img`.
     * Note: if this property is set, it would be used and the entities would be ignored!
     */
    protected $xHtmlRaw;

    public function addXHtmlPEntity($p)
    {
        $this->xHtmlPList[] = $p;
    }

    /**
     * @return string
     */
    public function getXHtmlRaw(): string
    {
        return $this->xHtmlRaw;
    }

    /**
     * @param string $xHtmlRaw
     * @return XMapContentHtmlNoteEntity
     */
    public function setXHtmlRaw(string $xHtmlRaw): XMapContentHtmlNoteEntity
    {
        $this->xHtmlRaw = $xHtmlRaw;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->xHtmlRaw === null) {
            foreach ($this->xHtmlPList as $p) {
                self::writeThatNode($xmlWriter, $p);
            }
        } else {
            $xmlWriter->writeRaw($this->xHtmlRaw);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "html";
    }
}