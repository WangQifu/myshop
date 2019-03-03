<?php
class dbUse
{
	
	function dbtable($table="", $cols="", $where="")
	{
		$m = load_model($table);//加载用户表
		$m->loadall($cols, $where);
		return $m->all();
	}
	
	function columns($tablename="")
	{
		//通过系统columns查询shop_prod表字段
		$cols=load_model("columns",DB_SysDSN);//加载系统数据库MySql
		
		$cols->loadall(" * ","TABLE_NAME='$tablename' and  EXTRA!='auto_increment' ");//查询系统数据库字段MySql
		
		return $cols->all();
		
	}
	
	function updateUser($table,$id,$updateAry)
	{
		$user_up = load_model($table);
		$tableName="shop_".$table;
		$ret_up = $user_up->_db->$tableName()->where('id',$id)->update($updateAry);
		if ($ret_up)
		{
			return exit($ret_up);
		}	
		
		return "0";
	}
	
	function dbTableLimit($tabName, $where,$page,$pagesize)
	{
		$prod=load_model($tabName);
		$shopName="shop_".$tabName;
		$ret=$prod->_db->shop_devper()->select('*');//这一行 是写死的
		$ret=$ret->where($where)->order("id desc")->limit($pagesize,($page-1)*$pagesize);
		return $ret;
	}
}
