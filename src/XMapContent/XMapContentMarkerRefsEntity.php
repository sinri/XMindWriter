<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentMarkerRefsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentMarkerRefEntity[] [0,n) the references to markers
     */
    protected $markerRefList;

    /**
     * @param XMapContentMarkerRefEntity $markerEntity
     * @return XMapContentMarkerRefsEntity
     */
    public function addMarkerAsEntity($markerEntity)
    {
        $this->markerRefList[] = $markerEntity;
        return $this;
    }

    /**
     * @param string $markerId
     * @return $this
     */
    public function addMarkerWithId($markerId)
    {
        $this->markerRefList[] = new XMapContentMarkerRefEntity($markerId);
        return $this;
    }

    /**
     * @return XMapContentMarkerRefEntity[]
     */
    public function getMarkerRefList()
    {
        return $this->markerRefList;
    }

    /**
     * @param mixed $markerRefList
     * @return XMapContentMarkerRefsEntity
     */
    public function setMarkerRefList($markerRefList)
    {
        $this->markerRefList = $markerRefList;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        if ($this->markerRefList !== null) {
            foreach ($this->markerRefList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "marker-refs";
    }
}