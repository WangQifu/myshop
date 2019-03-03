<?php
/**
 * 发送模板短信
 * @author  chensheng
***/

//使用示例
require('ServerAPI.php');
//网易云信分配的账号，请替换你在管理后台应用下申请的Appkey
$AppKey = 'c83d55666b98a23fb5c364262e466c2d';
//网易云信分配的账号，请替换你在管理后台应用下申请的appSecret
$AppSecret = 'a3324428c062';
$p = new ServerAPI($AppKey,$AppSecret,'fsockopen');     //fsockopen伪造请求

//发送模板短信
print_r( $p->sendSMSTemplate('6272',array('1838640708','17385902829'),array('0571' )));

?>
