<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentRelationshipsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentRelationshipEntity[] [0,n) relationships of this sheet
     */
    protected $relationshipList = [];

    /**
     * @return XMapContentRelationshipEntity[]
     */
    public function getRelationshipList(): array
    {
        return $this->relationshipList;
    }

    /**
     * @param XMapContentRelationshipEntity[] $relationshipList
     * @return XMapContentRelationshipsEntity
     */
    public function setRelationshipList(array $relationshipList): XMapContentRelationshipsEntity
    {
        $this->relationshipList = $relationshipList;
        return $this;
    }

    /**
     * @param XMapContentRelationshipEntity $relationshipEntity
     * @return XMapContentRelationshipsEntity
     */
    public function addRelationshipEntity(XMapContentRelationshipEntity $relationshipEntity): XMapContentRelationshipsEntity
    {
        $this->relationshipList[] = $relationshipEntity;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->relationshipList as $relationshipEntity) {
            self::writeThatNode($xmlWriter, $relationshipEntity);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "relationships";
    }
}