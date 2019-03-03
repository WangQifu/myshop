<?php
class addDB extends _Main
{
	function addDB()
	{
	    if (!the_user())
	    {
	        $this->isAdmin=false;
	        $this->setViewName("login2");
	    }
		$this->isAdmin=true;
	}
	function addtitleDB()
	{
		$form = new dev_form();
		$form->shop_addmsg($_POST);
	}
	function addgame()
	{
		if (the_user())
		{
			$this->setViewName("addgame");//addgame
		}
		else 
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}
	}
	function gamelistview()
	{
		if (the_user())
		{
			$gamecount = queryRow("applist", "*", "id");
			$this->addObject("tbSet", $gamecount);
			$this->addObject("headtitle", "-游戏列表");
			$this->setViewName("gamelist");
		}
		else
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}
	}
	function addtitleview()//添加标题
	{
		$gid=$_GET["gid"];
		$rid=$_GET["rowid"];
		if ($rid=="2") $qu=queryRow("addmsg", "*", " game_id='".$gid."' and row_id='1' ");
		else $qu=queryRow("addmsg", "*", " game_id='".$gid."' and row_id='".$rid."' ");
		$this->addObject("gid", $gid);
		$this->addObject("rid", $rid);
		$this->addObject("title", $qu);
		$this->addObject("headtitle", "-添加");
		if ($rid=="2") $this->setViewName("secondary_title");
		else $this->setViewName("addtitle");
	}
	function addgamelite()//添加游戏
	{
		$qu=queryRow("applist", "*", " appname='".$_POST["name"]."' ");
		if (count($qu)>0)
		{
			exit("该应用名称已存在");
		}
		else 
		{
			
		}
	}
	function preview()//出售游戏
	{
		$gid=$_GET["gid"];
		$qu=queryRow("applist", "*", " id='".$gid."' ");//查询所属
		$qurow=queryRow("addmsg", "*", " game_id='".$gid."' ");//查询行数据
		$this->addObject("game", $qu);
		$this->addObject("headtitle", "-出售");
		$t1 = array();
		$t2 = array();
		$t3 = array();
		foreach ($qurow as $title)
		{
			if ($title["row_id"] == "1")
			{
				$t1[] = $title["add_title"];
			}
			elseif ($title["row_id"] == "2")
			{
				$t2[] = $title["add_title"];
			}
			elseif ($title["row_id"] == "3")
			{
				$t3[] = $title["add_title"];
			}
		}
		$this->addObject("t1", $t1);
		$this->addObject("t2", $t2);
		$this->addObject("t3", $t3);
		
		$this->addObject("qurow", $qurow);
		$this->isAdmin=false;
		$this->setViewName("sell_game");
	}
	function sellGameZD()
	{
		$this->isAdmin=false;
		$this->addObject("headtitle", "-快速发布");
		$this->setViewName("sell_game_zd");
	}
	function customGameZD()//自定义发售
	{
		$this->isAdmin=false;
		$this->addObject("headtitle", "-快速发布");
		$this->setViewName("sell_game_zd");
	}
	function buyGoods()//收购信息
	{
	    if (the_user())
	    {
	        $this->isAdmin=false;
	        $this->addObject("headtitle", "-收购信息");
	        $this->setViewName("buyGoods");
	    }
	    else 
	    {
	        $this->isAdmin=false;
	        $this->addObject("headtitle", "-登录");
	        $this->setViewName("login2");//addgame
	    }
	}
	function gameCommunity()//发布动态
	{
	    if (the_user())
	    {
	        if ($_POST)
	        {
	            $add = array(
	                "userid"=>the_user()->user_id,
	                "gameid"=>GET("gid","post"),
	                "username"=>the_user()->user_name,
	                "usericon"=>the_user()->user_image,
	                "c_title"=>GET("title","post"),
	                "c_desc"=>GET("desc","post")
	            );
	            $addrow = addTableRow("gcommunity", $add);
	            exit($addrow) ;
	        }
	        
	    }
	    else 
	    {
	        $this->isAdmin=false;
	        $this->addObject("headtitle", "-登录");
	        $this->setViewName("login2");//addgame
	    } 
	}
	function accountShareView()//共享账号
	{
	    if (the_user())
	    {
	        $this->isAdmin=false;
	        $share = queryRow("account_share", "*", " user_id='".the_user()->user_id."' and state_s!='删除' ");//动态
	        $this->addObject("headtitle", "-共享账号");
	        $this->addObject("share", $share);
	        $this->setViewName("account_share");
	    }
	    else
	    {
	        $this->isAdmin=false;
	        $this->addObject("headtitle", "-登录");
	        $this->setViewName("login2");//addgame
	    }
	    
	}
	function accountSharePost()
	{
	    if ($_POST)
	    {
	        $date=array(
	            "user_id"=>the_user()->user_id,
	            "a_title"=>GET("title","post"),
	            "game_name"=>GET("game_name","post"),
	            "g_servers"=>GET("g_servers","post"),
	            "account_operator"=>GET("account_operator","post"),
	            "accountnuber"=>GET("accountnuber","post"),
	            "password"=>myCrypt(GET("password","post"), pass_CryptKeyQT),
	            "price"=>GET("price","post"),
	            "price"=>"更新",
	            "desc_ribe"=>GET("describe","post"),
	            "phone"=>GET("phone","post"),
	            "QQ"=>GET("QQ","post"),
	            "weixin"=>GET("weixin","post")
	        );
	        if ($_GET["type"]=="up")
	        {
	            $up = update("account_share", $_GET["sid"], $date);
	            $this->accountShareView();
	            if ($up)
	            {
	               
	            }
	        }
	        else 
	        {
	            $up = shareAccount($date);
	            $this->accountShareView();
	        }
	        
	    }
	}
	
}