<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentBoundariesEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentBoundaryEntity[] [0,n) the boundaries of this topic
     */
    protected $boundaryList;

    /**
     * @return XMapContentBoundaryEntity[]
     */
    public function getBoundaryList(): array
    {
        return $this->boundaryList;
    }

    /**
     * @param XMapContentBoundaryEntity[] $boundaryList
     * @return XMapContentBoundariesEntity
     */
    public function setBoundaryList(array $boundaryList): XMapContentBoundariesEntity
    {
        $this->boundaryList = $boundaryList;
        return $this;
    }

    /**
     * @param XMapContentBoundaryEntity $boundary
     */
    public function addBoundaryEntity(XMapContentBoundaryEntity $boundary)
    {
        $this->boundaryList[] = $boundary;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->boundaryList !== null) {
            foreach ($this->boundaryList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "boundaries";
    }
}