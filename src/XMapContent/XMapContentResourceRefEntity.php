<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentResourceRefEntity extends XMapNodeEntity
{
    const TYPE_FILE_ENTRY = "file-entry";

    /**
     * @var string (required) the global identifier of this resource
     */
    protected $attrResourceId;
    /**
     * @var string (required) the type of this resource (currently only `file-entry` is supported)
     * `file-entry`: the resource is a file entry within this workbook
     */
    protected $attrType;

    public function __construct($resourceId, $type = self::TYPE_FILE_ENTRY)
    {
        $this->attrResourceId = $resourceId;
        $this->attrType = $type;
    }

    /**
     * @return string
     */
    public function getAttrType()
    {
        return $this->attrType;
    }

    /**
     * @param string $attrType
     * @return XMapContentResourceRefEntity
     */
    public function setAttrType($attrType)
    {
        $this->attrType = $attrType;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrResourceId()
    {
        return $this->attrResourceId;
    }

    /**
     * @param string $attrResourceId
     * @return XMapContentResourceRefEntity
     */
    public function setAttrResourceId($attrResourceId)
    {
        $this->attrResourceId = $attrResourceId;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("resource-id", $this->attrResourceId);
        $xmlWriter->writeAttribute("type", $this->attrType);
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "resource-ref";
    }
}