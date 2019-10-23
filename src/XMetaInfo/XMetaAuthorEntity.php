<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMetaAuthorEntity extends XMapNodeEntity
{
    protected $name;
    protected $email;
    protected $org;

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        {
            $xmlWriter->startElement("Name");
            $xmlWriter->text($this->name);
            $xmlWriter->endElement();
        }
        {
            $xmlWriter->startElement("Email");
            $xmlWriter->text($this->email);
            $xmlWriter->endElement();
        }
        {
            $xmlWriter->startElement("Org");
            $xmlWriter->text($this->org);
            $xmlWriter->endElement();
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "Author";
    }
}