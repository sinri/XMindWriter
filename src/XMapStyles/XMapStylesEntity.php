<?php


namespace sinri\XMindWriter\XMapStyles;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapStylesEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the version of this document, currently 2.0
     */
    protected $attrVersion;
    /**
     * @var XMapNormalStylesEntity normal styles
     */
    protected $styles;
    /**
     * @var XMapMasterStylesEntity master styles
     */
    protected $masterStyles;
    /**
     * @var XMapAutomaticStylesEntity automatic styles
     */
    protected $automaticStyles;

    public function __construct($version="2.0")
    {
        $this->attrVersion=$version;
    }

    protected function nodeTag()
    {
        return "xmap-styles";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("xmlns","urn:xmind:xmap:xmlns:style:".$this->attrVersion);
        $xmlWriter->writeAttribute("xmlns:fo","http://www.w3.org/1999/XSL/Format");
        $xmlWriter->writeAttribute("xmlns:svg","http://www.w3.org/2000/svg");
        $xmlWriter->writeAttribute("version",$this->attrVersion);

        self::writeThatNode($xmlWriter,$this->styles);
        self::writeThatNode($xmlWriter,$this->masterStyles);
        self::writeThatNode($xmlWriter,$this->automaticStyles);

        $xmlWriter->endElement();
    }
}