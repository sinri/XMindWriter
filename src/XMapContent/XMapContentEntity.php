<?php


namespace sinri\XMindWriter\XMapContent;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMapContentEntity extends XMapNodeEntity
{
    protected $attrVersion;
    /**
     * @var XMapContentSheetEntity[] [1,n) the sheets of this workbook
     */
    protected $sheetList;

    public function __construct($version='2.0')
    {
        $this->attrVersion=$version;
        $this->sheetList=[];
    }

    /**
     * @param XMapContentSheetEntity $sheet
     */
    public function addSheet($sheet){
        $this->sheetList[]=$sheet;
    }

    protected function nodeTag()
    {
        return "xmap-content";
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return mixed
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute('xmlns',"urn:xmind:xmap:xmlns:content:".$this->attrVersion);
        $xmlWriter->writeAttribute('version',$this->attrVersion);

        foreach ($this->sheetList as $sheetEntity){
//            $sheetEntity->writeThisNode($xmlWriter);
            self::writeThatNode($xmlWriter,$sheetEntity);
        }

        $xmlWriter->endElement();
    }
}