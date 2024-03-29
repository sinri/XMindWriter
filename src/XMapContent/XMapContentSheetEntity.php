<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentSheetEntity extends XMapNodeEntity
{
    /**
     * @var string the unique identifier of this sheet (required)
     */
    protected $attrId;
    /**
     * @var string the identifier of the style this sheet uses
     */
    protected $attrStyleId;
    /**
     * @var string the identifier of the theme style this sheet uses
     */
    protected $attrTheme;
    /**
     * @var XMapContentTitleEntity|null [0,1] the title of this sheet
     */
    protected $title;
    /**
     * @var XMapContentTopicEntity|null [0,1] the root topic of this sheet
     */
    protected $topic;
    /**
     * @var XMapContentRelationshipsEntity|null [0,1] the relationship container of this sheet
     */
    protected $relationships;
    /**
     * @var XMapContentLegendEntity|null [0,1] the legend of this sheet
     */
    protected $legend;

    /**
     * XMapContentSheetEntity constructor.
     * @param string $id
     * @param string|null $titleText
     */
    public function __construct(string $id, string $titleText = null)
    {
        $this->attrId = $id;
        if ($titleText !== null) $this->title = new XMapContentTitleEntity($titleText);
    }

    public function getTitle(): ?XMapContentTitleEntity
    {
        return $this->title;
    }

    public function setTitle(?XMapContentTitleEntity $title): XMapContentSheetEntity
    {
        $this->title = $title;
        return $this;
    }

    public function getTopic(): ?XMapContentTopicEntity
    {
        return $this->topic;
    }

    public function setTopic(?XMapContentTopicEntity $topic): XMapContentSheetEntity
    {
        $this->topic = $topic;
        return $this;
    }

    public function getRelationships(): ?XMapContentRelationshipsEntity
    {
        return $this->relationships;
    }

    public function setRelationships(?XMapContentRelationshipsEntity $relationships): XMapContentSheetEntity
    {
        $this->relationships = $relationships;
        return $this;
    }

    public function getLegend(): ?XMapContentLegendEntity
    {
        return $this->legend;
    }

    public function setLegend(?XMapContentLegendEntity $legend): XMapContentSheetEntity
    {
        $this->legend = $legend;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrId(): string
    {
        return $this->attrId;
    }

    /**
     * @return string
     */
    public function getAttrStyleId(): string
    {
        return $this->attrStyleId;
    }

    /**
     * @return string
     */
    public function getAttrTheme(): string
    {
        return $this->attrTheme;
    }

    /**
     * @param XMLWriter $xmlWriter
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute('id', $this->attrId);
        if ($this->attrStyleId !== null) {
            $xmlWriter->writeAttribute('style-id', $this->attrStyleId);
        }
        if ($this->attrTheme !== null) {
            $xmlWriter->writeAttribute('theme', $this->attrTheme);
        }

        self::writeThatNode($xmlWriter,$this->title);
        self::writeThatNode($xmlWriter,$this->topic);
        self::writeThatNode($xmlWriter,$this->relationships);
        self::writeThatNode($xmlWriter,$this->legend);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "sheet";
    }
}