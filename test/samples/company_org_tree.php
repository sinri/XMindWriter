<?php

use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
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
$topicHR->addChildTopicToTopics($topicHiring);
$topicHR->addChildTopicToTopics($topicAdmin);
{
    $notesForFinance = new \sinri\XMindWriter\XMapContent\XMapContentNotesEntity();
    $notesForFinance->setPlain(new \sinri\XMindWriter\XMapContent\XMapContentPlainNoteEntity("It is a plain note for finance"));
    $topicFinance->setNotes($notesForFinance);
}
$topicProduct=new XMapContentTopicEntity("Topic-3-1","Product");
$topicSupport=new XMapContentTopicEntity("Topic-3-2","Support");
$topicIT->addChildTopicToTopics($topicProduct);
$topicIT->addChildTopicToTopics($topicSupport);
{
    $notesForSupport = new \sinri\XMindWriter\XMapContent\XMapContentNotesEntity();
    $notesForSupportHtmlNote = new \sinri\XMindWriter\XMapContent\XMapContentHtmlNoteEntity();
    $p1 = new \sinri\XMindWriter\XMapContent\XMapContentHtmlParagraphEntity();
    $p1->addSpanEntity(new \sinri\XMindWriter\XMapContent\XMapContentHtmlSpanEntity("Support Note Span 1"));
    $p1->addSpanEntity(new \sinri\XMindWriter\XMapContent\XMapContentHtmlSpanEntity("Support Note Span 2"));
    $p1->addAnchorEntity(
        (new \sinri\XMindWriter\XMapContent\XMapContentHtmlAnchorEntity())
            ->setAttrXLinkHref("https://www.leqee.com")
            ->setTextContent("Let us open site of leqee")
    );
    $notesForSupportHtmlNote->addXHtmlPEntity($p1);
    $notesForSupport->setHtml($notesForSupportHtmlNote);
    $topicSupport->setNotes($notesForSupport);
}

$manifest = (new XManifestEntity())
    ->addFileEntry("content.xml", "text/xml")
    ->addFileEntry("META-INF/", "")
    ->addFileEntry("META-INF/manifest.xml", "text/xml");

(new XMindDirZipper($srcOutputDir, $xmindFile))
    ->setContentEntity($XMapContentInstance)
    ->setManifestEntity($manifest)
    ->buildXMind();