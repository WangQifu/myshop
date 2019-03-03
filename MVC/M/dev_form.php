<?php
class dev_form
{
	function setDevPer($post,$user)//注册个人开发者
	{
		$user = the_user();
		$dev_per = load_model("devper");
		$addtime= date('Y-m-d');
		$ret=$dev_per->_db->shop_devper()->insert(array(
				"devid"=>$user->user_id,
				"devacc"=>$user->user_name,
				"devname"=>GET("devname","post"),
				"works"=>GET("works","post"),
				"photo"=>GET("photo","post"),
				"IDNum"=>GET("IDNum","post"),
				"address"=>GET("address","post"),
				"email"=>GET("email","post"),
				"phone"=>GET("phone","post"),
				"tel"=>GET("tel","post"),
				"offweb"=>GET("offweb","post"),
				"addtime"=>$addtime
				));
		return $ret;
	}
	function setDevcorporation($post,$user)//注册公司开发者
	{
		$dev_cor = load_model("devcor");
		$addtime= date('Y-m-d');
		$ret=$dev_cor->_db->shop_devcor()->insert(array(
				"devid"=>$user->user_id,
				"devacc"=>$user->user_name,
				"devname"=>GET("devname","post"),
				"works"=>GET("works","post"),
				"photo"=>GET("photo","post"),
				"IDNum"=>GET("IDNum","post"),
				"corporation_address"=>GET("corporation_address","post"),
				"address"=>GET("address","post"),
				"email"=>GET("email","post"),
				"phone"=>GET("phone","post"),
				"tel"=>GET("tel","post"),
				"offweb"=>GET("offweb","post"),
				"addtime"=>$addtime
		));
		if ($ret)
		{
			return "1";
		}
	}
	function setUpLoadGame($post, $user)//上传新游戏
	{
		$dev_cor = load_model("applist");
		$addtime= date('Y-m-d');
		$szm="";
		if (getFirstCharter(GET("appname","post")) != NULL)
		{
		    $szm=getFirstCharter(GET("appname","post"));
		}
		else 
		{
		    $szm=GET("szm","post");
		    
		}
		$dary=array(
				"userid"=>$user->user_id,
				"game_type"=>GET("game_type","post"),
				"appname"=>GET("appname","post"),
				"versions"=>GET("versions","post"),
				"dev_name"=>$user->user_name,
				"package"=>GET("package","post"),
				"keyword"=>GET("keyword","post"),
				"appurl"=>GET("appurl","post"),
				"appintr"=>GET("appintr","post"),
				"log"=>GET("log","post"),
				"preview_image1"=>GET("preview_image1","post"),
				"preview_image2"=>GET("preview_image2","post"),
				"preview_image3"=>GET("preview_image3","post"),
				"preview_image4"=>GET("preview_image4","post"),
				"preview_image5"=>GET("preview_image5","post"),
				"appdwurl"=>GET("appdwurl","post"),
				"uptimer"=>$addtime,
				"client"=>GET("client","post"),
				"audit"=>GET("audit","post"),
				"icon480"=>GET("icon480","post"),
				"icon720"=>GET("icon720","post"),
				"icon1080"=>GET("icon1080","post"),
				"icon1440"=>GET("icon1440","post"),
		        "initial_az"=>$szm,
		        "recommend"=>0
		);
		$ret=$dev_cor->_db->shop_applist()->insert($dary);
		//return $dary;
		if ($ret)
		{
			return "添加".$ret;
		}else return "添加失败";
	}
	function shop_store($post, $user_store)
	{
		$store=load_model("store",DB_DSN);
		$addtime= date('Y-m-d h:i:s');
		$ispub=isset($post["pact"])?1:0;
		$ret=$store->_db->shop_store()->insert(array(
				"user_id"=>$user_store->user_id,//$usersData->user_id,
				"user_name"=>$user_store->user_name,//$usersData->user_name,
				"store_name"=>GET("store_name","post"),
				"store_icon"=>GET("store_icon","post"),
				"store_address"=>GET("store_address","post"),
				"store_city"=>GET("store_city","post"),
				"store_des"=>GET("store_des","post"),
				"user_identity_f"=>GET("user_identity_f","post"),
				"user_identity_r"=>GET("user_identity_r","post"),
				"store_license"=>GET("store_license","post"),
				"pact"=>$ispub,
				"time"=>$addtime
		));
		if (is_int(intval($ret)))
		{
			$user_up = load_model("user");
			$data =array("store_id"=>$ret);
			$ret_up = $user_up->_db->shop_user()->where('id',$user_store->user_id)->update($data);
			if ($ret_up)
			{
				exit("注册成功等待等待审核！");
			}
		}
	}
	function shop_prod($post, $store)//添加商品
	{
		$prod_db=load_model("prod");
		$ret=$prod_db->_db->shop_prod()->insert(array(
				"prod_name"=>$prod_name,
				"prod_icon"=>GET("prod_icon","post"),
				"prod_store_id"=>$store->store_id,
				"prod_store_name"=>$store->store_name,
				"prod_city"=>GET("prod_city","post"),
				"prod_intr"=>GET("prod_intr","post"),
				"prod_content"=>GET("prod_content","post"),
				"prod_classid"=>GET("prod_classid","post"),
				"prod_price1"=>GET("prod_price1","post"),
				"prod_price2"=>GET("prod_price2","post"),
				"prod_ispub"=>$ispub,
				"addtime"=>the_time("h")
		));
		if ($ret)
		{
			exit("1");
		}
	}
	
	function shop_addmsg($post)
	{
		$addmsg=load_model("addmsg");
		$ret=$addmsg->_db->shop_addmsg()->insert(array());
	}
}