<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentSummariesEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentSummaryEntity[] [0,n) summaries of this topic
     */
    protected $summaryList;

    /**
     * @return XMapContentSummaryEntity[]
     */
    public function getSummaryList(): array
    {
        return $this->summaryList;
    }

    /**
     * @param XMapContentSummaryEntity[] $summaryList
     */
    public function setSummaryList(array $summaryList)
    {
        $this->summaryList = $summaryList;
    }

    public function addSummaryEntity($summary): XMapContentSummariesEntity
    {
        $this->summaryList[] = $summary;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->summaryList !== null) {
            foreach ($this->summaryList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "summaries";
    }
}