<?php
require_once 'dbUpDate.php';
function addNewGame()
{
	
}
function sell_game($post)
{
	if ($post)
	{
		$array=array(
				"user_name"=>the_user()->user_name,
				"game_id"=>GET("game_id","post"),
				"game_name"=>GET("game_name","post"),
				"game_type"=>GET("game_type","post"),
				"game_account"=>GET("game_account","post"),
				"game_deal_type"=>GET("game_deal_type","post"),
				"sell_type"=>GET("sell_type","post"),
				"client"=>GET("client","post"),
				"region"=>GET("region","post"),
				"timer"=>the_time("h"),
		        "image"=>GET("image","post"),
				"amount"=>"1",
				"audit"=>"待完善"
		);
		//$ret = update("game_deal", $_POST["did"], $array);//更新
		$game=load_model("game_deal");
		$ret = $game->_db->shop_game_deal()->insert($array);
		return $ret;
		
	}
	else 
	{
		return null;
	}
}
function UpSellGame($post,$imagename){
	if ($post)
	{
		$gid = $_POST["gid"];
		$array=array(
				"shop_title"=>GET("shop_title","post"),
				"deal_type"=>GET("deal_type","post"),
		        "num_jb_zb"=>GET("num_jb_zb","post"),
				"price"=>GET("price","post"),
				"image"=>$imagename,
				"account_msg"=>GET("account_msg","post"),
				"longname"=>GET("longname","post"),
				"longpass"=>GET("longpass","post"),
				"binding"=>GET("binding","post"),
				"bindingphone"=>GET("bindingphone","post"),
				"bindingemail"=>GET("bindingemail","post"),
				"deal_pass"=>GET("deal_pass","post"),
				"phone"=>GET("phone","post"),
				"QQ"=>GET("QQ","post"),
				"weixin"=>GET("weixin","post"),
				"audit"=>"审核",
		        "state_dg"=>"审核"
				
		);
		$up = update("game_deal", $gid, $array);//更新
		$countNum=intval($_POST["countt3"]);//获得个数
		$rowAry=array();
		$rowValue=array();
		$addAry=array();
		for ($i=1;$i<=$countNum;$i++)
		{
		    $rowAry[]=$_POST[$i];//获得id
		}
		$rc=load_model("rowcontent");
		$tn=1;
		for ($v=0;$v<count($rowAry);$v++)//通过id找到内容
		{
		    $rowValue["prod_id"]=$gid;
		    $rowValue["row_id"]=$rowAry[$v];
		    $rowValue["title"]=GET("title$tn","post");
		    $rowValue["content"]=$_POST[$rowAry[$v]];
		    $ret = $rc->_db->shop_rowcontent()->insert($rowValue);
		    $tn++;
		}
		return $ret;
	}
	return null;
	
}

function upimg($id,$url)//上传图片
{
	$array=array(
			"shopid"=>$id,
			"imageurl"=>$url
	);
	$gameimg=load_model("upimg");
	$ret = $gameimg->_db->shop_upimg()->insert($array);
	return $ret;
}

function identityPt($imageAry)//实名认证图片
{
    $idimgAry = array(
        "identityp1"=>$imageAry[0],
        "identityp2"=>$imageAry[1],
        "identityp3"=>$imageAry[2]
    );
    $up = update("user", the_user()->user_id, $idimgAry);//更新
    return $up;
}

function addCouponM($post)//生成优惠券
{
    $num=Coupon_v;
    $numc=myCrypt($num, Coupon_key);
    $addtime= date('Y-m-d h:i:s',strtotime($post["endtime"]));
    $array=array(
        "type"=>$post["type"],
        "title"=>$post["title"],
        "money"=>$post["money"],
        "conditions"=>$post["condition"],
        "merchant"=>"超新星",
        "number"=>$numc,
        "starttime"=>the_time("h"),
        "endtime"=>the_time("h")
    );
    $add = load_model("discount_coupon");
    $ret = $add->_db->shop_discount_coupon()->insert($array);
    return $ret;
}

function getCouponM($gid, $date)//领取优惠券
{
    $num=the_user()->user_id.Coupon_v;
    $numc=myCrypt($num, Coupon_key);
    $couponid="";
    $couponnum="";
    $title="";
    $money="";
    $endtime="";
    foreach ($date as $d)
    {
        $couponid=$d["id"];
        $couponnum=$d["number"];
        $title=$d["title"];
        $money=$d["money"];
        $endtime=$d["endtime"];
        
    }
    $jm=myDecrypt($couponnum, Coupon_key);
    if ($jm == Coupon_v){
        $array=array(
            "couponid"=>$couponid,
            "couponnum"=>$couponnum,
            "number"=>$numc,
            "userid"=>the_user()->user_id,
            "endtime"=>$endtime,
            "status"=>"待使用",
            "title"=>$title,
            "money"=>$money
        );
        var_export($array);
        $addget = load_model("coupon");
        $ret = $addget->_db->shop_coupon()->insert($array);
        return $ret;
    }
    else 
    {
        return null;
    }
}

function addTableRow($tab,$ary)
{
    $add = load_model($tab);
    $tableName = "shop_".$tab;
    $ret = $add->_db->$tableName()->insert($ary);
    return $ret;
}
