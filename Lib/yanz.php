<?php
//载入ucpass类
require_once('Ucpaas.class.php');
//手机号码
$code_msg=$_POST["phone"];
$templId=$_POST["templateId"];
//6位验证码
$ychar="0,1,2,3,4,5,6,7,8,9";
$list=explode(",",$ychar);
for($i=0;$i<6;$i++){
    $randnum=rand(0,9);
    $authnum.=$list[$randnum];
}
//初始化必填
$options['accountsid']='5531fd49e3c0636c4f9bc22fcd0060de';
$options['token']='68d1d7812dd51b242f9da4114c2ca385';
//初始化 $options必填
$ucpass = new Ucpaas($options);

//开发者账号信息查询默认为json或xml

//echo "第一个".$ucpass->getDevinfo('json');

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
if ($_POST["ddnum"])
{
    $authnum = $_POST["ddnum"];
}
$appId = "43842178093a453b836ea7d74983b9bd";
$to = $code_msg;
$templateId = $templId;
$param = $authnum;
$ucpass->templateSMS($appId,$to,$templateId,$param);
$authnum1 = $authnum*7;
$data='{code_msg:"' . $code_msg . '",code:"'.$authnum1.'"}';//组合成json格式数据
echo json_encode($data);//输出json数据

