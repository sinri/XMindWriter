<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentRelationshipsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentRelationshipEntity[] [0,n) relationships of this sheet
     */
    protected $relationshipList;

    /**
     * @return XMapContentRelationshipEntity[]
     */
    public function getRelationshipList(): array
    {
        return $this->relationshipList;
    }

    /**
     * @param XMapContentRelationshipEntity[] $relationshipList
     */
    public function setRelationshipList(array $relationshipList)
    {
        $this->relationshipList = $relationshipList;
    }

    /**
     * @param XMapContentRelationshipEntity $relationshipEntity
     */
    public function addRelationshipEntity($relationshipEntity){
        $this->relationshipList[]=$relationshipEntity;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->relationshipList as $relationshipEntity){
            self::writeThatNode($xmlWriter,$relationshipEntity);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "relationships";
    }
}