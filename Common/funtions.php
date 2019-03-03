<?php 
// 通用web函数
function the_user()//解析用户登陆cookie
{
    session_start();
    if (isset($_COOKIE[User_LoginKey]))
    {
    	$getcookie=myDecrypt($_COOKIE[User_LoginKey], UserLogin_cookie);
        
        load_lib("user", "userinfo");
        $userinfo = new userinfo();//实例化
        $userinfo=unserialize($getcookie);//赋值
        
        if ($userinfo && $userinfo->user_name != "" && $userinfo->user_loginIP == IP())
        {
            //判断cookie的合法性
            return $userinfo;
        }
       
    }
    else if (isset($_SESSION[User_LoginKey]))
    {
        $getsession=myDecrypt($_SESSION[User_LoginKey], UserLogin_cookie);
        
        load_lib("user", "userinfo");
        $userinfo = new userinfo();//实例化
        $userinfo=unserialize($getsession);//赋值
        
        if ($userinfo && $userinfo->user_name != "" && $userinfo->user_loginIP == IP())
        {
            //判断cookie的合法性
            return $userinfo;
        }
    } 
    return false;
}

function the_store()//解析商店登陆信息cookie
{
	if (isset($_COOKIE[Store_LoginKey]))
	{
		$getcookie=myDecrypt($_COOKIE[Store_LoginKey], StoreLogin_cookie);
		load_lib("user", "storeinfo");
		$storeinfo = new storeinfo();//实例化
		$storeinfo=unserialize($getcookie);//赋值
		
		if ($storeinfo && $storeinfo->store_name != "" && $storeinfo->store_loginIP== IP())
		{
			//判断cookie的合法性
			return $storeinfo;
		}
	}
	return false;
}

function GET($pname,$method="get")
{
	$plist=$method=="get"?$_GET:$_POST;
	if(isset($plist[$pname]))
	{
	   $getValue=trim($plist[$pname]);
	   $getValue=strip_tags($getValue);//去除html和php 标记
	   $getValue=addslashes($getValue);//单双引号、反斜线及NULL加上反斜线转义
	   $getValue=str_replace(array("gcd","他妈","TMD","操"),"**",$getValue);//过滤敏感字符
 
		return $getValue;
	}
	else
		return false;
}

function IP()
{
 
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		  $cip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(!empty($_SERVER["REMOTE_ADDR"])){
		  $cip = $_SERVER["REMOTE_ADDR"];
		}
		else{
		  $cip = "";
		}
		return $cip;
	 
		 
}
function set_cache($key,$value,$expire)
{
// 	$m=new Memcache();
// 	$m->connect(Cache_IP,Cache_port);//"11211" Cache_port
// 	$m->set($key,$value,0,$expire);
	
}
function get_cache($key)
{
	 //获取缓存
// 	$m=new Memcache();
// 	$m->connect(Cache_IP,Cache_port);
	//return $m->get($key);
}
function get_CookieCart()
{
	//封装方法获取用户未登录时的购物车
	$getCart=$_COOKIE[User_Cart_CookieKey];
	if ($getCart)
	{
		$getCart=myDecrypt($getCart, User_Cart_CookieKey);//解密
		if (!$getCart || trim($getCart) == "") return false;
		return unserialize($getCart);
	}
	return false;
}
function load_model($mName,$dsn=DB_DSN)
{
	//加载一个模块
	return new _Model($mName,$dsn);
}

function load_lib($lib,$libName)
{
	//后缀必须是php
	require_once(dirname(dirname(__FILE__))."/Lib/".$lib."/".$libName.".php");
}

//加载 外部函数
require 'crypt.php';//加密函数
require 'initialAZ.php';
require (dirname(dirname(__FILE__)).'/MVC/M/dbUse.php');//加载数据库操作文件
require (dirname(dirname(__FILE__)).'/Lib/msgUcpaas.php');//加载短信验证文件


function city()
{
	$getIp=$_SERVER["REMOTE_ADDR"];
	echo 'IP:',$getIp;
	echo '<br/>';
	$content = file_get_contents("http://api.map.baidu.com/location/ip?ak=7IZ6fgGEGohCrRKUE9Rj4TSQ&ip={$getIp}&coor=bd09ll");
	$json = json_decode($content);
	
	echo 'log:',$json->{'content'}->{'point'}->{'x'};//按层级关系提取经度数据
	echo '<br/>';
	echo 'lat:',$json->{'content'}->{'point'}->{'y'};//按层级关系提取纬度数据
	echo '<br/>';
	print $json->{'content'}->{'address'};//按层级关系提取address数据
}

function the_time($t){
    date_default_timezone_set('PRC');
	if ($t=="h")
	{
		$time = date('Y-m-d H:i:s');
	}
	else $time =date('Y-m-d');
	return $time;
}
?>