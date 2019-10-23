<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentMarkerRefEntity extends XMapNodeEntity
{

    /**
     * @var string (required) the identifier of the referenced marker
     */
    protected $attrMarkerId;

    public function __construct($markerId)
    {
        $this->attrMarkerId = $markerId;
    }

    /**
     * @return string
     */
    public function getAttrMarkerId()
    {
        return $this->attrMarkerId;
    }

    /**
     * @param string $attrMarkerId
     * @return XMapContentMarkerRefEntity
     */
    public function setAttrMarkerId($attrMarkerId)
    {
        $this->attrMarkerId = $attrMarkerId;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("marker-id", $this->attrMarkerId);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "marker-ref";
    }
}