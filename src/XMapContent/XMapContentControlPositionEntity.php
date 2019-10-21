<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentControlPositionEntity extends XMapNodeEntity
{
    /**
     * @var int (required) the index of this control point
     * currently only two control points is supported, so index should be either 0 or 1
     */
    protected $attrIndex;
    /**
     * @var XMapContentPositionEntity [0,1] the relative position of this control point
     */
    protected $position;

    protected function nodeTag()
    {
        return "control-point";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("index",$this->attrIndex);

        self::writeThatNode($xmlWriter,$this->position);

        $xmlWriter->endElement();
    }
}