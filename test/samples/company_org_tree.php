<?php

use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlAnchorEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlNoteEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlParagraphEntity;
use sinri\XMindWriter\XMapContent\XMapContentHtmlSpanEntity;
use sinri\XMindWriter\XMapContent\XMapContentNotesEntity;
use sinri\XMindWriter\XMapContent\XMapContentPlainNoteEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentSummariesEntity;
use sinri\XMindWriter\XMapContent\XMapContentSummaryEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicsEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;

require_once __DIR__ . '/../../vendor/autoload.php';

$srcOutputDir = __DIR__ . '/../../debug/sample';
$xmindFile = __DIR__ . '/../../debug/sample.xmind';

$XMapContentInstance = new XMapContentEntity();

$sheet1=new XMapContentSheetEntity("S1","Sheet1");
$XMapContentInstance->addSheet($sheet1);

$mainTopic=new XMapContentTopicEntity("Topic-Root","Sinri Company");
$sheet1->setTopic($mainTopic);

$topicHR=new XMapContentTopicEntity("Topic-1","HR");
$topicFinance=new XMapContentTopicEntity("Topic-2","Finance");
$topicIT=new XMapContentTopicEntity("Topic-3","IT");
$topicMarketing=new XMapContentTopicEntity("Topic-4","Marketing");
$mainTopic->addChildTopicToTopics($topicHR);
$mainTopic->addChildTopicToTopics($topicFinance);
$mainTopic->addChildTopicToTopics($topicIT);
$mainTopic->addChildTopicToTopics($topicMarketing);

$topicHiring=new XMapContentTopicEntity("Topic-1-1","Hiring");
$topicAdmin=new XMapContentTopicEntity("Topic-1-2","Admin");
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
$topicProduct=new XMapContentTopicEntity("Topic-3-1","Product");
$topicSupport=new XMapContentTopicEntity("Topic-3-2","Support");
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
    $image = (new \sinri\XMindWriter\XMapContent\XMapContentImageEntity())
        ->setAttrXHtmlSrc("https://www.leqee.com/leqee_new/img/logo_leqee.png")
        ->setAttrAlign(\sinri\XMindWriter\XMapContent\XMapContentImageEntity::ALIGN_BOTTOM);
    $topicProduct->setImage($image);
}
{
    $topicProduct->setLabels(
        (new \sinri\XMindWriter\XMapContent\XMapContentLabelsEntity())
            ->addLabelWithText("Wang")
            ->addLabelWithText("Miao")
    );
}
$manifest = (new XManifestEntity())
    ->addFileEntry("content.xml", "text/xml")
    ->addFileEntry("META-INF/", "")
    ->addFileEntry("META-INF/manifest.xml", "text/xml");

(new XMindDirZipper($srcOutputDir, $xmindFile))
    ->setContentEntity($XMapContentInstance)
    ->setManifestEntity($manifest)
    ->buildXMind();