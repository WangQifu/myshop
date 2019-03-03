<?php
class auditC extends _Main
{
    function auditC()
    {
        if (!the_user())
        {
            $this->isAdmin=false;
	        $this->setViewName("login2");
        }
    }
	function audit_m()
	{
	    if (the_user()->user_name == "18386400708")
	    {
	        $row = queryRow("game_deal", "*", " audit='审核' ");
	        $audit_sh = queryRow("buygame", "*", "audit='审核' ");
	        $this->addObject("row", $row);
	        $this->addObject("row_sh", $audit_sh);
	        if ($_GET["type"]=="game")//审核成功
	        {
	            $up=array(
	                "audit"=>"通过",
	                "state_dg"=>"通过"
	            );
	            	
	            $ret=update("game_deal", $_GET["gid"], $up);//更新审核
	        }
	        else
	        {
	            $up=array(
	                "audit"=>"失败",
	                "state_dg"=>"失败"
	            );
	             
	            $ret=update("game_deal", $_GET["gid"], $up);//更新审核
	        }
	        
	        if ($_GET["type"]=="game_sh")//审核成功
	        {
	            $up=array(
	                "audit"=>"通过"
	            );
	             
	            $ret=update("buygame", $_GET["gid"], $up);//更新审核
	        }
	        else
	        {
	            $up=array(
	                "audit"=>"失败"
	            );
	             
	            $ret=update("buygame", $_GET["gid"], $up);//更新审核
	        }
	        $this->isAdmin=true;
	        $this->setViewName("audit_goods");
	    }
	    else 
	    {
	        exit("没有权限");
	    }
		
	}
	
	function audit_goods()
	{
		
	}
	
	function audit_goods_no()//审核不成功
	{
		
	}
	//游戏客服
	function gameKefu() {
	    $kefu = queryRow("jiaoyi_kefu", "*", " userid='".the_user()->user_id."' ");
	    if (count($kefu)>0)
	    {
	        if (db_key($kefu, "state_zt") == "通过")
	        {
	            $this->kefuDeal();
	        }
	        else 
	        {
	            $this->kefu_view($kefu);
	        }
	        
	    }
	    else 
	    {
	        $row = queryRow("applist", "*", " id ");
	        $this->addObject("list", $row);
	        $this->setViewName("kefu_apply");
	    }
	    
	}
	function kefu_logon() {//客服申请提交
	    $sq_kefu = array(
	        "userid"=>the_user()->user_id,
	        "gameid"=>GET("gameid", "post"),
	        "username"=>the_user()->user_name,
	        "kefunick"=>GET("kefunick", "post"),
	        "kefu_yajin"=>GET("kefu_yajin", "post"),
	        "sq_timer"=>the_time("h"),
	        "fuwu_shijian"=>GET("fuwu_shijian", "post"),
	        "kefu_type"=>GET("kefu_type", "post"),
	        "phone"=>GET("phone", "post"),
	        "QQ"=>GET("QQ", "post"),
	        "weixin"=>GET("weixin", "post"),
	        "state_zt"=>"申请"
	    );
	   $row = addTableRow("jiaoyi_kefu", $sq_kefu);
	   if ($row>0)
	   {
	       $this->kefu_view("0");
	   }
	   else 
	   {
	       exit("添加失败");
	   }
	  
	}
	
