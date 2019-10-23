<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentExtensionsEntity extends XMapNodeEntity
{
    /**
     * @var XMapContentExtensionEntity[] [0,n) extensions of the topic
     */
    protected $extensionList;

    /**
     * @return XMapContentExtensionEntity[]
     */
    public function getExtensionList()
    {
        return $this->extensionList;
    }

    /**
     * @param XMapContentExtensionEntity[] $extensionList
     * @return XMapContentExtensionsEntity
     */
    public function setExtensionList($extensionList)
    {
        $this->extensionList = $extensionList;
        return $this;
    }

    /**
     * @param XMapContentExtensionEntity $extension
     * @return $this
     */
    public function addExtension($extension)
    {
        $this->extensionList[] = $extension;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->extensionList !== null) {
            foreach ($this->extensionList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "extensions";
    }
}