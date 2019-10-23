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
    public function getAttrId()
    {
        return $this->attrId;
    }

    /**
     * @param string $attrId
     * @return XMarkerGroupEntity
     */
    public function setAttrId($attrId)
    {
        $this->attrId = $attrId;
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
     * @return XMarkerGroupEntity
     */
    public function setAttrName($attrName)
    {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAttrSingleton()
    {
        return $this->attrSingleton;
    }

    /**
     * @param bool $attrSingleton
     * @return XMarkerGroupEntity
     */
    public function setAttrSingleton($attrSingleton)
    {
        $this->attrSingleton = $attrSingleton;
        return $this;
    }

    /**
     * @return XMarkerEntity[]
     */
    public function getMarkerList()
    {
        return $this->markerList;
    }

    /**
     * @param XMarkerEntity[] $markerList
     * @return XMarkerGroupEntity
     */
    public function setMarkerList($markerList)
    {
        $this->markerList = $markerList;
        return $this;
    }

    /**
     * @param XMarkerEntity $marker
     * @return $this
     */
    public function addMarkerEntity($marker)
    {
        $this->markerList[] = $marker;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
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

    protected function nodeTag()
    {
        return "marker-group";
    }
}