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
    public function getExtensionList(): array
    {
        return $this->extensionList;
    }

    /**
     * @param XMapContentExtensionEntity[] $extensionList
     * @return XMapContentExtensionsEntity
     */
    public function setExtensionList(array $extensionList): XMapContentExtensionsEntity
    {
        $this->extensionList = $extensionList;
        return $this;
    }

    /**
     * @param XMapContentExtensionEntity $extension
     * @return $this
     */
    public function addExtension(XMapContentExtensionEntity $extension): XMapContentExtensionsEntity
    {
        $this->extensionList[] = $extension;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->extensionList !== null) {
            foreach ($this->extensionList as $item) {
                self::writeThatNode($xmlWriter, $item);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return "extensions";
    }
}