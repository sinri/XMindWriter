<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentTopicsEntity extends XMapNodeEntity
{
    const ATTR_TYPE_ATTACHED='attached';// topics attached to its parent topic
    const ATTR_TYPE_DETACHED='detached';// topics not attached to its parent topic (AKA floating topic)
    const ATTR_TYPE_SUMMARY='summary';// topics attached to summaries of its parent topic
    const ATTR_TYPE_CALLOUT='callout';// topics attached as callouts of its parent topic

    /**
     * @var string (required) the type of this group of topics
     */
    protected $attrType;

    /**
     * @return string
     */
    public function getAttrType(): string
    {
        return $this->attrType;
    }

    /**
     * @param string $attrType
     * @return XMapContentTopicsEntity
     */
    public function setAttrType(string $attrType): XMapContentTopicsEntity
    {
        $this->attrType = $attrType;
        return $this;
    }

    /**
     * @return XMapContentTopicEntity[]
     */
    public function getTopicList(): array
    {
        return $this->topicList;
    }

    /**
     * @param XMapContentTopicEntity[] $topicList
     * @return XMapContentTopicsEntity
     */
    public function setTopicList(array $topicList): XMapContentTopicsEntity
    {
        $this->topicList = $topicList;
        return $this;
    }
    /**
     * @var XMapContentTopicEntity[] [0,n) the grouped topics
     */
    protected $topicList;

    public function __construct($type)
    {
        $this->attrType = $type;
    }

    /**
     * @param XMapContentTopicEntity $topicEntity
     * @return XMapContentTopicsEntity
     */
    public function addTopicEntity(XMapContentTopicEntity $topicEntity): XMapContentTopicsEntity
    {
        $this->topicList[] = $topicEntity;
        return $this;
    }

    protected function nodeTag(): string
    {
        return "topics";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("type", $this->attrType);

        foreach ($this->topicList as $topicEntity) {
            self::writeThatNode($xmlWriter, $topicEntity);
        }

        $xmlWriter->endElement();
    }
}