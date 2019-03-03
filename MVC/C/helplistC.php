<?php
class helplistC extends _Main{
    function helpbuy1()
    {
        $this->setViewName("v1next/helpbuy1");
    }
    function helpissue1() {
        $this->setViewName("v1next/helpissue1");
    }
    function helpwenwen()
    {
        $this->setViewName("v1next/helpwenwen");
        $this->addObject("type", $_GET["type"]) ;
    }
}