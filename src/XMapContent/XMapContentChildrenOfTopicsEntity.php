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
    public function __construct($topicsList=[])
    {
        $this->topicsList=$topicsList;
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
     */
    public function setTopicsList(array $topicsList)
    {
        $this->topicsList = $topicsList;
    }

    /**
     * @param XMapContentTopicsEntity $topicsEntity
     */
    public function addTopicsEntity($topicsEntity){
        $this->topicsList[]=$topicsEntity;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        foreach ($this->topicsList as $topicsEntity) {
            self::writeThatNode($xmlWriter, $topicsEntity);
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "children";
    }
}