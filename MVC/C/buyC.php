<?php
require_once 'MVC/M/buyM.php';
//require (dirname(dirname(dirname(__FILE__))).'/Lib/yanz.php');//加载数据库操作文件
class buyC extends _Main
{
    function buyC()
    {
        if (!the_user())
        {
            $this->setViewName("login2");
        }
    }
	function buy_g()//进入付款页面
	{
	    $dt=queryRow("deal_record", "*", " product_id='".$_POST["product_id"]."' and buyer='".the_user()->user_name."' ");
	    if (count($dt)>0)
	    {
	        $this->pay_await();
	    } 
	    else 
	    {
	        $ret=newbuyDate(the_user(), $_POST);//添加
	        $row = queryRow("deal_record", "*", " id='".$ret."' ");
	        $this->addObject("type", db_key($row, "shop_type"));
	        $this->addObject("setRet", $row);
	        $this->setViewName("payment");
	    }
		
	}
	function audit_c()//待审核查询
	{
		$audit = queryRow("game_deal", "*", " user_name='".the_user()->user_name."' and audit='审核' ");
		$pass = queryRow("game_deal", "*", " user_name='".the_user()->user_name."' and audit='通过' ");
		$disqualification = queryRow("game_deal", "*", " user_name='".the_user()->user_name."' and audit='失败' ");
		
		$audit_sh = queryRow("buygame", "*", " user_id='".the_user()->user_id."' and audit='审核' ");
		$audit_sh_t = queryRow("buygame", "*", " user_id='".the_user()->user_id."' and audit='通过' ");
		$audit_sh_s = queryRow("buygame", "*", " user_id='".the_user()->user_id."' and audit='失败' ");
		
		$this->addObject("setRet", $audit);
		$this->addObject("setSH_t", $audit_sh_t);
		$this->addObject("setSH_s", $audit_sh_s);
		$this->addObject("setSH", $audit_sh);
		$this->addObject("setPass", $pass);
		$this->addObject("setDc", $disqualification);
		$this->setViewName("auditView");
	}
	function pay_await()//等待付款查询
	{
		if (the_user())
		{
			$row = queryRow("deal_record", "*", " state='待付款' and buyer='".the_user()->user_name."' ");
			//$row_cl = queryRow("deal_record", "*", " state='下单成功' and buyer='".the_user()->user_name."' ");
			$this->addObject("setRet", $row);
			//$this->addObject("setRetCl", $row_cl);
			$this->addObject("type", db_key($row, "shop_type"));
			$this->setViewName("pay_await");
		}
		else {
			$this->setViewName("login2");
		}
	}
	function payment()//下单
	{
	    $type=$_GET["type"];
	    $objmsg="";
	    $qrrow = queryRow("deal_record", " * ", " id='".$_GET["bid"]."' and buyer='".the_user()->user_name."' ");//查询所属id
	    $gid = db_key($qrrow, "product_id");//修改库存(因为是游戏交易库存设为1)
	    $qrgd = queryRow("game_deal", " * ", " id='".$gid."' ");//通过id查询库存
	    $kc = db_key($qrgd, "amount");//
	    if ($type == "cancel")
	    {
	        if ($kc == 0 && $kc == "0")//查询库存
	        {
	            $objmsg="商品已卖出";
	            $up=array(
	                "state"=>"已卖出",
	                "payment_method"=>"付款失败",
	                "deliver_goods"=>"已卖出"
	            );
	            $ret=update("deal_record", $_GET["bid"], $up);//更新
	        }
	        else
	        {
	            $up=array(
	                "product_id"=>"0",
	                "state"=>"取消订单",
	                "payment_method"=>"未支付",
	                "deliver_goods"=>"取消订单"
	            );
	            $ret=update("deal_record", $_GET["bid"], $up);//更新付款
	            $ary = array("amount"=>"1","state_dg"=>"出售");
	            $upgame=update("game_deal", $gid, $ary);//更新库存
	            $objmsg ="订单取消成功";
	        }
	    }
	    else 
	    {
	       
	        if ($kc == 0 && $kc == "0")//查询库存
	        {
	            $objmsg="商品已卖出";
	            $up=array(
	                "state"=>"已卖出",
	                "payment_method"=>"付款失败",
	                "deliver_goods"=>"已卖出"
	            );
	            $ret=update("deal_record", $_GET["bid"], $up);//更新
	        }
	        else
	        {
	            $up=array(
	                "state"=>"下单成功",
	                "payment_method"=>"等待支付",
	                "deliver_goods"=>"待处理"
	            );
	            $ret=update("deal_record", $_GET["bid"], $up);//更新付款
	            $ary = array("amount"=>"0");
	            $upgame=update("game_deal", $gid, $ary);//更新库存
	            $objmsg ="下单成功";
	            DinDanMsg($_GET["kefuphone"],"237417",$_GET["ddnum"]);
	        }
	       
	    }
	    $this->addObject("msg", $objmsg);
	    $this->setViewName("pay_await");
		
	}
	
