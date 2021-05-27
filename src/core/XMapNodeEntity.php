<?php


namespace sinri\XMindWriter\core;


use XMLWriter;

abstract class XMapNodeEntity
{
    abstract protected function nodeTag(): string;

    final public function generateXMLToFile($file)
    {
        return file_put_contents($file, $this->generateXML());
    }

    /**
     * @return string
     */
    final public function generateXML(): string
    {
        $xw = new XMLWriter();
        $xw->openMemory();
        $xw->setIndent(true);
        $xw->setIndentString("  ");

        $xw->startDocument();

        $this->writeThisNode($xw);

        $xw->endDocument();
        return $xw->outputMemory();
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    abstract protected function writeThisNode(XMLWriter $xmlWriter);

    /**
     * @param XMLWriter $xmlWriter
     * @param XMapNodeEntity $nodeEntity
     */
    final protected static function writeThatNode(XMLWriter $xmlWriter, XMapNodeEntity $nodeEntity)
    {
        if ($nodeEntity !== null) {
            $nodeEntity->writeThisNode($xmlWriter);
        }
    }
}