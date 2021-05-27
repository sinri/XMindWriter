<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentResourceRefsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentResourceRefEntity[] [0,n) the resource references
     */
    protected $resourceRefList;

    public function addResourceRef($resourceRef)
    {
        $this->resourceRefList[] = $resourceRef;
    }

    /**
     * @return XMapContentResourceRefEntity[]
     */
    public function getResourceRefList(): array
    {
        return $this->resourceRefList;
    }

    /**
     * @param XMapContentResourceRefEntity[] $resourceRefList
     * @return XMapContentResourceRefsEntity
     */
    public function setResourceRefList(array $resourceRefList): XMapContentResourceRefsEntity
    {
        $this->resourceRefList = $resourceRefList;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->resourceRefList !== null) {
            foreach ($this->resourceRefList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "resource-refs";
    }
}