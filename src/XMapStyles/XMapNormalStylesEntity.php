<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapNormalStylesEntity extends XMapNodeEntity
{
    /**
     * @var XMapStyleEntity[] [0,n) styles in this group
     */
    protected $styleList;

    protected function nodeTag()
    {
        return "styles";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->styleList as $styleEntity){
            self::writeThatNode($xmlWriter,$styleEntity);
        }

        $xmlWriter->endElement();
    }
}