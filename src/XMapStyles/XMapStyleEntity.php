<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapStyleEntity extends XMapNodeEntity
{
    const TYPE_TOPIC="topic";
    const TYPE_MAP="map";
    const TYPE_BOUNDARY="boundary";
    const TYPE_RELATIONSHIP="relationship";
    const TYPE_SUMMARY="summary";
    const TYPE_THEME="theme";

    /**
     * @var string (required) the global identifier of this style
     */
    protected $attrId;
    /**
     * @var string (required) the type of this style
     */
    protected $attrType;
    /**
     * @var string the name of this style
     */
    protected $attrName;
    /**
     * @var XMapStyleTypePropertiesEntity[] xxx-properties
     * [0,n) xxx must be the the type attribute of this style element
     * [TYPE=>PROPERTIES]
     */
    protected $typePropertiesDict;

    /**
     * XMapStyleEntity constructor.
     * @param string $id
     * @param string $type
     * @param string $name
     * @param XMapStyleTypePropertiesEntity $properties
     */
    public function __construct($id, $type, $name, $properties)
    {
        $this->attrId = $id;
        $this->attrType = $type;
        $this->attrName = $name;
        $this->setPropertiesForType($type, $properties);
    }

    /**
     * @return string
     */
    public function getAttrId()
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapStyleEntity
     */
    public function setAttrId($attrId)
    {
        $this->attrId = $attrId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrType()
    {
        return $this->attrType;
    }

    /**
     * @param string $attrType
     * @return XMapStyleEntity
     */
    public function setAttrType($attrType)
    {
        $this->attrType = $attrType;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrName()
    {
        return $this->attrName;
    }

    /**
     * @param string $attrName
     * @return XMapStyleEntity
     */
    public function setAttrName($attrName)
    {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * @return XMapStyleTypePropertiesEntity[]
     */
    public function getTypePropertiesDict()
    {
        return $this->typePropertiesDict;
    }

    /**
     * @param XMapStyleTypePropertiesEntity[] $typePropertiesDict
     * @return XMapStyleEntity
     */
    public function setTypePropertiesDict($typePropertiesDict)
    {
        $this->typePropertiesDict = $typePropertiesDict;
        return $this;
    }

    /**
     * @param string $type
     * @param XMapStyleTypePropertiesEntity $properties
     */
    public function setPropertiesForType($type, $properties)
    {
        $this->typePropertiesDict[$type] = $properties;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("id", $this->attrId);
        $xmlWriter->writeAttribute("type", $this->attrType);
        if ($this->attrName !== null) $xmlWriter->writeAttribute("name", $this->attrName);

        if ($this->typePropertiesDict !== null) {
            foreach ($this->typePropertiesDict as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "style";
    }
}