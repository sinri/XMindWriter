<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentHtmlImageEntity extends XMapNodeEntity
{
    /**
     * @var string the source location of this image
     */
    protected $attrXHtmlSrc;

    public function __construct($src)
    {
        $this->attrXHtmlSrc = $src;
    }

    /**
     * @return string
     */
    public function getAttrXHtmlSrc()
    {
        return $this->attrXHtmlSrc;
    }

    /**
     * @param string $attrXHtmlSrc
     * @return XMapContentHtmlImageEntity
     */
    public function setAttrXHtmlSrc($attrXHtmlSrc)
    {
        $this->attrXHtmlSrc = $attrXHtmlSrc;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->attrXHtmlSrc !== null) $xmlWriter->writeAttribute("xhtml:src", $this->attrXHtmlSrc);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "xhtml:img";
//        return "img";
    }
}