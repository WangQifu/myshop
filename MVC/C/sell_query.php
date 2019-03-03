<?php
class sell_query extends _Main
{
	function setGame_sell()
	{
		$row = "";
		$viewname="";
		if ($_GET["pid"])
		{
		    $gid=$_GET["pid"];
			$row = queryRow("game_deal", "*", " game_id='".$gid."' and audit='通过' ");
			$game= queryRow("applist", "*", " id='".$gid."' ");
			$wenz = dbTableLimit2("essay", " gameid='".$gid."' ", "10");//文章
			$share = dbTableLimit2("account_share", " state_s!='删除' ", "10");//共享
			if (count($wenz) == 0)
			{
			    $wenz = dbTableLimit3("essay", "10");
			}
			$dt = dbTableLimit2("gcommunity", " gameid='".$gid."' ", "12");//动态
			if (count($dt) == 0)
			{
			    $dt = dbTableLimit3("gcommunity", "10");
			}
			if (count($row) <= 0)
			{
			    $row = queryRow("game_deal", "*", " audit='通过' and amount>0 ");
			}
			$this->addObject("game", $game);
			$this->addObject("wenz", $wenz);
			$this->addObject("dongtai", $dt);
			$this->addObject("share", $share);
			$this->addObject("gid", $gid);
			if (db_key($game, "appname"))
			{
			    $this->addObject("headtitle", "-".db_key($game, "appname"));
			    $this->addObject("gamename", db_key($game, "appname"));
			}
			$viewname="gameInfo";
		}
		else {
			$row = queryRow("game_deal", "*", " audit='通过' and amount>0 ");
			$row_sh = queryRow("buygame", "*", " audit='通过' ");
			$this->addObject("row_sh", $row_sh);
			$this->addObject("headtitle", "-游戏商品");
			$viewname="sell_list";
		}
		
		$this->addObject("row", $row);
		$this->setViewName($viewname);
	}
	
	function sell_msgV()//商品详情
	{
		$gid=$_GET["gid"];
		$row = queryRow("game_deal", "*", " id='".$gid."' ");
		if (db_key($row, "state_dg"))
		{
		    $this->addObject("state", db_key($row, "state_dg"));
		}
		$game_ac = db_key($row, "game_account");
		$desc = queryRow("rowcontent", "*", " prod_id='".$gid."' ");
		$this->addObject("row", $row);
		$this->addObject("headtitle", "-商品详情");
		$this->addObject("ly_view", $game_ac);
		$this->addObject("desc", $desc);
		$this->setViewName("sell_msg");
	}
	function order_form()
	{
		if (the_user())
		{
		    $gid=$_GET["gid"];
		    $dt=queryRow("deal_record", "*", " product_id='".$gid."' and buyer='".the_user()->user_name."' ");
		    if (count($dt)>0)
		    {
		        $this->pay_await();
		    }
		    else
		    {
		        $type=$_GET["type"];
		        $row = queryRow("game_deal", "*", " id='".$gid."' ");
		        $kefu = queryRow("jiaoyi_kefu", "*", " gameid='".db_key($row, "game_id")."' and kefu_yajin>='".db_key($row, "price")."' ");
		        if (the_user()->user_name == db_key($row, "user_name"))//判断是不是自己的商品
		        {
		            $this->setViewName("userCenter");
		        }
		        else 
		        {
		            if (count($kefu)==0)//客服
		            {
		                $kefu = queryRow("jiaoyi_kefu", "*", " kefu_type>='60' ");
		            }
		            $this->addObject("row", $row);
		            $this->addObject("kefu", $kefu);
		            $this->addObject("ly_view", db_key($row, "game_account"));
		            $this->setViewName("order_form");
		        }   
		    }
		}
		else 
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}
	}
	function record() {//历史记录
	    if (the_user())
	    {
	        $row = queryRow("deal_record", "*", " buyer='".the_user()->user_name."' ");
	        $this->addObject("setRet", $row);
	        $this->addObject("headtitle", "-记录");
	        $this->setViewName("record");
	    }
	}
	function shougou() {
	    if (the_user())
	    {
	        $row_sh = queryRow("buygame", "*", " id='".$_GET["sid"]."' and audit='通过' ");
	        $this->addObject("shrow", $row_sh);
	        $this->addObject("headtitle", "-收货");
	        $this->setViewName("shouhuo");
	    }
	    else 
	    {
	        $this->isAdmin=false;
	        $this->setViewName("login2");
	    }
	    
	}
	function pay_await()//等待付款查询
	{
	    if (the_user())
	    {
	        $row = queryRow("deal_record", "*", " state='待付款' and buyer='".the_user()->user_name."' ");
	        $this->addObject("setRet", $row);
	        $this->addObject("type", db_key($row, "shop_type"));
	        $this->addObject("headtitle", "-等待付款");
	        $this->setViewName("pay_await");
	    }
	    else {
	        $this->setViewName("login2");
	    }
	}
}