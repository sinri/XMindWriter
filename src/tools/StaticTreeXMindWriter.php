<?php


namespace sinri\XMindWriter\tools;


use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentChildrenOfTopicsEntity;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentRelationshipEntity;
use sinri\XMindWriter\XMapContent\XMapContentRelationshipsEntity;
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
     * @var StaticTreeNode[]
     */
    protected $floatingNodes = [];
    /**
     * @var StaticTreeNodeRelationship[]
     */
    protected $relationships = [];
    /**
     * @var XMindDirZipper
     */
    protected $zipper;

    public function __construct($tree, $floatingNodes, $relationships, $workspace)
    {
        $this->tree = $tree;
        $this->floatingNodes = $floatingNodes;
        $this->relationships = $relationships;
        $this->zipper = new XMindDirZipper($workspace);
    }

    public function buildContent($title): StaticTreeXMindWriter
    {
        $contentEntity = new XMapContentEntity();
        $contentSheetEntity = new XMapContentSheetEntity("sheet-1", $title);
        $contentEntity->addSheet($contentSheetEntity);
        $this->zipper->setContentEntity($contentEntity);

        $rootTopic = new XMapContentTopicEntity($this->tree->id, $this->tree->title);
        $rootTopic->setChildrenFolded($this->tree->isBranchFolded);
        $contentSheetEntity->setTopic($rootTopic);

        $this->zipper->setContentEntity($contentEntity);

        $this->appendChildren($rootTopic, $this->tree->children, XMapContentTopicsEntity::ATTR_TYPE_ATTACHED);

        $this->appendChildren($rootTopic, $this->floatingNodes, XMapContentTopicsEntity::ATTR_TYPE_DETACHED);

        $this->appendRelationships($contentSheetEntity, $this->relationships);

        return $this;
    }

    /**
     * @param XMapContentTopicEntity $parentTopic
     * @param StaticTreeNode[] $children
     * @param string $type
     */
    protected function appendChildren(XMapContentTopicEntity $parentTopic, array $children, string $type)
    {
        if (empty($children)) return;

        $childrenEntity = $parentTopic->getChildren();
        if ($childrenEntity === null) {
            $childrenEntity = new XMapContentChildrenOfTopicsEntity();
            $parentTopic->setChildren($childrenEntity);
        }
        $topicsEntity = $childrenEntity->getTopicsList()[$type] ?? null;
        if ($topicsEntity === null) {
            $topicsEntity = (new XMapContentTopicsEntity($type));
            $childrenEntity->addTopicsEntity($topicsEntity);
        }

        foreach ($children as $child) {
            $topicEntity = (new XMapContentTopicEntity($child->id, $child->title))
                ->setChildrenFolded($child->isBranchFolded);
            $topicsEntity->addTopicEntity($topicEntity);

            $this->appendChildren($topicEntity, $child->children, $type);
        }
    }

    /**
     * @param XMapContentSheetEntity $sheetEntity
     * @param StaticTreeNodeRelationship[] $relationships
     */
    protected function appendRelationships(XMapContentSheetEntity $sheetEntity, array $relationships)
    {
        $relationshipsEntity = new XMapContentRelationshipsEntity();
        $sheetEntity->setRelationships($relationshipsEntity);

        foreach ($relationships as $relationshipItem) {
            $relationshipsEntity->addRelationshipEntity(
                new XMapContentRelationshipEntity(
                    $relationshipItem->id,
                    $relationshipItem->title,
                    $relationshipItem->startNodeId,
                    $relationshipItem->endNodeId
                )
            );
        }
    }

    public function buildMeta($authorName = null, $authEmail = null, $creator = null): StaticTreeXMindWriter
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
     * @param $cleanWorkspace
     */
    public function archiveXMindFile($target, $cleanWorkspace = false)
    {
        $this->zipper->buildXMind($target, $cleanWorkspace);
    }

}
