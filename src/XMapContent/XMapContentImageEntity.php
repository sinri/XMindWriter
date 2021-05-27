<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentImageEntity extends XMapNodeEntity
{
    const ALIGN_TOP = "top";
    const ALIGN_BOTTOM = "bottom";
    const ALIGN_LEFT = "left";
    const ALIGN_RIGHT = "right";

    /**
     * @var string (required) the location (URL) to load the resource of this image
     */
    protected $attrXHtmlSrc;
    /**
     * @var string the alignment of this image, may be one of the following values
     */
    protected $attrAlign;
    /**
     * @var int the height of this image (in pixels)
     */
    protected $attrSvgHeight;
    /**
     * @var int the width of this image (in pixels)
     */
    protected $attrSvgWidth;

    /**
     * @return string
     */
    public function getAttrXHtmlSrc(): string
    {
        return $this->attrXHtmlSrc;
    }

    /**
     * @param string $attrXHtmlSrc
     * @return XMapContentImageEntity
     */
    public function setAttrXHtmlSrc(string $attrXHtmlSrc): XMapContentImageEntity
    {
        $this->attrXHtmlSrc = $attrXHtmlSrc;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrAlign(): string
    {
        return $this->attrAlign;
    }

    /**
     * @param string $attrAlign
     * @return XMapContentImageEntity
     */
    public function setAttrAlign(string $attrAlign): XMapContentImageEntity
    {
        $this->attrAlign = $attrAlign;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttrSvgHeight(): int
    {
        return $this->attrSvgHeight;
    }

    /**
     * @param int $attrSvgHeight
     * @return XMapContentImageEntity
     */
    public function setAttrSvgHeight(int $attrSvgHeight): XMapContentImageEntity
    {
        $this->attrSvgHeight = $attrSvgHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttrSvgWidth(): int
    {
        return $this->attrSvgWidth;
    }

    /**
     * @param int $attrSvgWidth
     * @return XMapContentImageEntity
     */
    public function setAttrSvgWidth(int $attrSvgWidth): XMapContentImageEntity
    {
        $this->attrSvgWidth = $attrSvgWidth;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("xhtml:src", $this->attrXHtmlSrc);
        if ($this->attrAlign !== null) $xmlWriter->writeAttribute("align", $this->attrAlign);
        if ($this->attrSvgHeight !== null) $xmlWriter->writeAttribute("svg:height", $this->attrSvgHeight);
        if ($this->attrSvgWidth !== null) $xmlWriter->writeAttribute("svg:width", $this->attrSvgWidth);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "image";
    }
}