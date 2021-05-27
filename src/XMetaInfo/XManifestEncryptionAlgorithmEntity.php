<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XManifestEncryptionAlgorithmEntity extends XMapNodeEntity
{
    const ALGORITHM_AES = 'AES';
    const ALGORITHM_CBC = 'CBC';
    const ALGORITHM_PKCS_5_PADDING = 'PKCS5Padding';

    /**
     * @var string the name of the cipher algorithm, e.g. AES/CBC/PKCS5Padding
     */
    protected $algorithmName;

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return $this->algorithmName;
    }

    /**
     * @param string $algorithmName
     * @return XManifestEncryptionAlgorithmEntity
     */
    public function setAlgorithmName(string $algorithmName): XManifestEncryptionAlgorithmEntity
    {
        $this->algorithmName = $algorithmName;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute('algorithm-name', $this->algorithmName);
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return 'algorithm';
    }
}