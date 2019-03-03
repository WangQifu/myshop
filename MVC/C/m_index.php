<?php
 class m_index extends _Main
 {
     function m_index()//标记后台页面
	 {
	 	$this->isAdmin=true;
	 }

	 /**
	  * permission:{"role":"admin"}
	  * 本方法只有admin角色才能调用
	  */
	 function index()
	 {
	 	$this->setViewName("index_e");
	 }
	 function m_store()
	 {
	 	$this->setViewName("user_m_prod");
	 }
	 function listprod()
	 { 
	     $this->setViewName("listProd");
	 }
	 function upload()
	 {
	 	$this->setViewName("upload_test");
	 }
	 function addtitle()
	 {
	 	$this->setViewName("addtitle");
	 }
	 function getprod()//查询商品列表详情页
	 {
	     $page=1;
	     if(isset($_GET["page"])) $page=intval($_GET["page"]);
	     $pagesize=2;//每页显示多少条
	     if(isset($_GET["rows"])) $pagesize=intval($_GET["rows"]);
	     $store=the_store();
	     if ($store)
	     {
	     	$prod=load_model("prod");
	     	$ret=$prod->_db->shop_prod()->select('*');//这一行 是写死的
	     	$ret=$ret->where(" prod_store_id='".$store->store_id."' ")->order("id desc")->limit($pagesize,($page-1)*$pagesize);
	     	//把notor的值直接转化为array
	     	$array=array_map('iterator_to_array', iterator_to_array($ret));
	     	
	     	$data=array();
	     	foreach($array as $r)
	     		$data[]=$r;
	     		$result=array("rows"=>$data,"total"=>$prod->_db->shop_prod()->count("*")
	     				,"page"=>$page);
	     		echo json_encode($result);
	     		exit();
	     }
	     else 
	     {
	     	exit("用户信息失效");
	     }
	    
	 }
	 
	 function prod()//提交表单
	 {
	 	$store = the_store();
	 	if ($store)
	 	{
	 		if ($_POST)
	 		{
	 			$prod_name = GET("prod_name","post");
	 			$ispub=isset($_POST["prod_ispub"])?1:0;
	 			$addtime= date('Y-m-d h:i:s',strtotime($_POST["addtime"]));
	 			$prod_db=load_model("prod");
	 			$prod_db->loadall(" * "," prod_name='".$prod_name."' and prod_store_id='".$store->store_id."' ");
	 			$pord_row =  $prod_db->all();
	 			foreach ($pord_row as $p)
	 			{
	 				$pname=$p["prod_name"];
	 				if ($pname == $prod_name)
	 				{
	 					echo count($pord_row);
	 					exit("该商品已添加");
	 				}else 
	 				{
	 					$prodForm = new dev_form();
	 					$prod = $prodForm->shop_prod($_POST, $store);
	 					exit($prod);
	 				}
	 			}
	 		}
	 	}else 
	 	{
	 		exit("用户信息失效请重新登陆");
	 	}
	     
	     $this->columns("shop_prod", "addProd");
	     //通过系统columns查询shop_prod表字段
	 }
	 
	 function columns($table, $view)
	 {
	 	//通过系统columns查询shop_prod表字段
	 	$cols=load_model("columns",DB_SysDSN);//加载系统数据库MySql
	 	
	 	$cols->loadall(" * ","TABLE_NAME='$table' and  EXTRA!='auto_increment' ");//查询系统数据库字段MySql
	 	$this->addObject("tbSet",$cols->all());//将数据传入页面解析
	 	
	 	$this->setViewName($view);
	 }
	 
	 function store_action()//查询用户是否开通店铺
	 {
	 	$user_store = the_user();
	 	if ($user_store)
	 	{
	 		if ($_POST)//创建店铺提交表单信息
	 		{
	 			$store_name = GET("store_name", "post");
	 			$store=load_model("store",DB_DSN);
	 			$store->loadall(" * "," store_name='".$store_name."' ");
	 			$ret = $store->all();
	 			if (count($ret)>0)
	 			{
	 				foreach ($ret as $r)
	 				{
	 					$GET_DB_STORE = $r["store_name"];
	 					$user_name = $r["user_name"];
	 					if ($GET_DB_STORE == $store_name)
	 					{
	 						exit("店铺名称已被使用");
	 					}
	 					else if ($user_name == $user_store->user_name)
	 					{
	 						exit("对不起您已经注册店铺");
	 					}
	 				}
	 			}else {
	 				$store_s = new dev_form();
	 				$ret=$store_s->shop_store($_POST, $user_store);
	 				exit($ret);
	 			}
	 		}
	 		$userName = $user_store->user_name;//取出用户名
	 		$m = load_model("user");//加载用户表查询
	 		$m->loadall(" * "," user_name='".strval($userName)."' ");
	 		$ret = $m->all();
	 		foreach ($ret as $r)
	 		{
	 			$GET_DB_STOREID = $r["store_id"];
	 			if ($GET_DB_STOREID == "" && $GET_DB_STOREID == null)
	 			{
	 				//exit("没有店铺");
	 				$this->setViewName("addStore");
	 				$this->columns("shop_store", "addStore");
	 			}
	 			else
	 			{
	 				$m = load_model("store");//加载用户表
	 				$m->loadall(" * "," id='".strval($GET_DB_STOREID)."' ");
	 				$store =  $m->all();
	 				foreach ($store as $s)
	 				{
	 					load_lib("user", "storeinfo");//加载信息类
	 					$storeinfo = new storeinfo();
	 					$storeinfo->store_id=$s["id"];
	 					$storeinfo->store_name=$s["store_name"];
	 					$storeinfo->store_address=$s["store_address"];
	 					$storeinfo->store_city=$s["store_city"];
	 					$storeinfo->store_des=$s["store_des"];
	 					$storeinfo->store_loginIP=IP();
	 					$storeinfo->store_user=$s["user_name"];
	 					$get_remWeek=0;
	 					$cookie_string = myCrypt(serialize($storeinfo), StoreLogin_cookie) ;//序列化并加密
	 					//创建cookie
	 					$cookie_time = $get_remWeek>0?time()+3600*24*7:0;//time()表示当前时间s
	 					setcookie(Store_LoginKey, $cookie_string, $cookie_time, "/");//setcookie(User_LoginKey, $cookie_string, 0, "/", "User_LoginDomain");
	 					$this->setViewName("user_m_prod");
	 					$this->addObject("hideTop",true);
	 					$this->addObject("hideFooter",true);
	 					$this->addObject("store",$store);//将数据传入页面解析
	 					$this->isAdmin=true;
	 				}
	 			}
	 		}
	 	}
	 	else
	 	{
	 		$this->isAdmin=false;
	        $this->setViewName("login2");
	 	}
	 }
	 
	 function getTree_childs($id, $tree, $parentNode)//循环根节点。子节点
	 {
	     $children = array();
	     foreach ($tree as $r)
	     {
	         if ($r["pid"] == $id)
	         {
	             $child = array("id"=>$r["id"],"text"=>$r["tree_text"],"state"=>$r["tree_state"],
	                 "attributes"=>array("url" => $r["tree_url"]));//添加商品
	             $children[] = $child;
	         }
	     }
	     return $children;
	 }
	 function tree(){//后期修改递归
	     
	     $tree = load_model("m_tree");
	     $tree -> loadall();
	     $ret = $tree->all();
	     
	     $ret2 = clone ($ret);//克隆
	     $treeList = array();//拼接成树形菜单
	     foreach ($ret as $r)
	     {
	         if ($r["pid"] == 0)//代表根节点
	         {
	             $parentNode = array("id"=>$r["id"],"text"=>$r["tree_text"],"state"=>$r["tree_state"]);
	             $get_children = $this->getTree_childs($r["id"], $ret2, $parentNode);
	             if (count($get_children)>0)
	             {
	                 $parentNode["children"] = $get_children;
	             }
	             $treeList[] = $parentNode;
	         }   
	     }
	     exit(json_encode($treeList));
	 }
	 
	 function user_m_tree(){//后期修改递归
	 	
	 	$tree = load_model("m_u_tree");
	 	$tree -> loadall();
	 	$ret = $tree->all();
	 	$ret2 = clone ($ret);//克隆
	 	$treeList = array();//拼接成树形菜单
	 	foreach ($ret as $r)
	 	{
	 		if ($r["pid"] == 0)//代表根节点
	 		{
	 			$parentNode = array("id"=>$r["id"],"text"=>$r["tree_text"],"state"=>$r["tree_state"]);
	 			$get_children = $this->getTree_childs($r["id"], $ret2, $parentNode);
	 			if (count($get_children)>0)
	 			{
	 				$parentNode["children"] = $get_children;
	 			}
	 			$treeList[] = $parentNode;
	 		}
	 	}
	 	exit(json_encode($treeList));
	 }
 }

?>