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

    /**
     * @return XMapStyleEntity[]
     */
    public function getStyleList()
    {
        return $this->styleList;
    }

    /**
     * @param XMapStyleEntity[] $styleList
     * @return XMapNormalStylesEntity
     */
    public function setStyleList($styleList)
    {
        $this->styleList = $styleList;
        return $this;
    }

    /**
     * @param XMapStyleEntity $styleEntity
     * @return $this
     */
    public function addStyleEntity($styleEntity)
    {
        $this->styleList[] = $styleEntity;
        return $this;
    }

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