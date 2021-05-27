<?php


namespace sinri\XMindWriter\XMapStyles;


class XMapAutomaticStylesEntity extends XMapNormalStylesEntity
{
    protected function nodeTag(): string
    {
        return "automatic-styles";
    }
}