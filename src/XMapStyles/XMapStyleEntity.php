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
    public function __construct(string $id, string $type, string $name, XMapStyleTypePropertiesEntity $properties)
    {
        $this->attrId = $id;
        $this->attrType = $type;
        $this->attrName = $name;
        $this->setPropertiesForType($type, $properties);
    }

    /**
     * @return string
     */
    public function getAttrId(): string
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMapStyleEntity
     */
    public function setAttrId(string $attrId): XMapStyleEntity
    {
        $this->attrId = $attrId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrType(): string
    {
        return $this->attrType;
    }

    /**
     * @param string $attrType
     * @return XMapStyleEntity
     */
    public function setAttrType(string $attrType): XMapStyleEntity
    {
        $this->attrType = $attrType;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrName(): string
    {
        return $this->attrName;
    }

    /**
     * @param string $attrName
     * @return XMapStyleEntity
     */
    public function setAttrName(string $attrName): XMapStyleEntity
    {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * @return XMapStyleTypePropertiesEntity[]
     */
    public function getTypePropertiesDict(): array
    {
        return $this->typePropertiesDict;
    }

    /**
     * @param XMapStyleTypePropertiesEntity[] $typePropertiesDict
     * @return XMapStyleEntity
     */
    public function setTypePropertiesDict(array $typePropertiesDict): XMapStyleEntity
    {
        $this->typePropertiesDict = $typePropertiesDict;
        return $this;
    }

    /**
     * @param string $type
     * @param XMapStyleTypePropertiesEntity $properties
     */
    public function setPropertiesForType(string $type, XMapStyleTypePropertiesEntity $properties)
    {
        $this->typePropertiesDict[$type] = $properties;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
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

    protected function nodeTag(): string
    {
        return "style";
    }
}