	function shipments()//待发货查询_购买方
	{
		if (the_user())
		{
			$fid=$_GET["fid"];
			
			if ($fid=="0")
			{
			    $row = queryRow("deal_record", "*", " state='下单成功' and buyer='".the_user()->user_name."' ");
			    $this->addObject("setRetCl", $row);
				$this->setViewName("pay_await");//shipments
			}
			else if ($fid=="1")
			{
			    $row = queryRow("deal_record", "*", " deliver_goods='客服已发货' and buyer='".the_user()->user_name."' ");
			    if (count($row) == 0)
			    {
			        $row = queryRow("deal_record", "*", " deliver_goods='买家已发货' and buyer='".the_user()->user_name."' ");
			    }
			    $s_id = db_key($row, "product_id");
			    $shop_g = queryRow("game_deal", "*", " id='".$s_id."' ");
			    $this->addObject("gname", $shop_g);
			    $this->addObject("setRet", $row);
				$this->setViewName("Confirm_goods");
			}
		}
		else {
			$this->setViewName("login2");
		}
	}
	function shipments_seller()//待发货查询_购卖方
	{
		if (the_user())
		{
			$fid=$_GET["fid"];
			$row = queryRow("deal_record", "*", " deliver_goods='待处理' and seller='".the_user()->user_name."' ");
			$kefu=db_key($row, "kefu_id");
			if ($kefu>0)
			{
			    $kefu_db=queryRow("jiaoyi_kefu", "*", " id='".$kefu."' ");
			    $this->addObject("kefu", $kefu_db);
			}
			
			$this->addObject("setRet", $row);
			$this->setViewName("shipments_seller");
		}
		else {
			$this->setViewName("login2");
		}
	}
	function mibao_m()//确认发货
	{
		$up=array(
		    "state"=>"卖家发货",
		    "payment_method"=>"已支付",
		    "mibao_m"=>$_POST["mibao"],
			"deliver_goods"=>"买家已发货"
		);
		$ret=update("deal_record", $_POST["did"], $up);//更新付款
		$this->setViewName("userCenter");
	}
	function Confirm_goods()//确认收货
	{
		$up=array("deliver_goods"=>"确认收货");
		$ret=update("deal_record", $_GET["bid"], $up);//更新付款
		$this->setViewName("Confirm_goods");
	}
	function kefu_affirm()//客服确认发货
	{
	    if ($_GET["zt"]=="买家已发货")
	    {
	        $up=array(
	            "state"=>"客服发货",
	            "payment_method"=>"已支付",
	            "deliver_goods"=>"客服已发货"
	        );
	        $ret=update("deal_record", $_GET["did"], $up);//更新付款
	        $this->setViewName("userCenter");
	    }
	    else {
	        exit("错误！");
	    }
	    
	}
	//查询商品
	function shop_record()
	{
	    if (the_user())
	    {
	        $row = queryRow_desc("game_deal", "*", " user_name='".the_user()->user_name."' and audit='通过' ");
	        $this->addObject("setRet", $row);
	        $this->addObject("headtitle", "-记录");
	        $this->setViewName("my_shop");
	    }
	}
	//下架或者上级
	function shop_soldout()
	{
	    if (the_user())
	    {
	        $ary = array("amount"=>"0", "state_dg"=>"下架", "audit"=>"通过");
	        $upgame=update("game_deal", $_GET["gid"], $ary);//更新库存
	        $objmsg ="下架成功";
	        $row = queryRow_desc("game_deal", "*", " user_name='".the_user()->user_name."' and audit='通过' ");
	        $this->addObject("setRet", $row);
	        $this->setViewName("my_shop");
	    }
	}
	
}