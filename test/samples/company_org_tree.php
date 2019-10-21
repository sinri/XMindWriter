<?php

use sinri\XMindWriter\core\XMindDirZipper;
use sinri\XMindWriter\XMapContent\XMapContentEntity;
use sinri\XMindWriter\XMapContent\XMapContentSheetEntity;
use sinri\XMindWriter\XMapContent\XMapContentTopicEntity;
use sinri\XMindWriter\XMetaInfo\XManifestEntity;

require_once __DIR__ . '/../../vendor/autoload.php';

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

$topicProduct=new XMapContentTopicEntity("Topic-3-1","Product");
$topicSupport=new XMapContentTopicEntity("Topic-3-2","Support");
$topicIT->addChildTopicToTopics($topicProduct);
$topicIT->addChildTopicToTopics($topicSupport);

$srcOutputDir=__DIR__ . '/../../debug/sample';
$xmindFile=__DIR__ . '/../../debug/sample.xmind';

$XMapContentInstance->generateXMLToFile($srcOutputDir . '/content.xml');

(new XManifestEntity())
    ->addFileEntry("content.xml", "text/xml")
    ->addFileEntry("META-INF/", "")
    ->addFileEntry("META-INF/manifest.xml", "text/xml")
    ->generateXMLToFile($srcOutputDir.'/META-INF/manifest.xml');

(new XMindDirZipper())->work($srcOutputDir, $xmindFile);