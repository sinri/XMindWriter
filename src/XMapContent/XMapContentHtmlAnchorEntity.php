<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentHtmlAnchorEntity extends XMapNodeEntity
{
    /**
     * @var string the reference location of this hyperlink
     */
    protected $attrXLinkHref;

    /**
     * @var XMapContentHtmlSpanEntity[] [0,n) spans enclosed by this hyperlink
     */
    protected $xHtmlSpanList;
    /**
     * @var string the text content of this hyperlink
     */
    protected $textContent;

    /**
     * @return string
     */
    public function getAttrXLinkHref(): string
    {
        return $this->attrXLinkHref;
    }

    /**
     * @param string $attrXLinkHref
     * @return XMapContentHtmlAnchorEntity
     */
    public function setAttrXLinkHref(string $attrXLinkHref): XMapContentHtmlAnchorEntity
    {
        $this->attrXLinkHref = $attrXLinkHref;
        return $this;
    }

    /**
     * @return XMapContentHtmlSpanEntity[]
     */
    public function getXHtmlSpanList(): array
    {
        return $this->xHtmlSpanList;
    }

    /**
     * @param XMapContentHtmlSpanEntity[] $xHtmlSpanList
     * @return XMapContentHtmlAnchorEntity
     */
    public function setXHtmlSpanList(array $xHtmlSpanList): XMapContentHtmlAnchorEntity
    {
        $this->xHtmlSpanList = $xHtmlSpanList;
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
     * @return XMapContentHtmlAnchorEntity
     */
    public function setTextContent(string $textContent): XMapContentHtmlAnchorEntity
    {
        $this->textContent = $textContent;
        return $this;
    }

    /**
     * @param XMapContentHtmlSpanEntity $span
     * @return XMapContentHtmlAnchorEntity
     */
    public function addSpanEntity(XMapContentHtmlSpanEntity $span): XMapContentHtmlAnchorEntity
    {
        $this->xHtmlSpanList[] = $span;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->attrXLinkHref !== null) {
            $xmlWriter->writeAttribute("xlink:href", $this->attrXLinkHref);
//            $xmlWriter->writeAttribute("href", $this->attrXLinkHref);
        }

        if ($this->xHtmlSpanList !== null) {
            foreach ($this->xHtmlSpanList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        if ($this->textContent !== null) $xmlWriter->text($this->textContent);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return 'xhtml:a';
//        return "a";
    }
}