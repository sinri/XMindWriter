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
     * @var XMapNodeEntity [0,1] the content of this extension
     * Format Free
     * A content element represents the content of a topic extension.
     * This element is not restricted and is available to store any information provided by the extension provider.
     */
    protected $content;
    /**
     * @var ? [0,1] the container of resource references used by this extension
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
        // TODO: Implement writeThisNode() method.
    }
}