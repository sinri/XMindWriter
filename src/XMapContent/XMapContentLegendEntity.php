<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentLegendEntity extends XMapNodeEntity
{
    const VISIBILITY_VISIBLE = "visible";
    const VISIBILITY_HIDDEN = "hidden";
    /**
     * @var string the visibility of this legend
     */
    protected $attrVisibility;
    /**
     * @var XMapContentPositionEntity|null [0,1] the position of this legend on the sheet
     */
    protected $position;
    /**
     * @var XMapContentMarkerDescriptionsEntity|null [0,1] the container of marker descriptions of this legend
     */
    protected $markerDescriptions;

    public function getPosition(): ?XMapContentPositionEntity
    {
        return $this->position;
    }

    public function setPosition(?XMapContentPositionEntity $position): XMapContentLegendEntity
    {
        $this->position = $position;
        return $this;
    }

    public function getMarkerDescriptions(): ?XMapContentMarkerDescriptionsEntity
    {
        return $this->markerDescriptions;
    }

    public function setMarkerDescriptions(?XMapContentMarkerDescriptionsEntity $markerDescriptions): XMapContentLegendEntity
    {
        $this->markerDescriptions = $markerDescriptions;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrVisibility(): string
    {
        return $this->attrVisibility;
    }

    /**
     * @param string $attrVisibility
     * @return XMapContentLegendEntity
     */
    public function setAttrVisibility(string $attrVisibility): XMapContentLegendEntity
    {
        $this->attrVisibility = $attrVisibility;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->attrVisibility !== null) {
            $xmlWriter->writeAttribute("visibility", $this->attrVisibility);
        }
        self::writeThatNode($xmlWriter, $this->position);
        self::writeThatNode($xmlWriter, $this->markerDescriptions);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "legend";
    }
}