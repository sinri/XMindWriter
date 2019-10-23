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
    public function getBoundaryList()
    {
        return $this->boundaryList;
    }

    /**
     * @param XMapContentBoundaryEntity[] $boundaryList
     * @return XMapContentBoundariesEntity
     */
    public function setBoundaryList($boundaryList)
    {
        $this->boundaryList = $boundaryList;
        return $this;
    }

    /**
     * @param XMapContentBoundaryEntity $boundary
     */
    public function addBoundaryEntity($boundary)
    {
        $this->boundaryList[] = $boundary;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->boundaryList !== null) {
            foreach ($this->boundaryList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "boundaries";
    }
}