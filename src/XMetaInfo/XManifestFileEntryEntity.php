<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XManifestFileEntryEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the full path of this file entry within the archive
     */
    protected $attrFullPath;

    /**
     * @return string
     */
    public function getAttrFullPath(): string
    {
        return $this->attrFullPath;
    }

    /**
     * @param string $attrFullPath
     * @return XManifestFileEntryEntity
     */
    public function setAttrFullPath(string $attrFullPath): XManifestFileEntryEntity
    {
        $this->attrFullPath = $attrFullPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrMediaType(): string
    {
        return $this->attrMediaType;
    }

    /**
     * @param string $attrMediaType
     * @return XManifestFileEntryEntity
     */
    public function setAttrMediaType(string $attrMediaType): XManifestFileEntryEntity
    {
        $this->attrMediaType = $attrMediaType;
        return $this;
    }
    /**
     * @var string the media type of this file entry
     */
    protected $attrMediaType;
    /**
     * @var XManifestEncryptionDataEntity [0,1] the encryption data of this file entry (if encrypted)
     * A encryption-data element contains encryption information of a file entry.
     * See [Encryption](https://github.com/xmindltd/xmind/wiki/XMindFileFormat#encryption) section for details.
     */
    protected $encryptionData;

    public function __construct($fullPath,$mediaType="")
    {
        $this->attrFullPath=$fullPath;
        $this->attrMediaType=$mediaType;
    }

    protected function nodeTag(): string
    {
        return "file-entry";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("full-path", $this->attrFullPath);
        if ($this->attrMediaType !== null) $xmlWriter->writeAttribute("media-type", $this->attrMediaType);

        self::writeThatNode($xmlWriter, $this->encryptionData);

        $xmlWriter->endElement();
    }
}