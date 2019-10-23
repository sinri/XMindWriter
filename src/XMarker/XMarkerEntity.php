<?php


namespace sinri\XMindWriter\XMarker;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMarkerEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the unique identifier of this marker
     */
    protected $attrId;
    /**
     * @var string the name of this marker
     */
    protected $attrName;
    /**
     * @var string the location of the resource used to display this marker (e.g. an image file)
     */
    protected $attrResource;

    public function __construct($id, $name, $resource)
    {
        $this->attrId = $id;
        $this->attrName = $name;
        $this->attrResource = $resource;
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
     * @return XMarkerEntity
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
     * @return XMarkerEntity
     */
    public function setAttrName($attrName)
    {
        $this->attrName = $attrName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrResource()
    {
        return $this->attrResource;
    }

    /**
     * @param string $attrResource
     * @return XMarkerEntity
     */
    public function setAttrResource($attrResource)
    {
        $this->attrResource = $attrResource;
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
        if ($this->attrResource !== null) $xmlWriter->writeAttribute("resource", $this->attrResource);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "marker";
    }
}