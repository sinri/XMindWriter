<?php


namespace sinri\XMindWriter\XMarker;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMarkerSheetEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the version of this document, currently 2.0
     */
    protected $attrVersion;
    /**
     * @var XMarkerGroupEntity[] [0,n) groups of markers
     */
    protected $markerGroupList;

    public function __construct($version = "2.0")
    {
        $this->attrVersion = $version;
    }

    /**
     * @return string
     */
    public function getAttrVersion(): string
    {
        return $this->attrVersion;
    }

    /**
     * @param string $attrVersion
     * @return XMarkerSheetEntity
     */
    public function setAttrVersion(string $attrVersion): XMarkerSheetEntity
    {
        $this->attrVersion = $attrVersion;
        return $this;
    }

    /**
     * @return XMarkerGroupEntity[]
     */
    public function getMarkerGroupList(): array
    {
        return $this->markerGroupList;
    }

    /**
     * @param XMarkerGroupEntity[] $markerGroupList
     * @return XMarkerSheetEntity
     */
    public function setMarkerGroupList(array $markerGroupList): XMarkerSheetEntity
    {
        $this->markerGroupList = $markerGroupList;
        return $this;
    }

    /**
     * @param XMarkerGroupEntity $markerGroup
     * @return XMarkerSheetEntity
     */
    public function addMarkerGroup(XMarkerGroupEntity $markerGroup): XMarkerSheetEntity
    {
        $this->markerGroupList[] = $markerGroup;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("xmlns", "urn:xmind:xmap:xmlns:marker:2.0");
        $xmlWriter->writeAttribute("version", $this->attrVersion);

        if ($this->markerGroupList !== null) {
            foreach ($this->markerGroupList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "marker-sheet";
    }
}