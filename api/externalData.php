<?php
include (dirname(dirname(__FILE__)).'MVC/M/addDBDate.php');
include_once (dirname(dirname(__FILE__)).'my.conf');
include_once (dirname(dirname(__FILE__)).'Common/funtions.php');//加载全站 函数文件
include_once (dirname(dirname(__FILE__)).'MVC/M/_Model.php');//加载Model主文件
/**
 * 外部数据抓取
 * @game_deal 数据表
 * @user_name 
 * 
 */
$parameter = array(
    "user_name"=>"用户：varchar",
    "game_id"=>"游戏id：int",
    "game_name"=>"游戏名称：varchar",
    "game_type"=>"游戏类型【端游、手游】：varchar",
	"game_account"=>"出售账号、金币",
	"game_deal_type"=>"游戏渠道，ios，安卓，端游，页游",
	"sell_type"=>"出售方式",
	"client"=>"客户的、运营商",
	"region"=>"区服",
	"timer"=>"上架时间",
    "image"=>"首长图片",
	"amount"=>"库存：1",
	"shop_title"=>"商品标题",
	"deal_type"=>"一口价、担保",
    "num_jb_zb"=>"金币或装备",
	"price"=>"价格",
	"account_msg"=>"账号描述",
	"longname"=>"登录用户",
	"longpass"=>"登录密码",
	"binding"=>"绑定信息",
	"bindingphone"=>"绑定手机",
	"bindingemail"=>"绑定邮箱",
	"deal_pass"=>"交易暗号",
	"phone"=>"联系手机",
	"QQ"=>"联系QQ",
	"weixin"=>"微信",
	"audit"=>"审核"
    
);
$output = array(); 
$a = @$_GET['a'] ? $_GET['a'] : '';
$uid = @$_GET['uid'] ? $_GET['uid'] : 0; 
if (empty($a)) {
    $output = array('data'=>$parameter, 'info'=>'test', 'code'=>-201);
    exit(json_encode($output)); 
} //走接口 
//检查用户   
if ($uid == 0) 
{ 
   $output = array('data'=>NULL, 'info'=>'The uid is null!', 'code'=>-401); 
   exit(json_encode($output));  
}
if (count($a)>0)
{
    addTableRow("game_deal", $a);
}