	function kefu_view($row)
	{
	    $kefu = "";
	    if ($row == "0")
	    {
	        $kefu = queryRow("jiaoyi_kefu", "*", " userid='".the_user()->user_id."' ");
	    }
	    else 
	    {
	        $kefu = $row;
	    }
	    $gid = db_key($kefu, "gameid");
	    $game = queryRow("applist", "*", " id='".$gid."' ");
	    if (db_key($game, "appname"))
	    {
	        $this->addObject("gamename", db_key($game, "appname"));
	    }
	    $this->addObject("kefu", $kefu);
	   
	    $this->setViewName("kefuview");
	}
	//审核客服
	function kefu_audic()
	{
	    if (the_user()->user_name == "18386400708")
	    {
	        if ($_GET["type"] == "kefu_sh")
	        {
	            $up_qry = array(
	                "state_zt"=>"通过"
	            );
	            $ret=update("jiaoyi_kefu", $_GET["kid"], $up_qry);//更新审核
	        }
	        else if($_GET["type"] == "kefu_no")
	        {
	            $up_qry = array(
	                "state_zt"=>"失败"
	            );
	            $ret=update("jiaoyi_kefu", $_GET["kid"], $up_qry);//更新审核
	        }

	        $row = queryRow("jiaoyi_kefu", "*", " state_zt='申请' ");
	        $this->addObject("row", $row);
	        $this->isAdmin=true;
	        $this->setViewName("audit_kefu");
	        
	    }
	}
	//交易客服服务
	function kefuDeal()
	{
	    //获得客服id
	    $kefuid = queryRow("jiaoyi_kefu", "id", " userid='".the_user()->user_id."' ");
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
	//游戏代练
	function gameDailian() {
	    $dailian = queryRow("dailian", "*", " userid='".the_user()->user_id."' ");
	    //查询是否有注册？如果有进入订单页面，如果没有进入注册页面
	    if (count($dailian)>0)
	    {
	        if (db_key($dailian, "state_zt") == "通过")
	        {
	            $this->dailianDeal();
	        }
	        else
	        {
	            $this->dailian_view($dailian);
	        }
	         
	    }
	    else
	    {
	        $row = queryRow("applist", "*", " id ");
	        $this->addObject("list", $row);
	        $this->setViewName("dailian_apply");
	    }
	     
	}
	//代练申请提交
	function dailian_logon() {
	    $desc_msStr = GET("desc_ms", "post");
	    $sq_kefu = array(
	        "userid"=>the_user()->user_id,
	        "gameid"=>GET("gameid", "post"),
	        "username"=>the_user()->user_name,
	        "dnick"=>GET("dnick", "post"),
	        "dailian_yajin"=>GET("dailian_yajin", "post"),
	        "sq_timer"=>the_time("h"),
	        "fuwu_shijian"=>GET("fuwu_shijian", "post"),
	        "desc_ms"=> $desc_msStr,
	        "phone"=>GET("phone", "post"),
	        "QQ"=>GET("QQ", "post"),
	        "weixin"=>GET("weixin", "post"),
	        "state_zt"=>"通过"
	        //申请
	    );
	    $row = addTableRow("dailian", $sq_kefu);
	    if ($row>0)
	    {
	        $this->dailian_view("0");
	    }
	    else
	    {
	        exit("添加失败");
	    }
	}
	function dailian_view($row)
	{
	    $dailian = "";
	    if ($row == "0")
	    {
	        $dailian = queryRow("dailian", "*", " userid='".the_user()->user_id."' ");
	    }
	    else
	    {
	        $dailian = $row;
	    }
	    $gid = db_key($dailian, "gameid");
	    $game = queryRow("applist", "*", " id='".$gid."' ");
	    if (db_key($game, "appname"))
	    {
	        $this->addObject("gamename", db_key($game, "appname"));
	    }
	    $this->addObject("dailian", $dailian);
	
	    $this->setViewName("dailian_view");
	}
	//交易客服服务
	function dailianDeal()
	{
	    //获得客服id
	    $dailianid = queryRow("dailian", "id", " userid='".the_user()->user_id."' ");
	    //查询服务订单
	    if (count($dailianid)>0)
	    {
	        $dealList = queryRow("dailian_indent", "*", " dailian_id='".db_key($dailianid, "id")."' and indent_type!='完成' ");
	        $this->addObject("list", $dealList);
	        $this->setViewName("gameKefuDealView");
	    }
	    else
	    {
	        $this->setViewName("userCenter");
	    }
	     
	}
	//审核代练
	function dailian_audic()
	{
	    if (the_user()->user_name == "18386400708")
	    {
	        if ($_GET["type"] == "dailian_sh")
	        {
	            $up_qry = array(
	                "state_zt"=>"通过"
	            );
	            $ret=update("dailian", $_GET["did"], $up_qry);//更新审核
	        }
	        else if($_GET["type"] == "dailian_no")
	        {
	            $up_qry = array(
	                "state_zt"=>"失败"
	            );
	            $ret=update("dailian", $_GET["did"], $up_qry);//更新审核
	        }
	
	        $row = queryRow("dailian", "*", " state_zt='申请' ");
	        $this->addObject("row", $row);
	        $this->addObject("lxtype", "dl");
	        $this->isAdmin=true;
	        $this->setViewName("audit_kefu");
	         
	    }
	}
	
}


