<?php
//载入ucpass类
require_once('Ucpaas.class.php');
function DinDanMsg($phone, $templId,$authnum)
{
    
    //初始化必填
    $options['accountsid']='5531fd49e3c0636c4f9bc22fcd0060de';
    $options['token']='68d1d7812dd51b242f9da4114c2ca385';
    //初始化 $options必填
    $ucpass = new Ucpaas($options);
    
    //开发者账号信息查询默认为json或xml
    
    //echo "第一个".$ucpass->getDevinfo('json');
    
    //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

    $appId = "43842178093a453b836ea7d74983b9bd";
    $to = $phone;
    $templateId = $templId;
    $param = $authnum;
    $ucpass->templateSMS($appId,$to,$templateId,$param);
    
    
}