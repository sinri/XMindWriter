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
    public function getStyleList(): array
    {
        return $this->styleList;
    }

    /**
     * @param XMapStyleEntity[] $styleList
     * @return XMapNormalStylesEntity
     */
    public function setStyleList(array $styleList): XMapNormalStylesEntity
    {
        $this->styleList = $styleList;
        return $this;
    }

    /**
     * @param XMapStyleEntity $styleEntity
     * @return $this
     */
    public function addStyleEntity(XMapStyleEntity $styleEntity): XMapNormalStylesEntity
    {
        $this->styleList[] = $styleEntity;
        return $this;
    }

    protected function nodeTag(): string
    {
        return "styles";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->styleList as $styleEntity) {
            self::writeThatNode($xmlWriter, $styleEntity);
        }

        $xmlWriter->endElement();
    }
}