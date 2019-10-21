<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapStyleEntity extends XMapNodeEntity
{
    const TYPE_TOPIC="topic";
    const TYPE_MAP="map";
    const TYPE_BOUNDARY="boundary";
    const TYPE_RELATIONSHIP="relationship";
    const TYPE_SUMMARY="summary";
    const TYPE_THEME="theme";

    /**
     * @var string (required) the global identifier of this style
     */
    protected $attrId;
    /**
     * @var string (required) the type of this style
     */
    protected $attrType;
    /**
     * @var string the name of this style
     */
    protected $attrName;

    /**
     * @var ? xxx-properties
     * [0,n) xxx must be the the type attribute of this style element
     */
    protected $typeProperties;

    protected function nodeTag()
    {
        return "style";
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