<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapDefaultStyleEntity extends XMapNodeEntity
{
    const STYLE_FAMILY_CENTRAL_TOPIC = "centralTopic";
    const STYLE_FAMILY_MAIN_TOPIC = "mainTopic";
    const STYLE_FAMILY_SUB_TOPIC = "subTopic";
    const STYLE_FAMILY_FLOATING_TOPIC = "floatingTopic";
    const STYLE_FAMILY_SUMMARY_TOPIC = "summaryTopic";
    const STYLE_FAMILY_CALLOUT_TOPIC = "calloutTopic";
    const STYLE_FAMILY_RELATIONSHIP = "relationship";
    const STYLE_FAMILY_BOUNDARY = "boundary";
    const STYLE_FAMILY_SUMMARY = "summary";
    const STYLE_FAMILY_MAP = "map";

    /**
     * @var string (required) the family name of the described style
     */
    protected $attrStyleFamily;
    /**
     * @var string (required) the identifier of the referenced style
     */
    protected $attrStyleId;

    /**
     * @return string
     */
    public function getAttrStyleFamily()
    {
        return $this->attrStyleFamily;
    }

    /**
     * @param string $attrStyleFamily
     * @return XMapDefaultStyleEntity
     */
    public function setAttrStyleFamily($attrStyleFamily)
    {
        $this->attrStyleFamily = $attrStyleFamily;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrStyleId()
    {
        return $this->attrStyleId;
    }

    /**
     * @param string $attrStyleId
     * @return XMapDefaultStyleEntity
     */
    public function setAttrStyleId($attrStyleId)
    {
        $this->attrStyleId = $attrStyleId;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("style-family", $this->attrStyleFamily);
        $xmlWriter->writeAttribute("style-id", $this->attrStyleId);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "default-style";
    }
}