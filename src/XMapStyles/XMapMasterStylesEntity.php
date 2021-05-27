<?php


namespace sinri\XMindWriter\XMapStyles;


class XMapMasterStylesEntity extends XMapNormalStylesEntity
{
    protected function nodeTag(): string
    {
        return "master-styles";
    }
}