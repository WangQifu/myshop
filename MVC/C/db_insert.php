<?php
class db_insert extends _Main
{
		function store_on()
		{
			if ($_POST)
			{
				
				$store=load_model("store");
				
				$addtime= date('Y-m-d h:i:s');
				$ispub=isset($_POST["pact"])?1:0;
				
				$ret=$store->_db->shop_store()->insert(array(
						"user_id"=>"1",//$user_id,
						"user_name"=>"111111",//$user_name,
						"store_name"=>GET("store_name","post"),
						"store_icon"=>GET("store_icon","post"),
						"store_address"=>GET("store_address","post"),
						"store_city"=>GET("store_city","post"),
						"store_des"=>GET("store_des","post"),
						"user_identity_f"=>GET("user_identity_f","post"),
						"user_identity_r"=>GET("user_identity_r","post"),
						"store_license"=>GET("store_license","post"),
						"pact"=>$ispub,
						"addtime"=>$addtime
				));
				
				exit($ret);
			}
		}
		
		function prod()
		{
			if ($_POST)
			{
				
				$prod=load_model("prod");
				
				$ispub=isset($_POST["prod_ispub"])?1:0;
				
				$addtime= date('Y-m-d h:i:s',strtotime($_POST["addtime"]));
				
				$ret=$prod->_db->shop_prod()->insert(array(
						"prod_name"=>GET("prod_name","post"),
						"prod_icon"=>GET("prod_icon","post"),
						"prod_store_id"=>GET("prod_store_id","post"),
						"prod_store_name"=>GET("prod_store_name","post"),
						"prod_city"=>GET("prod_city","post"),
						"prod_intr"=>GET("prod_intr","post"),
						"prod_content"=>GET("prod_content","post"),
						"prod_classid"=>GET("prod_classid","post"),
						"prod_price1"=>GET("prod_price1","post"),
						"prod_price2"=>GET("prod_price2","post"),
						"prod_ispub"=>$ispub,
						"addtime"=>$addtime
				));
				
				exit($ret);
			}
		}
		function setRowTitle()
		{
			if ($_POST)
			{
				
				$prod=load_model("addmsg");
				$ret=$prod->_db->shop_addmsg()->insert(array(
						"game_id"=>GET("game_id","post"),
						"row_id"=>GET("row_id","post"),
						"add_title"=>GET("add_title","post")
				));
				
				exit($ret);
			}
		}

}