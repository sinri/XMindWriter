<?php


namespace sinri\XMindWriter\tools;


use Exception;
use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentChildrenOfTopicsEntity;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicsEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;
use sinri\XMindWriter\XMetaInfo\XMetaEntity;

class StaticTreeXMindWriter
{
    /**
     * @var StaticTreeNode
     */
    protected $tree;
    /**
     * @var XMindDirZipper
     */
    protected $zipper;

    public function __construct($tree, $workspace)
    {
        $this->tree = $tree;
        $this->zipper = new XMindDirZipper($workspace);
    }

    public function buildContent($title)
    {
        $contentEntity = new XMapContentEntity();
        $contentSheetEntity = new XMapContentSheetEntity("sheet-1", $title);
        $contentEntity->addSheet($contentSheetEntity);
        $this->zipper->setContentEntity($contentEntity);

        $rootTopic = new XMapContentTopicEntity($this->tree->id, $this->tree->title);
        $rootTopic->setChildrenFolded($this->tree->isBranchFolded);
        $contentSheetEntity->setTopic($rootTopic);

        $this->zipper->setContentEntity($contentEntity);

        $this->appendChildren($rootTopic, $this->tree->children);

        return $this;
    }

    /**
     * @param XMapContentTopicEntity $parentTopic
     * @param StaticTreeNode[] $children
     */
    protected function appendChildren($parentTopic, $children)
    {
        if (empty($children)) return;

        $topicsEntity = (new XMapContentTopicsEntity(XMapContentTopicsEntity::ATTR_TYPE_ATTACHED));

        $childrenEntity = new XMapContentChildrenOfTopicsEntity();
        $childrenEntity->addTopicsEntity($topicsEntity);
        $parentTopic->setChildren($childrenEntity);

        foreach ($children as $child) {
            $topicEntity = (new XMapContentTopicEntity($child->id, $child->title))
                ->setChildrenFolded($child->isBranchFolded);
            $topicsEntity->addTopicEntity($topicEntity);

            $this->appendChildren($topicEntity, $child->children);
        }
    }

    public function buildMeta($authorName = null, $authEmail = null, $creator = null)
    {
        $meta = (new XMetaEntity())
            ->setAuthorName($authorName)
            ->setAuthorEmail($authEmail)
            ->setCreateTime(date("Y-m-d H:i:s"))
            ->setCreatorName($creator);
        $this->zipper->setMetaEntity($meta);

        $manifest = (new XManifestEntity())
            ->addFileEntry("meta.xml", "text/xml");
        $this->zipper->setManifestEntity($manifest);

        return $this;
    }

    /**
     * @param $target
     * @throws Exception
     */
    public function archiveXMindFile($target)
    {
        $this->zipper->buildXMind($target);
    }

}