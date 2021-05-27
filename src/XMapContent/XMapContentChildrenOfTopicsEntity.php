<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentChildrenOfTopicsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentTopicsEntity[] [0,n) the container of grouped topics that are subtopics of the parent topic
     */
    protected $topicsList;

    /**
     * XMapContentChildrenOfTopicsEntity constructor.
     * @param XMapContentTopicsEntity[] $topicsList
     */
    public function __construct(array $topicsList = [])
    {
        $this->topicsList = $topicsList;
    }

    /**
     * @return XMapContentTopicsEntity[]
     */
    public function getTopicsList(): array
    {
        return $this->topicsList;
    }

    /**
     * @param XMapContentTopicsEntity[] $topicsList
     * @return XMapContentChildrenOfTopicsEntity
     */
    public function setTopicsList(array $topicsList): XMapContentChildrenOfTopicsEntity
    {
        $this->topicsList = $topicsList;
        return $this;
    }

    /**
     * @param XMapContentTopicsEntity $topicsEntity
     * @return XMapContentChildrenOfTopicsEntity
     */
    public function addTopicsEntity(XMapContentTopicsEntity $topicsEntity): XMapContentChildrenOfTopicsEntity
    {
        $this->topicsList[$topicsEntity->getAttrType()] = $topicsEntity;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->topicsList as $topicsEntity) {
            self::writeThatNode($xmlWriter, $topicsEntity);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "children";
    }
}