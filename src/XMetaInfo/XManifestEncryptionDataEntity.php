<?php


namespace sinri\XMindWriter\XMetaInfo;


use sinri\XMindWriter\core\XMapNodeEntity;
use XMLWriter;

/**
 * Class XManifestEncryptionDataEntity
 * @package sinri\XMindWriter\XMetaInfo
 *
 * Notice from [GitHub Doc](https://github.com/xmindltd/xmind/wiki/XMindFileFormat#meta-infmanifestxml)
 *
 * Creators of XMind files may choose to protect the file content by encrypting it against a password,
 * and then any one who wants to read the content from the file
 * have to use the same password and the same encryption methods to decrypt it in prior.
 *
 * Since an XMind file is composite content,
 * the creator may choose which components to be encrypted and how they are encrypted.
 * The encryption information of each file entry, EXCEPT the password,
 * should be recorded in the META-INF/manifest.xml file,
 * and thus the META-INF/manifest.xml itself should never be encrypted.
 *
 * Recent versions of XMind applications (v3.6.50+)
 * use the following two algorithms and parameters to do encryption/decryption:
 *
 * Cipher algorithm: AES/CBC/PKCS5Padding
 *  Key: derived from password using the following key-derivation algorithm
 *  IV: 16 random bytes
 * Key-derivation algorithm: PBKDF2WithHmacSHA512
 *  Password: the password given by the creator/reader
 *  Salt: 8 random bytes
 *  Iteration Count: 1024 (times)
 *  Key Size: 128 (bits)
 *
 * However, versions before XMind 7.5 (v3.6.50) use a legacy key-derivation algorithm PKCS12
 * and a byte array of 16 0x00 (i.e. new byte[16]) as the IV.
 * Newer versions of XMind applications can read these files,
 * but saves them in the new format which can't be opened by older versions.
 */
class XManifestEncryptionDataEntity extends XMapNodeEntity
{
    /**
     * @var string name of the algorithm used to generate the file checksum
     */
    protected $checksumType;
    /**
     * @var string the checksum result generated using the algorithm defined by checksum-type against the content of the file entry
     */
    protected $checksum;
    /**
     * @var XManifestEncryptionAlgorithmEntity [1,1] the encryption algorithm and parameters
     */
    protected $algorithm;
    /**
     * @var XManifestEncryptionKeyDerivationEntity [1,1] the key derivation algorithm and parameters
     */
    protected $keyDerivation;

    /**
     * @return string
     */
    public function getChecksumType(): string
    {
        return $this->checksumType;
    }

    /**
     * @param string $checksumType
     * @return XManifestEncryptionDataEntity
     */
    public function setChecksumType(string $checksumType): XManifestEncryptionDataEntity
    {
        $this->checksumType = $checksumType;
        return $this;
    }

    /**
     * @return string
     */
    public function getChecksum(): string
    {
        return $this->checksum;
    }

    /**
     * @param string $checksum
     * @return XManifestEncryptionDataEntity
     */
    public function setChecksum(string $checksum): XManifestEncryptionDataEntity
    {
        $this->checksum = $checksum;
        return $this;
    }

    /**
     * @return XManifestEncryptionAlgorithmEntity
     */
    public function getAlgorithm(): XManifestEncryptionAlgorithmEntity
    {
        return $this->algorithm;
    }

    /**
     * @param XManifestEncryptionAlgorithmEntity $algorithm
     * @return XManifestEncryptionDataEntity
     */
    public function setAlgorithm(XManifestEncryptionAlgorithmEntity $algorithm): XManifestEncryptionDataEntity
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * @return XManifestEncryptionKeyDerivationEntity
     */
    public function getKeyDerivation(): XManifestEncryptionKeyDerivationEntity
    {
        return $this->keyDerivation;
    }

    /**
     * @param XManifestEncryptionKeyDerivationEntity $keyDerivation
     * @return XManifestEncryptionDataEntity
     */
    public function setKeyDerivation(XManifestEncryptionKeyDerivationEntity $keyDerivation): XManifestEncryptionDataEntity
    {
        $this->keyDerivation = $keyDerivation;
        return $this;
    }

    /**
     * @param XMLWriter $xmlWriter
     * @return void
     */
    protected function writeThisNode(XMLWriter $xmlWriter)
    {
        $xmlWriter->startElement($this->nodeTag());
        if ($this->checksumType !== null)
            $xmlWriter->writeAttribute('checksum-type', $this->checksumType);
        if ($this->checksum !== null)
            $xmlWriter->writeAttribute('checksum', $this->checksum);

        self::writeThatNode($xmlWriter, $this->algorithm);
        self::writeThatNode($xmlWriter, $this->keyDerivation);

        $xmlWriter->endElement();
    }

    protected function nodeTag(): string
    {
        return 'encryption-data';
    }
}