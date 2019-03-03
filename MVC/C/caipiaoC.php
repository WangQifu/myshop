<?php
include_once 'MVC/M/caipiaoAPI.php';
class caipiaoC extends _Main
{   //进入产品页面
    function cpView()
    {
        $viewName = "";
        date_default_timezone_set('PRC');
        $type = $_GET["type"];
        $showapi_appid = '51981';
        
        $paramArr = array(
            'showapi_appid'=> $showapi_appid,
            'code'=> $type,
            'endTime'=> date('Y-m-d H:i:s'),
            'count'=> "20"
            //添加其他参数
        );
        $url = "http://route.showapi.com/44-2?";
        $cpJson = caipiapDate($paramArr, $url);
        $cpJson2 = json_decode($cpJson);
        $date = $cpJson2->showapi_res_body;
        $de_json = $date->result;
        $ary_json = $de_json[0];
        $strCode = $ary_json->openCode;
        $ballNum=cpRedCode($strCode);
        if ($type == "ssq" || $type == "dlt" || $type == "qlc")
        {
            $viewName="CPView_".$type;
        }
        else if (count($ballNum) == 3)
        {
            $viewName="CPView_pl3";
        }
        elseif (count($ballNum) == 5)
        {
            $viewName="CPView_pl5";
        }elseif (count($ballNum) == 7)
        {
            $viewName="CPView_r7";
        }
        else 
        {
            exit("敬请等待……");
        }
        $this->addObject("headtitle", "-".$_GET["cpname"]."开奖统计");
        $this->addObject("cpJson", $cpJson);
        $this->addObject("numball", numBall($type));
        $this->addObject("cpName", $type);
        $this->setViewName($viewName);
    }
    //查询彩票类型
    function cpTypeList() {
        date_default_timezone_set('PRC');
        $showapi_appid = '51981';
        $paramArr = array(
         'showapi_appid'=> $showapi_appid
         //添加其他参数
         );

        $url = "http://route.showapi.com/44-6?";
        $cpJson = caipiapDate($paramArr, $url);
        $this->addObject("cpJson", $cpJson);
        //$this->addObject("headtitle", "-彩票列表");
        $this->setViewName("index_v");
    }
}