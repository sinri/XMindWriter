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
    public function getAttrProvider()
    {
        return $this->attrProvider;
    }

    /**
     * @param string $attrProvider
     * @return XMapContentExtensionEntity
     */
    public function setAttrProvider($attrProvider)
    {
        $this->attrProvider = $attrProvider;
        return $this;
    }
    /**
     * @var XMapNodeEntity [0,1] the content of this extension
     * Format Free
     * A content element represents the content of a topic extension.
     * This element is not restricted and is available to store any information provided by the extension provider.
     */
    protected $content;

    /**
     * @return XMapNodeEntity
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param XMapNodeEntity $content
     * @return XMapContentExtensionEntity
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return XMapContentResourceRefsEntity
     */
    public function getResourceRefs()
    {
        return $this->resourceRefs;
    }

    /**
     * @param XMapContentResourceRefsEntity $resourceRefs
     * @return XMapContentExtensionEntity
     */
    public function setResourceRefs($resourceRefs)
    {
        $this->resourceRefs = $resourceRefs;
        return $this;
    }

    /**
     * @var XMapContentResourceRefsEntity [0,1] the container of resource references used by this extension
     */
    protected $resourceRefs;

    protected function nodeTag()
    {
        return "extension";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute("provider", $this->attrProvider);
        self::writeThatNode($xmlWriter, $this->content);
        self::writeThatNode($xmlWriter, $this->resourceRefs);
        $xmlWriter->endElement();
    }
}