<?php

class indexC extends _Main{
    var $ProdName="";
  
    function getprod()
    {
        $this->setViewName("msg");
        $this->addObject("hideTop", true);
        $this->addObject("hideFooter", true);
    }
    function getIndexC()//调用模块
    {	
    	$viewSY = dbTableLimit4("applist", " game_type='手游' ", " 12 ");
    	$viewDY = dbTableLimit4("applist", " game_type='端游' ", " 12 ");
    	$viewYY = queryRow("applist", "*", " game_type='页游' ");
    	$wenz = dbTableLimit3("essay", "6");
    	$dl = dbTableLimit3("dailian", " 6 ");
    	$share = dbTableLimit2("account_share", " state_s!='删除' ", "10");//共享
    	$row_sh = dbTableLimit2("buygame", " audit='通过' ", "6");
    	$shop_3 = dbTableLimit2("game_deal", " audit='通过' and amount>0 ", "3");
    	$this->addObject("row_sh", $row_sh);
    	$this->addObject("shop", $shop_3);
        $this->addObject("viewD", $viewSY);
        $this->addObject("viewDY", $viewDY);
        $this->addObject("viewYY", $viewYY);
        $this->addObject("dailian", $dl);
        $this->addObject("share", $share);
        $this->addObject("wenz", $wenz);
        $this->addObject("headtitle", "-首页");
        $this->setViewName("index_v");//调用网页
        $this->addObject("hideTop", false);
        $this->addObject("hideFooter", false);
        //$this->setCacheEnabled(10);
//         if (!$this->inCache())
//         {
//             $this->addObject("ProdName", "");
//         }
    }
    function prodDB()
    {
        $viewSY = queryRow("applist", "*", " game_type='手游' ");
        //$viewDB= dbTableLimit2("applist", " game_type='手游' ","10,0");
        //echo $viewDB;
        return $viewSY;
    }
    function userCenter()//用户中心
    {
        if (!the_user())
        {
            $this->isAdmin=false;
	        $this->setViewName("login2");
        } 
        $user = queryRow("user", "*", " id='".the_user()->user_id."' ");
	    $this->addObject("dt", $user);
	    $this->addObject("headtitle", "-用户中心");
    	$this->setViewName("userCenter");//调用网页
    	$this->addObject("hideTop", false);
    	$this->addObject("hideFooter", false);
    }
    function userFind()
    {
    	$this->setViewName("userFind");//设置安全码
    	$this->addObject("hideTop", false);
    	$this->addObject("hideFooter", false);
    }
    function cartcell()//购物车列表
    {
    	$users = the_user();
    	$getCart=$_COOKIE[User_Cart_CookieKey];
    	if($getCart)
    	{
    		$getCart=myDecrypt($getCart, User_Cart_CryptKey);
    		if(!$getCart || trim($getCart)=="") exit("0");//说明cookie被破坏
    		$getCart=unserialize($getCart);
    		$pid=array();
    		$ms = load_model("prod");//加载用户表查询
    		foreach ($getCart as $c)
    		{
    			$ms->loadall(" * "," id='".$c."' ");
    			$ret = $ms->all();
    			foreach ($ret as $r)
    			{
    				$pid[]=$r;
    			}
    		}
    		$this->setViewName("cartCell");//设置安全码
    		$this->addObject("cart", $pid);
    		$this->addObject("hideTop", false);
    		$this->addObject("hideFooter", false);
    	}
    	else //没有加入过购物车，则初始化
    	{
    		exit("00");
    	}
    	
    }
    
    function accounts()//结算页面
    {
    	$getPid=$_POST["pid"];
    	echo $getPid;
    	exit("dssss");
    	$this->setViewName("accounts");//
    	$this->addObject("hideTop", false);
    	$this->addObject("hideFooter", false);
    }
    
}
?>