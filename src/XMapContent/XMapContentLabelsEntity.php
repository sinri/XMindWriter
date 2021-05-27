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
    public function addLabelAsEntity(XMapContentLabelEntity $labelEntity): XMapContentLabelsEntity
    {
        $this->labelList[] = $labelEntity;
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function addLabelWithText(string $text): XMapContentLabelsEntity
    {
        $this->labelList[] = new XMapContentLabelEntity($text);
        return $this;
    }

    /**
     * @return XMapContentLabelEntity[]
     */
    public function getLabelList(): array
    {
        return $this->labelList;
    }

    /**
     * @param XMapContentLabelEntity[] $labelList
     */
    public function setLabelList(array $labelList)
    {
        $this->labelList = $labelList;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->labelList !== null) {
            foreach ($this->labelList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "labels";
    }
}