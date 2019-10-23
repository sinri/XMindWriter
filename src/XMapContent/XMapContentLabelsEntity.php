<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentLabelsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentLabelEntity[] [0,n) the labels
     */
    protected $labelList;

    /**
     * @param XMapContentLabelEntity $labelEntity
     * @return $this
     */
    public function addLabelAsEntity($labelEntity)
    {
        $this->labelList[] = $labelEntity;
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function addLabelWithText($text)
    {
        $this->labelList[] = new XMapContentLabelEntity($text);
        return $this;
    }

    /**
     * @return XMapContentLabelEntity[]
     */
    public function getLabelList()
    {
        return $this->labelList;
    }

    /**
     * @param XMapContentLabelEntity[] $labelList
     */
    public function setLabelList($labelList)
    {
        $this->labelList = $labelList;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->labelList !== null) {
            foreach ($this->labelList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "labels";
    }
}