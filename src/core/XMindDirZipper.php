<?php


namespace sinri\XMindWriter\core;


use Exception;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapStyles\XMapStylesEntity;
use sinri\XMindWriter\XMarker\XMarkerSheetEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;
use sinri\XMindWriter\XMetaInfo\XMetaEntity;
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
    /**
     * @var XMapStylesEntity
     */
    protected $stylesEntity;
    /**
     * @var XMetaEntity
     */
    protected $metaEntity;
    /**
     * @var XMarkerSheetEntity
     */
    protected $markerSheetEntity;

    public function __construct($workspace)
    {
        $this->workspace = $workspace;


        if (!file_exists($this->workspace)) @mkdir($workspace, 0777, true);
    }

    /**
     * @param string $target
     * @throws Exception
     */
    public function buildXMind($target)
    {
        $this->targetXMindFile = $target;

        // generate XML files
        $this->contentEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'content.xml');
        $this->manifestEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'META-INF' . DIRECTORY_SEPARATOR . 'manifest.xml');

        // more XML files
        if ($this->stylesEntity !== null) {
            $this->stylesEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'styles.xml');
        }
        if ($this->metaEntity !== null) {
            $this->metaEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'meta.xml');
        }
        if ($this->markerSheetEntity !== null) {
            $this->markerSheetEntity->generateXMLToFile($this->workspace . DIRECTORY_SEPARATOR . 'markers' . DIRECTORY_SEPARATOR . 'markerSheet.xml');
        }

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

        if ($this->markerSheetEntity !== null) {
            $list = glob($rootDir . 'markers' . DIRECTORY_SEPARATOR . '*');
            if ($list) foreach ($list as $item) {
                echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $thumbnailsDir = $rootDir . 'Thumbnails';
        if (file_exists($thumbnailsDir) && is_dir($thumbnailsDir)) {
            $list = glob($thumbnailsDir . DIRECTORY_SEPARATOR . '*');
            if ($list) foreach ($list as $item) {
                echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $attachmentsDir = $rootDir . 'attachments';
        if (file_exists($attachmentsDir) && is_dir($attachmentsDir)) {
            $list = [];
            $this->fetchFolderChildrenAsList($rootDir, $attachmentsDir, $list);
            if ($list) foreach ($list as $item) {
                echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $zip->close();
    }

    protected function fetchFolderChildrenAsList($rootDir, $parent, &$items)
    {
        $list = glob($parent . DIRECTORY_SEPARATOR . '*');
        if (!empty($list)) {
            foreach ($list as $item) {
                if (is_dir($item)) {
                    $this->fetchFolderChildrenAsList($rootDir, $item, $items);
                } else {
                    $items[] = $item;
                }
            }
        }
    }

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

    /**
     * @param XMapStylesEntity $stylesEntity
     * @return XMindDirZipper
     */
    public function setStylesEntity($stylesEntity)
    {
        $this->stylesEntity = $stylesEntity;
        return $this;
    }

    /**
     * @param XMetaEntity $metaEntity
     * @return XMindDirZipper
     */
    public function setMetaEntity($metaEntity)
    {
        $this->metaEntity = $metaEntity;
        return $this;
    }

    /**
     * @param XMarkerSheetEntity $markerSheetEntity
     * @return XMindDirZipper
     */
    public function setMarkerSheetEntity($markerSheetEntity)
    {
        $this->markerSheetEntity = $markerSheetEntity;
        return $this;
    }
}