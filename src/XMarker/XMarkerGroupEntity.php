<?php


namespace sinri\XMindWriter\XMarker;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMarkerGroupEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the unique identifier of this marker group
     */
    protected $attrId;
    /**
     * @var string the name of this marker group
     */
    protected $attrName;
    /**
     * @var boolean whether this marker group is singleton
     * No more than one marker from a singleton group can be referenced by one single topic.
     */
    protected $attrSingleton;
    /**
     * @var XMarkerEntity[] [0,n) markers in this group
     */
    protected $markerList;

    /**
     * @return string
     */
    public function getAttrId(): string
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMarkerGroupEntity
     */
    public function setAttrId(string $attrId): XMarkerGroupEntity
    {
        $this->attrId = $attrId;
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
     * @return XMarkerGroupEntity
     */
    public function setAttrName(string $attrName): XMarkerGroupEntity
    {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAttrSingleton(): bool
    {
        return $this->attrSingleton;
    }

    /**
     * @param bool $attrSingleton
     * @return XMarkerGroupEntity
     */
    public function setAttrSingleton(bool $attrSingleton): XMarkerGroupEntity
    {
        $this->attrSingleton = $attrSingleton;
        return $this;
    }

    /**
     * @return XMarkerEntity[]
     */
    public function getMarkerList(): array
    {
        return $this->markerList;
    }

    /**
     * @param XMarkerEntity[] $markerList
     * @return XMarkerGroupEntity
     */
    public function setMarkerList(array $markerList): XMarkerGroupEntity
    {
        $this->markerList = $markerList;
        return $this;
    }

    /**
     * @param XMarkerEntity $marker
     * @return $this
     */
    public function addMarkerEntity(XMarkerEntity $marker): XMarkerGroupEntity
    {
        $this->markerList[] = $marker;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("id", $this->attrId);
        if ($this->attrName !== null) $xmlWriter->writeAttribute("name", $this->attrName);
        if ($this->attrSingleton !== null) $xmlWriter->writeAttribute("singleton", $this->attrSingleton);
        if ($this->markerList !== null) {
            foreach ($this->markerList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "marker-group";
    }
}