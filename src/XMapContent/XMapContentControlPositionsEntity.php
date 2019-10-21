<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentControlPositionsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentControlPositionEntity[] [0,2] control points of this relationship
     */
    protected $controlPointList;

    protected function nodeTag()
    {
        return "control-points";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->controlPointList as $controlPositionEntity){
            self::writeThatNode($xmlWriter,$controlPositionEntity);
        }

        $xmlWriter->endElement();
    }
}