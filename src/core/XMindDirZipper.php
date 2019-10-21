<?php


namespace sinri\XMindWriter\core;


use ZipArchive;

class XMindDirZipper
{
    public function work($rootDir,$targetZip){
//        if(strlen($rootDir)>1 && strrpos($rootDir,DIRECTORY_SEPARATOR)===strlen($rootDir)-1){
//            $rootDir=substr($rootDir,0,strlen($rootDir)-1);
//        }
        $rootDir=realpath($rootDir).DIRECTORY_SEPARATOR;
        if(!is_dir($rootDir))throw new \Exception("Not a dir");

        $zip=new ZipArchive();
        $zip->open($targetZip,ZIPARCHIVE::CREATE|ZipArchive::OVERWRITE);

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
}