<?php
// require_once 'MVC/M/dbUse.php';
require_once 'MVC/M/dev_form.php';
include_once 'MVC/M/deleteM.php';
class devloperC extends _Main
{
	function columsTable($table="")//查询表字段
	{
		$columns = new dbUse();
		$col=$columns->columns($table);
		return $col;
	}
	function formPost($p="")//提交信息
	{
		$devForm = new dev_form();
		return $devForm->setDevPer($p);
	}
	function tableAll($table="", $cols="", $where="")//查内容
	{
		$tab = new dbUse();
		return $tab->dbtable($table,$cols,$where);
	}
	function update($table, $id, $updateAry)
	{
		$tab = new dbUse();
		return $tab->updateUser($table, $id, $updateAry);
	}
	function dev_p()//注册个人开发者
	{
		if (the_user())
		{
			$this->pushView("shop_devper", "per", "dev_per");
		}
		else 
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}
	}
	function corporation()//注册公司开发者
	{
		if (the_user())
		{
			$this->pushView("shop_devcor", "cor", "dev_per");
		}
		else
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}
	}
	function uploadGame()//上传游戏
	{
		if (the_user())
		{
			$devTableRow = $this->tableAll("user","devloperid"," user_name='".the_user()->user_name."' ");
			$auditper = $this->tableAll("devper","*"," devid='".the_user()->user_id."' ");
			$auditcor = $this->tableAll("devcor","*"," devid='".the_user()->user_id."' ");
			$devid = db_key($devTableRow, "devloperid");
			$per = db_key($auditper, "audit");
			$cor = db_key($auditcor, "audit");
			if ($devid != "" && $devid != null)
			{
				if ($per=="0" && $cor == "0")
				{
					exit("账户先通过审核才能上传");
				}
				else 
				{
					$this->pushView("shop_applist", "up", "dev_per");
				}
			}
			else
			{
				exit("请先注册成为开发者");
			}
		}
		else
		{
			$this->isAdmin=false;
	        $this->setViewName("login2");
		}	
	}
	function pushView($dbTable,$type,$view)
	{
		$db = $this->columsTable($dbTable);
		$this->addObject("tbSet", $db);
		$this->addObject("did", $type);
		$this->isAdmin=true;
		$this->setViewName($view);
	}
	function form()//表单提交
	{
		$devuser = the_user();
		if ($_POST)
		{
			$did = $_POST['did'];
			$devid = $devuser->user_id;
			if ($devid)
			{
				$devf = new dev_form();
				if ($did=="per")//注册个人开发者
				{
					$devTableRow = $this->tableAll("devper","*"," devid='".$devid."' ");
					if (count($devTableRow)>0)
					{
						exit("0");
					}
					else
					{
						$ret=$devf->setDevPer($_POST, $devuser);
						//更新user表
						$updateAry = array("devloperid"=>$ret);
						$this->update("user", $devid, $updateAry);
						exit($ret);
					}
				}
				else if ($did=="cor")//注册企业开发者
				{
					$devTableRow = $this->tableAll("devcor","*"," devid='".$devid."' ");
					if (count($devTableRow)>0)
					{
						exit("0");
					}
					else
					{
						$ret=$devf->setDevcorporation($_POST, $devuser);
						$updateAry = array("devloperid"=>$ret);
						$this->update("user", $devid, $updateAry);
						exit($ret);
					}
				}
				else if ($did=="up")//上传游戏
				{
					$qu=queryRow("applist", "*", " appname='".$_POST["appname"]."' and game_type='".$_POST["game_type"]."' ");
					if (count($qu)>0)
					{
						foreach ($qu as $r)
						{
							if ($r["userid"] == $devid)
							{
							    $upary = array(
							        "game_type"=>GET("game_type","post"),
							        "appname"=>GET("appname","post"),
							        "initial_az"=>GET("szm","post"),
							        "icon480"=>GET("icon480","post"),
				                    "icon720"=>GET("icon720","post"),
				                    "icon1080"=>GET("icon1080","post"),
				                    "icon1440"=>GET("icon1440","post"),
							        "keyword"=>GET("keyword","post"),
							    );
							    update("applist", $r["id"], $upary);
							    deleteImage($r["icon720"]);
								//更新
								exit("更新成功");
							}
							else 
							{
							    $filename = $_POST['icon720'];
							    deleteImage($filename);
								exit("该应用名称已存在");
							}
						}
					}
					else
					{
						$ret=$devf->setUpLoadGame($_POST, $devuser);
						exit($ret);
					}
				}
			}
			else 
			{
				$this->isAdmin=false;
	            $this->setViewName("login2");
			}
		}
	}
	
}