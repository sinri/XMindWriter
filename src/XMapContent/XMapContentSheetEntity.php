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
     * @var XMapContentTitleEntity [0,1] the title of this sheet
     */
    protected $title;
    /**
     * @var XMapContentTopicEntity [0,1] the root topic of this sheet
     */
    protected $topic;
    /**
     * @var XMapContentRelationshipsEntity [0,1] the relationship container of this sheet
     */
    protected $relationships;
    /**
     * @var ? [0,1] the legend of this sheet
     * @todo
     */
    protected $legend;

    public function __construct($id,$titleText=null)
    {
        $this->attrId=$id;
        if($titleText!==null)$this->title=new XMapContentTitleEntity($titleText);
    }

    /**
     * @return XMapContentTitleEntity
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param XMapContentTitleEntity $title
     * @return XMapContentSheetEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return XMapContentTopicEntity
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param XMapContentTopicEntity $topic
     * @return XMapContentSheetEntity
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @return XMapContentRelationshipsEntity
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * @param XMapContentRelationshipsEntity $relationships
     * @return XMapContentSheetEntity
     */
    public function setRelationships($relationships)
    {
        $this->relationships = $relationships;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param ? $legend
     * @return XMapContentSheetEntity
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrId()
    {
        return $this->attrId;
    }

    /**
     * @return string
     */
    public function getAttrStyleId()
    {
        return $this->attrStyleId;
    }

    /**
     * @return string
     */
    public function getAttrTheme()
    {
        return $this->attrTheme;
    }

    /**
     * @param XMLWriter $xmlWriter
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute('id',$this->attrId);
        if($this->attrStyleId!==null){
            $xmlWriter->writeAttribute('style-id',$this->attrStyleId);
        }
        if($this->attrTheme!==null){
            $xmlWriter->writeAttribute('theme',$this->attrTheme);
        }

        self::writeThatNode($xmlWriter,$this->title);
        self::writeThatNode($xmlWriter,$this->topic);
        self::writeThatNode($xmlWriter,$this->relationships);
        self::writeThatNode($xmlWriter,$this->legend);

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "sheet";
    }
}