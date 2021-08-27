<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentNumberingEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the format of numbers
     */
    protected $attrNumberFormat;
    /**
     * @var string whether to prepend numbering of the parent topic to this numbering
     */
    protected $attrPrependingNumbers;
    /**
     * @var string|null [0,1] the prefix content
     */
    protected $prefix;
    /**
     * @var string|null [0,1] the suffix content
     */
    protected $suffix;

    /**
     * @return string
     */
    public function getAttrNumberFormat(): string
    {
        return $this->attrNumberFormat;
    }

    /**
     * @param string $attrNumberFormat
     * @return XMapContentNumberingEntity
     */
    public function setAttrNumberFormat(string $attrNumberFormat): XMapContentNumberingEntity
    {
        $this->attrNumberFormat = $attrNumberFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrPrependingNumbers(): string
    {
        return $this->attrPrependingNumbers;
    }

    /**
     * @param string $attrPrependingNumbers
     * @return XMapContentNumberingEntity
     */
    public function setAttrPrependingNumbers(string $attrPrependingNumbers): XMapContentNumberingEntity
    {
        $this->attrPrependingNumbers = $attrPrependingNumbers;
        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): XMapContentNumberingEntity
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): XMapContentNumberingEntity
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("number-format", $this->attrNumberFormat);
        if ($this->attrPrependingNumbers !== null) {
            $xmlWriter->writeAttribute("prepending-numbers", $this->attrPrependingNumbers);
        }

        if ($this->prefix !== null) {
            $xmlWriter->startElement("prefix");
            $xmlWriter->text($this->prefix);
            $xmlWriter->endElement();
        }

        if ($this->suffix !== null) {
            $xmlWriter->startElement("suffix");
            $xmlWriter->text($this->suffix);
            $xmlWriter->endElement();
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "numbering";
    }
}