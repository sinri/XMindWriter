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
     * @var XMapContentPositionEntity [0,1] the position of this legend on the sheet
     */
    protected $position;
    /**
     * @var XMapContentMarkerDescriptionsEntity [0,1] the container of marker descriptions of this legend
     */
    protected $markerDescriptions;

    /**
     * @return XMapContentPositionEntity
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param XMapContentPositionEntity $position
     * @return XMapContentLegendEntity
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return XMapContentMarkerDescriptionsEntity
     */
    public function getMarkerDescriptions()
    {
        return $this->markerDescriptions;
    }

    /**
     * @param XMapContentMarkerDescriptionsEntity $markerDescriptions
     * @return XMapContentLegendEntity
     */
    public function setMarkerDescriptions($markerDescriptions)
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
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->attrVisibility !== null) {
            $xmlWriter->writeAttribute("visibility", $this->attrVisibility);
        }
        self::writeThatNode($xmlWriter, $this->position);
        self::writeThatNode($xmlWriter, $this->markerDescriptions);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "legend";
    }
}