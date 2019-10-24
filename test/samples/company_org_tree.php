<?php

use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlAnchorEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlNoteEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlParagraphEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlSpanEntity;
use sinri\XMindWriter\XMapContent\XMapContentImageEntity;
use sinri\XMindWriter\XMapContent\XMapContentLabelsEntity;
use sinri\XMindWriter\XMapContent\XMapContentNotesEntity;
use sinri\XMindWriter\XMapContent\XMapContentPlainNoteEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentSummariesEntity;
use sinri\XMindWriter\XMapContent\XMapContentSummaryEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicsEntity;
use sinri\XMindWriter\XMapStyles\XMapNormalStylesEntity;
use sinri\XMindWriter\XMapStyles\XMapStyleEntity;
use sinri\XMindWriter\XMapStyles\XMapStyleTypePropertiesEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;
use sinri\XMindWriter\XMetaInfo\XMetaEntity;

require_once __DIR__ . '/../../vendor/autoload.php';

$srcOutputDir = __DIR__ . '/../../debug/sample';
$xmindFile = __DIR__ . '/../../debug/sample.xmind';

$stylesInstance = new sinri\XMindWriter\XMapStyles\XMapStylesEntity();
{
    $normalStyles = new XMapNormalStylesEntity();

    $properties = (new XMapStyleTypePropertiesEntity(XMapStyleEntity::TYPE_TOPIC));
    $properties->setAttrSvgFill("#FF0000");

    $normalStyles->addStyleEntity(
        (new XMapStyleEntity(
            "style-topic-1",
            $properties->getType(),
            "style-topic-1",
            $properties
        ))
    );
    $stylesInstance->setStyles($normalStyles);
}

$XMapContentInstance = new XMapContentEntity();

{
    $sheet1 = new XMapContentSheetEntity("S1", "Sheet1");
    $XMapContentInstance->addSheet($sheet1);

    $mainTopic = new XMapContentTopicEntity("Topic-Root", "Sinri Company");
    $sheet1->setTopic($mainTopic);

    $mainTopic->setAttrStyleId("style-topic-1");

    $topicHR = new XMapContentTopicEntity("Topic-1", "HR");
    $topicFinance = new XMapContentTopicEntity("Topic-2", "Finance");
    $topicIT = new XMapContentTopicEntity("Topic-3", "IT");
    $topicMarketing = new XMapContentTopicEntity("Topic-4", "Marketing");
    $mainTopic->addChildTopicToTopics($topicHR);
    $mainTopic->addChildTopicToTopics($topicFinance);
    $mainTopic->addChildTopicToTopics($topicIT);
    $mainTopic->addChildTopicToTopics($topicMarketing);

    $topicHiring = new XMapContentTopicEntity("Topic-1-1", "Hiring");
    $topicAdmin = new XMapContentTopicEntity("Topic-1-2", "Admin");
    $topicHRBP1 = new XMapContentTopicEntity("Topic-1-3", "HRBP-1");
    $topicHRBP2 = new XMapContentTopicEntity("Topic-1-4", "HRBP-2");
    $topicHR->addChildTopicToTopics($topicHiring);
    $topicHR->addChildTopicToTopics($topicAdmin);
    $topicHR->addChildTopicToTopics($topicHRBP1);
    $topicHR->addChildTopicToTopics($topicHRBP2);

    $summaries = (new XMapContentSummariesEntity());
    $summaryTopicHRBP = new XMapContentTopicEntity("Summary-Topic-HRBP", "Summary-Topic-HRBP");
    $topicHR->addChildTopicToTopics($summaryTopicHRBP, XMapContentTopicsEntity::ATTR_TYPE_SUMMARY);
    $summaries->addSummaryEntity((new XMapContentSummaryEntity("Summary-HRBP", 2, 3, "Summary-Topic-HRBP")));

    $topicHR->setSummaries($summaries);

    {
        $notesForFinance = new XMapContentNotesEntity();
        $notesForFinance->setPlain(new XMapContentPlainNoteEntity("It is a plain note for finance"));
        $topicFinance->setNotes($notesForFinance);
    }
    $topicProduct = new XMapContentTopicEntity("Topic-3-1", "Product");
    $topicSupport = new XMapContentTopicEntity("Topic-3-2", "Support");
    $topicIT->addChildTopicToTopics($topicProduct);
    $topicIT->addChildTopicToTopics($topicSupport);
    {
        $notesForSupport = new XMapContentNotesEntity();
        $notesForSupportHtmlNote = new XMapContentHtmlNoteEntity();
        $p1 = new XMapContentHtmlParagraphEntity();
        $p1->addSpanEntity(new XMapContentHtmlSpanEntity("Support Note Span 1"));
        $p1->addSpanEntity(new XMapContentHtmlSpanEntity("Support Note Span 2"));
        $p1->addAnchorEntity(
            (new XMapContentHtmlAnchorEntity())
                ->setAttrXLinkHref("https://www.leqee.com")
                ->setTextContent("Let us open site of leqee")
        );
        $notesForSupportHtmlNote->addXHtmlPEntity($p1);
        $notesForSupport->setHtml($notesForSupportHtmlNote);
        $topicSupport->setNotes($notesForSupport);
    }
    $topicIT->setChildrenFolded(true);
    {
        // Could not be validated in ZEN trail version
        $image = (new XMapContentImageEntity())
            ->setAttrXHtmlSrc("https://www.leqee.com/leqee_new/img/logo_leqee.png")
            ->setAttrAlign(XMapContentImageEntity::ALIGN_BOTTOM);
        $topicProduct->setImage($image);
    }
    {
        $topicProduct->setLabels(
            (new XMapContentLabelsEntity())
                ->addLabelWithText("Wang")
                ->addLabelWithText("Miao")
        );
    }
}

$manifest = (new XManifestEntity());

$meta = (new XMetaEntity())
    ->setAuthorName("Sinri Edogawa")
    ->setAuthorEmail("a@b.c")
    ->setCreateTime(date("Y-m-d H:i:s"))
    ->setCreatorName("sinri-xmind-writer");


(new XMindDirZipper($srcOutputDir))
    ->setContentEntity($XMapContentInstance)
    ->setManifestEntity($manifest)
    ->setStylesEntity($stylesInstance)
    ->setMetaEntity($meta)
    ->buildXMind($xmindFile);