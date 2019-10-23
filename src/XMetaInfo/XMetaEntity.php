<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XMetaEntity extends XMapNodeEntity
{
    protected $authorName;
    protected $authorEmail;
    protected $authorOrg;

    protected $createTime;

    protected $creatorName;
    protected $creatorVersion;

    protected $attrVersion;

    public function __construct($version = "2.0")
    {
        $this->attrVersion = $version;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     * @return XMetaEntity
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param mixed $authorEmail
     * @return XMetaEntity
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorOrg()
    {
        return $this->authorOrg;
    }

    /**
     * @param mixed $authorOrg
     * @return XMetaEntity
     */
    public function setAuthorOrg($authorOrg)
    {
        $this->authorOrg = $authorOrg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param mixed $createTime
     * @return XMetaEntity
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatorName()
    {
        return $this->creatorName;
    }

    /**
     * @param mixed $creatorName
     * @return XMetaEntity
     */
    public function setCreatorName($creatorName)
    {
        $this->creatorName = $creatorName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatorVersion()
    {
        return $this->creatorVersion;
    }

    /**
     * @param mixed $creatorVersion
     * @return XMetaEntity
     */
    public function setCreatorVersion($creatorVersion)
    {
        $this->creatorVersion = $creatorVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttrVersion()
    {
        return $this->attrVersion;
    }

    /**
     * @param string $attrVersion
     * @return XMetaEntity
     */
    public function setAttrVersion($attrVersion)
    {
        $this->attrVersion = $attrVersion;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode($xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());

        $xmlWriter->writeAttribute("xmlns", "urn:xmind:xmap:xmlns:meta:2.0");
        $xmlWriter->writeAttribute("version", $this->attrVersion);

        if (
            $this->authorName !== null
            || $this->authorEmail !== null
            || $this->authorOrg !== null
        ) {
            $xmlWriter->startElement('Author');

            if ($this->authorName !== null) {
                $xmlWriter->startElement("Name");
                $xmlWriter->text($this->authorName);
                $xmlWriter->endElement();
            }
            if ($this->authorEmail !== null) {
                $xmlWriter->startElement("Email");
                $xmlWriter->text($this->authorEmail);
                $xmlWriter->endElement();
            }
            if ($this->authorOrg !== null) {
                $xmlWriter->startElement("Org");
                $xmlWriter->text($this->authorOrg);
                $xmlWriter->endElement();
            }

            $xmlWriter->endElement();
        }

        if (
            $this->createTime !== null
        ) {
            $xmlWriter->startElement('Create');

            if (
                $this->createTime !== null
            ) {
                $xmlWriter->startElement("Time");
                $xmlWriter->text($this->createTime);
                $xmlWriter->endElement();
            }

            $xmlWriter->endElement();
        }

        if (
            $this->creatorName !== null
            || $this->creatorVersion !== null
        ) {
            $xmlWriter->startElement('Creator');

            if ($this->creatorName !== null) {
                $xmlWriter->startElement("Name");
                $xmlWriter->text($this->creatorName);
                $xmlWriter->endElement();
            }
            if ($this->creatorVersion !== null) {
                $xmlWriter->startElement("Version");
                $xmlWriter->text($this->creatorVersion);
                $xmlWriter->endElement();
            }

            $xmlWriter->endElement();
        }

        $xmlWriter->endElement();
    }

    protected function nodeTag()
    {
        return "meta";
    }
}