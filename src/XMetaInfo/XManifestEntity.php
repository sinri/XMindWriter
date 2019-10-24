<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XManifestEntity extends XMapNodeEntity
{
    protected $attrVersion;
    /**
     * @var XManifestFileEntryEntity[] [0,n) the file entries of this workbook
     */
    protected $fileEntryList;

    /**
     * @return string
     */
    public function getAttrVersion()
    {
        return $this->attrVersion;
    }

    /**
     * @param string $attrVersion
     */
    public function setAttrVersion($attrVersion)
    {
        $this->attrVersion = $attrVersion;
    }

    /**
     * @return XManifestFileEntryEntity[]
     */
    public function getFileEntryList()
    {
        return $this->fileEntryList;
    }

    /**
     * @param XManifestFileEntryEntity[] $fileEntryList
     */
    public function setFileEntryList($fileEntryList)
    {
        $this->fileEntryList = $fileEntryList;
    }

    public function __construct($version='2.0')
    {
        $this->attrVersion=$version;
        $this->fileEntryList=[];

        // default entries
        $this->addFileEntry("content.xml", "text/xml")
            ->addFileEntry("META-INF/", "")
            ->addFileEntry("META-INF/manifest.xml", "text/xml");
    }

    public function addFileEntryEntity($fileEntry){
        $this->fileEntryList[]=$fileEntry;
        return $this;
    }

    public function addFileEntry($fullPath, $mediaType){
        $this->fileEntryList[]=new XManifestFileEntryEntity($fullPath,$mediaType);
        return $this;
    }

    protected function nodeTag()
    {
        return "manifest";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("xmlns","urn:xmind:xmap:xmlns:manifest:1.0");
        $xmlWriter->writeAttribute("version",$this->attrVersion);

        foreach ($this->fileEntryList as $fileEntity){
            self::writeThatNode($xmlWriter,$fileEntity);
        }

        $xmlWriter->endElement();
    }
}