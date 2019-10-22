<?php


namespace sinri\XMindWriter\core;


use XMLWriter;

abstract class XMapNodeEntity
{
//    const PREFIX_OF_ATTRIBUTE="attribute";
//    const PREFIX_OF_ELEMENT="element";

//    /**
//     * @var string[]
//     */
//    protected $attributes;
//    /**
//     * @var XMapNodeEntity[]
//     */
//    protected $elements;
//    /**
//     * @var string
//     */
//    protected $textContent;

    abstract protected function nodeTag();

    final public function generateXMLToFile($file){
        return file_put_contents($file,$this->generateXML());
    }

    final public function generateXML(){
        $xw=new XMLWriter();
        $xw->openMemory();
        $xw->setIndent(true);
        $xw->setIndentString("  ");

        $xw->startDocument("1.0");

        $this->writeThisNode($xw);

        $xw->endDocument();
        return $xw->outputMemory();
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    abstract protected function writeThisNode($xmlWriter);

    /**
     * @param XMLWriter $xmlWriter
     * @param XMapNodeEntity $nodeEntity
     */
    final protected static function writeThatNode($xmlWriter,$nodeEntity)
    {
        if($nodeEntity!==null) {
            $nodeEntity->writeThisNode($xmlWriter);
        }
    }
}