<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

class XManifestEncryptionKeyDerivationEntity extends XMapNodeEntity
{
    /**
     * @var string (required) the name of the key-derivation algorithm, e.g. PBKDF2WithHmacSHA512
     */
    protected $keyDerivationName;
    /**
     * @var int the length of the secret key (in bits), e.g. 128
     */
    protected $size;
    /**
     * @var int iteration count of the key derivation, e.g. 1024
     */
    protected $iterationCount;
    /**
     * @var string the initialization vector (IV) encoded by Base64, random for each file entry
     */
    protected $iv;
    /**
     * @var string the salt encoded by Base64, random for each file entry
     */
    protected $salt;

    /**
     * @return string
     */
    public function getKeyDerivationName(): string
    {
        return $this->keyDerivationName;
    }

    /**
     * @param string $keyDerivationName
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function setKeyDerivationName(string $keyDerivationName): XManifestEncryptionKeyDerivationEntity
    {
        $this->keyDerivationName = $keyDerivationName;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function setSize(int $size): XManifestEncryptionKeyDerivationEntity
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getIterationCount(): int
    {
        return $this->iterationCount;
    }

    /**
     * @param int $iterationCount
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function setIterationCount(int $iterationCount): XManifestEncryptionKeyDerivationEntity
    {
        $this->iterationCount = $iterationCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getIv(): string
    {
        return $this->iv;
    }

    /**
     * @param string $iv
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function setIv(string $iv): XManifestEncryptionKeyDerivationEntity
    {
        $this->iv = $iv;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function setSalt(string $salt): XManifestEncryptionKeyDerivationEntity
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        $xmlWriter->writeAttribute('key-derivation-name', $this->keyDerivationName);

        $optionalAttributes = [
            'size' => $this->size,
            'iteration-count' => $this->iterationCount,
            'iv' => $this->iv,
            'salt' => $this->salt,
        ];
        foreach ($optionalAttributes as $key => $value) {
            if ($value !== null) {
                $xmlWriter->writeAttribute($key, $value);
            }
        }
        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return 'key-derivation';
    }
}