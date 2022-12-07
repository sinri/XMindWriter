<?php


namespace sinri\XMindWriter\core;


use sinri\XMindWriter\exception\FileSystemException;
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

    public function __construct(string $workspace)
    {
        $this->workspace = $workspace;


        if (!file_exists($this->workspace)) {
            @mkdir($workspace, 0777, true);
            if (!file_exists($this->workspace . DIRECTORY_SEPARATOR . 'META-INF')) {
                @mkdir($workspace . DIRECTORY_SEPARATOR . 'META-INF', 0777, true);
            }
            if (!file_exists($this->workspace . DIRECTORY_SEPARATOR . 'attachments')) {
                @mkdir($workspace . DIRECTORY_SEPARATOR . 'attachments', 0777, true);
            }
            if (!file_exists($this->workspace . DIRECTORY_SEPARATOR . 'Thumbnails')) {
                @mkdir($workspace . DIRECTORY_SEPARATOR . 'Thumbnails', 0777, true);
            }
            if (!file_exists($this->workspace . DIRECTORY_SEPARATOR . 'markers')) {
                @mkdir($workspace . DIRECTORY_SEPARATOR . 'markers', 0777, true);
            }
        }
    }

    /**
     * @param string $target
     * @param bool $cleanWorkspace
     */
    public function buildXMind(string $target, bool $cleanWorkspace = false)
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
        if (!is_dir($rootDir)) {
            throw new FileSystemException("Not a dir");
        }

        $zip = new ZipArchive();
        $zip->open($this->targetXMindFile, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE);

        $list = glob($rootDir . '*');
        if ($list) foreach ($list as $item) {
            if (is_dir($item)) continue;
            //echo $item.PHP_EOL;
            $zip->addFile($item, substr($item, strlen($rootDir)));
        }
        //$zip->addEmptyDir("META-INF");
        $list=glob($rootDir.'META-INF'.DIRECTORY_SEPARATOR.'*');
        if($list)foreach ($list as $item) {
            //echo $item.PHP_EOL;
            $zip->addFile($item,substr($item,strlen($rootDir)));
        }

        if ($this->markerSheetEntity !== null) {
            $list = glob($rootDir . 'markers' . DIRECTORY_SEPARATOR . '*');
            if ($list) foreach ($list as $item) {
                //echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $thumbnailsDir = $rootDir . 'Thumbnails';
        if (file_exists($thumbnailsDir) && is_dir($thumbnailsDir)) {
            $list = glob($thumbnailsDir . DIRECTORY_SEPARATOR . '*');
            if ($list) foreach ($list as $item) {
                //echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $attachmentsDir = $rootDir . 'attachments';
        if (file_exists($attachmentsDir) && is_dir($attachmentsDir)) {
            $list = [];
            $this->fetchFolderChildrenAsList($rootDir, $attachmentsDir, $list);
            if ($list) foreach ($list as $item) {
                //echo $item . PHP_EOL;
                $zip->addFile($item, substr($item, strlen($rootDir)));
            }
        }

        $zip->close();

        if ($cleanWorkspace) {
            $this->deleteFolder($rootDir);
        }
    }

    /**
     * @param string $rootDir
     * @param string $parent
     * @param array $items
     */
    protected function fetchFolderChildrenAsList(string $rootDir, string $parent, array &$items)
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
     * @param string $rootDir
     */
    protected function deleteFolder(string $rootDir){
        $list = glob($rootDir . DIRECTORY_SEPARATOR . '*');
        if (!empty($list)) {
            foreach($list as $item) {
                if (is_dir($item)) {
                    $this->deleteFolder($item);
                } else {
                    @unlink($item);
                }
            }
        }
        @rmdir($rootDir);
    }

    /**
     * @param XMapContentEntity $contentEntity
     * @return XMindDirZipper
     */
    public function setContentEntity(XMapContentEntity $contentEntity): XMindDirZipper
    {
        $this->contentEntity = $contentEntity;
        return $this;
    }

    /**
     * @param XManifestEntity $manifestEntity
     * @return XMindDirZipper
     */
    public function setManifestEntity(XManifestEntity $manifestEntity): XMindDirZipper
    {
        $this->manifestEntity = $manifestEntity;
        return $this;
    }

    /**
     * @param XMapStylesEntity $stylesEntity
     * @return XMindDirZipper
     */
    public function setStylesEntity(XMapStylesEntity $stylesEntity): XMindDirZipper
    {
        $this->stylesEntity = $stylesEntity;
        return $this;
    }

    /**
     * @param XMetaEntity $metaEntity
     * @return XMindDirZipper
     */
    public function setMetaEntity(XMetaEntity $metaEntity): XMindDirZipper
    {
        $this->metaEntity = $metaEntity;
        return $this;
    }

    /**
     * @param XMarkerSheetEntity $markerSheetEntity
     * @return XMindDirZipper
     */
    public function setMarkerSheetEntity(XMarkerSheetEntity $markerSheetEntity): XMindDirZipper
    {
        $this->markerSheetEntity = $markerSheetEntity;
        return $this;
    }
}
