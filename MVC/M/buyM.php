<?php
include_once 'dbUpDate.php';
function newbuyDate($user,$post)//添加购买
{
	$deal_record=load_model("deal_record");
	$addtime= date('Ymdhis');
	$number=$addtime.GET("product_id","post");
	$date=array(
			"number"=>$number,
			"product_id"=>GET("product_id","post"),
	        "shop_type"=>GET("shop_type","post"),
			"product_name"=>GET("product_name","post"),
			"price"=>GET("price","post"),
			"state"=>"待付款",
			"seller"=>GET("seller","post"),
			"buyer"=>$user->user_name,
			"phone"=>GET("phone","post"),
			"QQ"=>GET("QQ","post"),
			"binding_phone"=>GET("binding_phone","post"),
			"binding_email"=>GET("binding_email","post"),
			"invitation_code"=>GET("invitation_code","post"),
			"deliver_goods"=>"待付款",
			"time"=>$addtime,
	        "image"=>GET("image","post"),
	        "kefu_id"=>GET("kefu","post"),
	        "kouling"=>GET("kouling","post")
	);
	$ret=$deal_record->_db->shop_deal_record()->insert($date);
	if ($ret)
	{
	    $upary = array(
	        state_dg=>"预定"
	    );
	    update("game_deal", GET("product_id","post"), $upary);
	}
	return $ret;
}
function upbuydate()//付款更新
{
	
}

function buyGoodsM($post)//收购游戏
{
    $buygame=load_model("buygame");
    $addtime= date('Y-m-d H:i:s');
    $date=array(
        "game_name"=>GET("game_name","post"),
        "buy_type"=>GET("buy_type","post"),
        "game_type"=>GET("game_type","post"),
        "game_client"=>GET("game_client","post"),
        "operator"=>GET("operator","post"),
        "region"=>GET("region","post"),
        "buy_desc"=>GET("buy_desc","post"),
        "buy_timer"=>$addtime,
        "price"=>GET("price","post"),
        "user_id"=>the_user()->user_id,
        "phone"=>GET("phone","post"),
        "qqnum"=>GET("qqnum","post"),
        "audit"=>"审核"
    );
    $ret=$buygame->_db->shop_buygame()->insert($date);
    return $ret;
}

function shareAccount($post)
{
    $share=load_model("account_share");
    
    $ret=$share->_db->shop_account_share()->insert($post);
    return $ret;
}