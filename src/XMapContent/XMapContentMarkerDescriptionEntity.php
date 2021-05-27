<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentMarkerDescriptionEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the identifier of the marker being described
     */
    protected $attrMarkerId;
    /**
     * @var string (required) the description of this marker in this sheet
     */
    protected $attrDescription;

    /**
     * @return string
     */
    public function getAttrDescription(): string
    {
        return $this->attrDescription;
    }

    /**
     * @param string $attrDescription
     * @return XMapContentMarkerDescriptionEntity
     */
    public function setAttrDescription(string $attrDescription): XMapContentMarkerDescriptionEntity
    {
        $this->attrDescription = $attrDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrMarkerId(): string
    {
        return $this->attrMarkerId;
    }

    /**
     * @param string $attrMarkerId
     * @return XMapContentMarkerDescriptionEntity
     */
    public function setAttrMarkerId(string $attrMarkerId): XMapContentMarkerDescriptionEntity
    {
        $this->attrMarkerId = $attrMarkerId;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("marker-id", $this->attrMarkerId);
        $xmlWriter->writeAttribute("description", $this->attrDescription);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "marker-description";
    }
}