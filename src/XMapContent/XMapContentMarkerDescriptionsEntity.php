<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentMarkerDescriptionsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentMarkerDescriptionEntity[] [0,n) the marker description of the legend
     */
    protected $markerDescriptionList;

    /**
     * @param XMapContentMarkerDescriptionEntity $markerDescription
     * @return $this
     */
    public function addMarkerDescription(XMapContentMarkerDescriptionEntity $markerDescription): XMapContentMarkerDescriptionsEntity
    {
        $this->markerDescriptionList[] = $markerDescription;
        return $this;
    }

    /**
     * @return XMapContentMarkerDescriptionEntity[]
     */
    public function getMarkerDescriptionList(): array
    {
        return $this->markerDescriptionList;
    }

    /**
     * @param XMapContentMarkerDescriptionEntity[] $markerDescriptionList
     * @return XMapContentMarkerDescriptionsEntity
     */
    public function setMarkerDescriptionList(array $markerDescriptionList): XMapContentMarkerDescriptionsEntity
    {
        $this->markerDescriptionList = $markerDescriptionList;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->markerDescriptionList !== null) {
            foreach ($this->markerDescriptionList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "marker-descriptions";
    }
}