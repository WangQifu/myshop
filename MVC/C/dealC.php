<?php
class dealC extends _Main
{
    function dealC()
    {
        if (!the_user())
        {
            $this->isAdmin=false;
            $this->setViewName("login2");
        }
            
    }
    function inquireCoupon()//查询优惠券
    {
        if (the_user())
        {
            $ret = queryRow("coupon", "*", " userid='".the_user()->user_id."' ");
            $this->addObject("ret", $ret);
            $this->setViewName("coupon");
        }
        else 
        {
            $this->isAdmin=false;
	        $this->setViewName("login2");
        }
    }
    function addCoupon() {//生成优惠券
        if ($_POST)
        {
            $ret = addCouponM($_POST);
            $ret = queryRow("discount_coupon", "*", " id ");
            $this->addObject("ret", $ret);
        }
        $this->isAdmin=true;
        $this->setViewName("addcoupon");
    }
    function getCoupon() {//获得优惠券
        $ret = queryRow("discount_coupon", "*", " id='".$_GET["cid"]."' ");
        $cadd = getCouponM($_GET["cid"], $ret);
        $this->addObject("ret", $cadd);
        $this->setViewName("coupon");
    }
    //交易客服服务
    function kefuDeal()
    {
        $userid = the_user()->user_id;
        //获得客服id
        $kefuid = queryRow("jiaoyi_kefu", "id", " userid='".$userid."' ");
        //查询服务订单
        if (count($kefuid)>0)
        {
            $dealList = queryRow("deal_record", "*", " kefu_id='".db_key($kefuid, "id")."' and deliver_goods!='确认收货' ");
            
            $this->addObject("list", $dealList);
            $this->setViewName("gameKefuDealView");
        }
        else 
        {
            $this->setViewName("userCenter");
        }
    }
    //查询服务订单详细信息
    function dealMsg()
    {
        $gid = $_GET["gid"];
        $sid = $_GET["sid"];
        $shopRow = queryRow("game_deal", "*", " id='".$gid."' ");//查询商品
        $DealRow = queryRow("deal_record", "*", " id='".$sid."' ");//查询订单
        $this->addObject("shopRow", $shopRow);
        $this->addObject("dealRow", $DealRow);
        $this->setViewName("KefuDealMsgView");
    }
}