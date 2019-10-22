<?php


namespace sinri\XMindWriter\core;


use Exception;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;
use ZipArchive;

class XMindDirZipper
{
    /**
     * @var string a(n empty) dir to save temp files
     */
    protected $workspace;
    /**
     * @var string path of the `.xmind` to be
     */
    protected $targetXMindFile;

    /**
     * @var XMapContentEntity
     */
    protected $contentEntity;
    /**
     * @var XManifestEntity
     */
    protected $manifestEntity;

    public function __construct($workspace, $target)
    {
        $this->workspace = $workspace;
        $this->targetXMindFile = $target;

        if (!file_exists($this->workspace)) @mkdir($workspace, 0777, true);
    }

    /**
     * @throws Exception
     */
    public function buildXMind()
    {
        // generate XML files
        $this->contentEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'content.xml');
        $this->manifestEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'META-INF' . DIRECTORY_SEPARATOR . 'manifest.xml');

        // generate ZIP file
        $rootDir = realpath($this->workspace) . DIRECTORY_SEPARATOR;
        if (!is_dir($rootDir)) throw new Exception("Not a dir");

        $zip=new ZipArchive();
        $zip->open($this->targetXMindFile, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE);

        $list=glob($rootDir.'*');
        if($list)foreach ($list as $item) {
            if(is_dir($item))continue;
            echo $item.PHP_EOL;
            $zip->addFile($item,substr($item,strlen($rootDir)));
        }
        $zip->addEmptyDir("META-INF");
        $list=glob($rootDir.'META-INF'.DIRECTORY_SEPARATOR.'*');
        if($list)foreach ($list as $item) {
            echo $item.PHP_EOL;
            $zip->addFile($item,substr($item,strlen($rootDir)));
        }
        $zip->close();
    }

//    public function work($rootDir,$targetZip){
//        $rootDir=realpath($rootDir).DIRECTORY_SEPARATOR;
//        if(!is_dir($rootDir))throw new \Exception("Not a dir");
//
//        $zip=new ZipArchive();
//        $zip->open($targetZip,ZIPARCHIVE::CREATE|ZipArchive::OVERWRITE);
//
//        $list=glob($rootDir.'*');
//        if($list)foreach ($list as $item) {
//            if(is_dir($item))continue;
//            echo $item.PHP_EOL;
//            $zip->addFile($item,substr($item,strlen($rootDir)));
//        }
//        $zip->addEmptyDir("META-INF");
//        $list=glob($rootDir.'META-INF'.DIRECTORY_SEPARATOR.'*');
//        if($list)foreach ($list as $item) {
//            echo $item.PHP_EOL;
//            $zip->addFile($item,substr($item,strlen($rootDir)));
//        }
//        $zip->close();
//    }
    /**
     * @param XMapContentEntity $contentEntity
     * @return XMindDirZipper
     */
    public function setContentEntity($contentEntity)
    {
        $this->contentEntity = $contentEntity;
        return $this;
    }

    /**
     * @param XManifestEntity $manifestEntity
     * @return XMindDirZipper
     */
    public function setManifestEntity($manifestEntity)
    {
        $this->manifestEntity = $manifestEntity;
        return $this;
    }
}