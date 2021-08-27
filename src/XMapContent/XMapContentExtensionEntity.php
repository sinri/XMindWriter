<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentExtensionEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the provider of this topic extension
     * Note: if multiple topic extensions have the same provider, only the first one will be available.
     */
    protected $attrProvider;

    /**
     * @return string
     */
    public function getAttrProvider(): string
    {
        return $this->attrProvider;
    }

    /**
     * @param string $attrProvider
     * @return XMapContentExtensionEntity
     */
    public function setAttrProvider(string $attrProvider): XMapContentExtensionEntity
    {
        $this->attrProvider = $attrProvider;
        return $this;
    }
    /**
     * @var XMapNodeEntity|null [0,1] the content of this extension
     * Format Free
     * A content element represents the content of a topic extension.
     * This element is not restricted and is available to store any information provided by the extension provider.
     */
    protected $content;

    public function getContent(): ?XMapNodeEntity
    {
        return $this->content;
    }

    public function setContent(?XMapNodeEntity $content): XMapContentExtensionEntity
    {
        $this->content = $content;
        return $this;
    }

    public function getResourceRefs(): ?XMapContentResourceRefsEntity
    {
        return $this->resourceRefs;
    }

    public function setResourceRefs(?XMapContentResourceRefsEntity $resourceRefs): XMapContentExtensionEntity
    {
        $this->resourceRefs = $resourceRefs;
        return $this;
    }

    /**
     * @var XMapContentResourceRefsEntity|null [0,1] the container of resource references used by this extension
     */
    protected $resourceRefs;

    protected function nodeTag(): string
    {
        return "extension";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("provider", $this->attrProvider);
        self::writeThatNode($xmlWriter, $this->content);
        self::writeThatNode($xmlWriter, $this->resourceRefs);
        $xmlWriter->endElement();
    }
}