<?php
    class member extends _Main
    {
    	var $user_name = "";
    	var $user_pass = "";
    	var $ret_row = "";
        function login()
        {
            $this->setViewName("login");
            $this->addObject("hideTop",true);
            $this->addObject("hideFooter",true);
        }
        
        function unlogin()//注销
        {
            $this->setViewName("unlogin");
            $this->addObject("hideTop",true);
            $this->addObject("hideFooter",true);
            
            $this->addObject("REFERER", "index.php?control=indexC&action=getIndexC");//跳转传当前的URL以便返回//$_SERVER['HTTP_REFERER']
            //var_export($_SERVER['HTTP_REFERER']) ;
            setcookie(User_LoginKey, "", time()-3600, "/");
            setcookie(User_LoginKey, NULL);//
            unset($_SESSION[User_LoginKey]);
            //session_destroy();//删除session
            
        }
        function logon()
        {
        	$this->setViewName("logon");
        	$this->addObject("hideTop",true);
        	$this->addObject("hideFooter",true);
        }
        function mergeCart($username)
        {
        	$getCart=get_CookieCart();//获取cookie里的购物车数据
        	$getCacheCart=get_cache(User_Cart_CacheKey.$username);//获取缓存
        	if (!$getCacheCart || trim($getCacheCart) == "") $getCacheCart=array();
        	if ($getCart)
        	{
        		$getCacheCart=array_unique(array_merge($getCart,$getCacheCart));
        	}
        	if (count($getCacheCart)>0)
        	{
        		set_cache(User_Cart_CacheKey.$username, $getCacheCart, 3600);
        	}
        }
        
        function login_action()//用户登陆
        {
            //login.php页面传来的post数据
            $get_username=GET("username", "post");
            $get_userpass=GET("userpass", "post");
            $get_remWeek = intval($_POST["rem"]);
            $msg = "";
            if ($get_username=="" || $get_userpass=="")
            {
                $msg="用户名或者密码不能为空";
                
            }else {
            	$m = load_model("user");//加载用户表
            	$m->loadall(" * "," user_name='".strval($get_username)."' ");
            	$ret = $m->all();
            	
            	foreach ($ret as $r)
            	{
            		$GET_DB_PASS = $r["user_pass"];
            		if ($GET_DB_PASS && myDecrypt($GET_DB_PASS, User_CryptKey)==$get_userpass)//$GET_DB_PASS== myCrypt($get_userpass, User_CryptKey)
            		{
            			load_lib("user", "userinfo");//加载用户登陆信息类
            			$userinfo = new userinfo();
            			$userinfo->user_id=$r["id"];
            			$userinfo->user_name=$get_username;
            			$userinfo->user_image=$r["icons"];
            			$userinfo->user_regtime = $r["user_regtime"];//$m->user_regtime
            			$userinfo->user_loginIP = IP();
            			$userinfo->user_logintime = strtotime(date('Y-m-d h:i:s'));//登陆时间戳
            			
            			$cookie_string = myCrypt(serialize($userinfo), UserLogin_cookie);//序列化并加密
            			//创建cookie
            			$cookie_time = $get_remWeek>0?time()+3600*24*7:0;//time()表示当前时间s
            			setcookie(User_LoginKey, $cookie_string, $cookie_time);//setcookie(User_LoginKey, $cookie_string, 0, "/", "User_LoginDomain");
            			session_start();
            			// store session data
            			$_SESSION[User_LoginKey]=$cookie_string;
            			
            			//$this->mergeCart($get_username);//用户登陆时合并购物车
            			$msg = "1";
            		}else {
            			$msg ="用户名或者密码不正确";
            		}
            	}
            }
            exit($msg);
        }
        
        function user_logon()//注册
        {
        	$get_name = GET("username", "post");
        	$get_pass = GET("userpass", "post");
        	$tj_code = GET("tjcode", "post");
        	if ($get_name == "" && $get_pass == "")
        	{
        		exit("用户名或者密码不能为空");
        	}
        	else 
        	{
        		$m = load_model("user");//加载用户表
        		$m->loadall(" * "," user_name='".$get_name."' ");
        		$ret = $m->all();
        		if (count($ret)>0)//大于0表示有值
        		{
        			foreach ($ret as $r)
        			{
        				$GET_DB_user = $r["user_name"];
        				if ($GET_DB_user == $get_name)
        				{
        					exit($GET_DB_user."用户已存在");
        				}
        			}
        		}else 
        		{
        			$get_pass = myCrypt($get_pass, User_CryptKey);//加密
        			
        			$user = load_model("user");
        			date_default_timezone_set('PRC');
        			$timer = date("Y-m-d H:i:s");
        			$ret = $user->_db->shop_user()->insert(array(
        					"user_name" => $get_name,
        					"user_pass" => $get_pass,
        			        "phone"=>$get_name,
        			        "icons"=>"uploadimg/iconimg/usericon.png",
        					"user_regtime" => $timer	
        			));
        			if ($ret)
        			{
        			    if ($tj_code)
        			    {
        			        $data = array(
        			            "tjuser"=>$get_name,
        			            "timer"=>$timer,
        			            "tjcode"=>$tj_code
        			        );
        			        addTableRow("tjuser", $data);
        			    }
        			}
        			exit("注册成功！");
        		}
        	}
        }
        
        function detection($tab, $where)//查询某个值
        {
        	$m = load_model($tab);//加载用户表
        	$m->loadall($where);
        	//$this->ret_row = $m->all();
        	return $m->all();
        }
        
        function setSession($key,$value)
        {
        	session_start();
        
        	$_SESSION[$key]=$value;
        }
        
    }
?>