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
     * @return string
     */
    public function getAttrVersion()
    {
        return $this->attrVersion;
    }

    /**
     * @param string $attrVersion
     * @return XMapStylesEntity
     */
    public function setAttrVersion($attrVersion)
    {
        $this->attrVersion = $attrVersion;
        return $this;
    }

    /**
     * @return XMapNormalStylesEntity
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @param XMapNormalStylesEntity $styles
     * @return XMapStylesEntity
     */
    public function setStyles($styles)
    {
        $this->styles = $styles;
        return $this;
    }

    /**
     * @return XMapMasterStylesEntity
     */
    public function getMasterStyles()
    {
        return $this->masterStyles;
    }

    /**
     * @param XMapMasterStylesEntity $masterStyles
     * @return XMapStylesEntity
     */
    public function setMasterStyles($masterStyles)
    {
        $this->masterStyles = $masterStyles;
        return $this;
    }

    /**
     * @return XMapAutomaticStylesEntity
     */
    public function getAutomaticStyles()
    {
        return $this->automaticStyles;
    }

    /**
     * @param XMapAutomaticStylesEntity $automaticStyles
     * @return XMapStylesEntity
     */
    public function setAutomaticStyles($automaticStyles)
    {
        $this->automaticStyles = $automaticStyles;
        return $this;
    }
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