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
     * @var string [0,1] the prefix content
     */
    protected $prefix;
    /**
     * @var string [0,1] the suffix content
     */
    protected $suffix;

    /**
     * @return string
     */
    public function getAttrNumberFormat()
    {
        return $this->attrNumberFormat;
    }

    /**
     * @param string $attrNumberFormat
     * @return XMapContentNumberingEntity
     */
    public function setAttrNumberFormat($attrNumberFormat)
    {
        $this->attrNumberFormat = $attrNumberFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrPrependingNumbers()
    {
        return $this->attrPrependingNumbers;
    }

    /**
     * @param string $attrPrependingNumbers
     * @return XMapContentNumberingEntity
     */
    public function setAttrPrependingNumbers($attrPrependingNumbers)
    {
        $this->attrPrependingNumbers = $attrPrependingNumbers;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return XMapContentNumberingEntity
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return XMapContentNumberingEntity
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
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

    protected function nodeTag()
    {
        return "numbering";
    }
}