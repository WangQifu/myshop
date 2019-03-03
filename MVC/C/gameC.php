<?php
include_once 'MVC/M/buyM.php';
class gameC extends _Main
{
	function gameIndexMobile()
	{
		$this->setViewName("indexgame");
		$this->viewP="v1game";
	}
	function selectSellGame()
	{
	    if (the_user())
	    {
	        $zmc=$_GET["zm"];
	        if ($zmc)
	        {
	            $gamecount = queryRow("applist", "*", " initial_az='".$zmc."' ");
	        }
	        else 
	        {
	            $gamecount = queryRow("applist", "*", "id");
	        }
	        $this->addObject("list", $gamecount);
	        $this->setViewName("sellList");
	    }
	    else
	    {
	        $this->isAdmin=false;
	        $this->setViewName("login2");
	    }
	}
	function gameListView()
	{
	        $zmc=$_GET["zm"];
	        $type="手游";
	        $typeg = $_GET["type"];
	        if ($_GET["type"]=="dy")
	        { 
	            $type = "端游";
	        }
	        if ($zmc)
	        {
	            $gamecount = queryRow("applist", "*", " game_type='".$type."' and initial_az='".$zmc."' ");
	        }
	        else
	        {
	            $gamecount = queryRow("applist", "*", " game_type='".$type."' ");
	        }
	        $this->addObject("viewD", $gamecount);
	        $this->addObject("typeg", $typeg);
	        $this->setViewName("gameListView");
	}
	function sellGame()
	{
		if (the_user())
		{
			$gameAccount = $_POST["game_account"];
			$view="";
			if ($_GET["type"]=="zd")
			{
				$this->addObject("type", "zd");
			}
			else
			{
				$gid=$_POST["game_id"];
				$qurow=queryRow("addmsg", "*", " game_id='".$gid."' and row_id='3' ");//查询行数据
				$this->addObject("t3", $qurow);
			}
			$sell=sell_game($_POST);
			if ($gameAccount=="账号")
			{
				$view="sellG1";
			}
			else $view="sellG2";
			$gamec="";
			if ($gameAccount=="装备")
			{
				$gamec="/件";
			}
			if ($gameAccount=="游戏币")
			{
				$gamec="/万金币";
			}
			$this->addObject("units", $gamec);
			$this->addObject("gid", $sell);
			$this->addObject("images", $_POST["image"]);
			$this->setViewName($view);
		}
		else 
		{
			$this->setViewName("login");
		}
	}
	function upSellGame()
	{
		if ($_POST)
		{
		    $qurow=queryRow("upimg", "*", " shopid='".$_POST["gid"]."' ");//查询行图片;
		    $image=db_key($qurow, "imageurl");
		    if (!$image)
		    {
		        $image=$_POST["image"];
		    }
			$up = UpSellGame($_POST,$image);//添加更新
			$this->addObject("row", $qurow);
			$this->shmsg();
			$this->setViewName("userCenter");
		}
		return null;
	}
	function buyGoods()//游戏收购信息
	{
	    if ($_POST)
	    {
	        $up = buyGoodsM($_POST);
	        $this->addObject("up", $up);
	        $this->shmsg();
	        $this->setViewName("userCenter");
	    }
	}
	function shmsg() {
	    DinDanMsg("18386400708","259754",the_user()->user_id);
	}
}