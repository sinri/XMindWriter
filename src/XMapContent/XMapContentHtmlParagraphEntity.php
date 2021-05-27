<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentHtmlParagraphEntity extends XMapNodeEntity
{
    /**
     * @var string the identifier of the style used by this paragraph
     */
    protected $attrStyleId;
    /**
     * @var XMapContentHtmlSpanEntity[] [0,n) a styled span of text
     */
    protected $xHtmlSpanList;
    /**
     * @var XMapContentHtmlImageEntity[] [0,n) an image
     */
    protected $xHtmlImgList;
    /**
     * @var XMapContentHtmlAnchorEntity[] [0,n) a hyperlink
     */
    protected $xHtmlAList;
    /**
     * @var string the text content of this paragraph
     */
    protected $textContent;

    /**
     * @return string
     */
    public function getAttrStyleId(): string
    {
        return $this->attrStyleId;
    }

    /**
     * @param string $attrStyleId
     * @return XMapContentHtmlParagraphEntity
     */
    public function setAttrStyleId(string $attrStyleId): XMapContentHtmlParagraphEntity
    {
        $this->attrStyleId = $attrStyleId;
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
     * @return XMapContentHtmlParagraphEntity
     */
    public function setXHtmlSpanList(array $xHtmlSpanList): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlSpanList = $xHtmlSpanList;
        return $this;
    }

    /**
     * @return XMapContentHtmlImageEntity[]
     */
    public function getXHtmlImgList(): array
    {
        return $this->xHtmlImgList;
    }

    /**
     * @param XMapContentHtmlImageEntity[] $xHtmlImgList
     * @return XMapContentHtmlParagraphEntity
     */
    public function setXHtmlImgList(array $xHtmlImgList): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlImgList = $xHtmlImgList;
        return $this;
    }

    /**
     * @return XMapContentHtmlAnchorEntity[]
     */
    public function getXHtmlAList(): array
    {
        return $this->xHtmlAList;
    }

    /**
     * @param XMapContentHtmlAnchorEntity[] $xHtmlAList
     * @return XMapContentHtmlParagraphEntity
     */
    public function setXHtmlAList(array $xHtmlAList): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlAList = $xHtmlAList;
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
     * @return XMapContentHtmlParagraphEntity
     */
    public function setTextContent(string $textContent): XMapContentHtmlParagraphEntity
    {
        $this->textContent = $textContent;
        return $this;
    }

    public function addSpanEntity($span): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlSpanList[] = $span;
        return $this;
    }

    public function addImageEntity($image): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlImgList[] = $image;
        return $this;
    }

    public function addAnchorEntity($anchor): XMapContentHtmlParagraphEntity
    {
        $this->xHtmlAList[] = $anchor;
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

        if ($this->xHtmlSpanList !== null) {
            foreach ($this->xHtmlSpanList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        if ($this->xHtmlAList !== null) {
            foreach ($this->xHtmlAList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        if ($this->xHtmlImgList !== null) {
            foreach ($this->xHtmlImgList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        if ($this->textContent !== null) $xmlWriter->text($this->textContent);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "xhtml:p";
//        return "p";
    }
}