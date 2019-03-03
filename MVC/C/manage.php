<?php
class manage extends _Main
{
	function audit()//审核
	{
		$this->isAdmin=true;
		$this->setViewName("auditDevView");
	}
	function devper_audit()
	{
		$page=1;
		if(isset($_GET["page"])) $page=intval($_GET["page"]);
		$pagesize=2;//每页显示多少条
		if(isset($_GET["rows"])) $pagesize=intval($_GET["rows"]);
		if (the_user())
		{
			$dbuse = new dbUse();
			$ret=$dbuse->dbTableLimit("devper", " audit='0' ", $page, $pagesize);
			$prod=load_model("devper");
			//把notor的值直接转化为array
			$array=array_map('iterator_to_array', iterator_to_array($ret));
			$data=array();
			foreach($array as $r)
				$data[]=$r;
				$result=array("rows"=>$data,"total"=>$prod->_db->shop_devper()->count("*")
						,"page"=>$page);
				echo json_encode($result);
				exit();
		}
		else
		{
			exit("用户信息失效");
		}
	}
	function upper_audit()//个人开发者审核
	{
		$updateAry=array("audit"=>"1");
		$dbup=new dbUse();
		$ret=$dbup->updateUser("devper", $_GET['id'], $updateAry);
		exit($ret);
	}
	function addusers() {
	    $view=$_GET["type"];
	    $viewP="adduserDate";
	    $user = queryRow("user", "*", " id='".the_user()->user_id."' ");
	    foreach ($user as $u)
	    {
	        if ($u["phone"] && $view == "phone")
	        {
	            $view = $u["phone"];
	        }
	        if ($u["email"] && $view == "email")
	        {
	            $view = $u["email"];
	        }
	        if ($u["user_identity_num"] && $view == "names")
	        {
	            $view = $u["names"]."<br>身份证号：".$u["user_identity_num"];
	        }
	        if (!$u["names"] && $view == "names")
	        {
	            $viewP="addTrueName";
	        }
	    }
	    
	    $this->addObject("views", $view);
	    $this->addObject("user", $user);
	    $this->setViewName($viewP);
	}
	function upusers() {
	    $type=$_GET["type"];
	    if ($type == "names")
	    {
	        $dateAry=array(
	            "names"=>GET("names","post"),
	            "user_identity_num"=>GET("user_identity_num", "post")
	        );
	        update("user", the_user()->user_id, $dateAry);
	        $this->realName();
	    }
	    else 
	    {
	        $title = GET("title", "post");
	        $vl=GET($title,"post");
	        $dateAry=array($title=>$vl);
	        update("user", the_user()->user_id, $dateAry);
	        $this->setViewName("userCenter");
	    }
	    
	}
	function userdate() {
	    $user = queryRow("user", "*", " id='".the_user()->user_id."' ");
	    $this->addObject("dt", $user);
	    $this->setViewName("userView");
	}
	function realName() {
	    $this->setViewName("realName");
	}
}