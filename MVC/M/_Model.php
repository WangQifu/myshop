<?php

 class _Model
 {
 	var $_modelName="";
	var $_db=false;
	var $_result=false;
	var $_dsn;
 	function _Model($mName, $dsn=DB_DSN)
	{
	    $this->_dsn=$dsn;
	    //echo $dsn;
		//$mName 暂时代表 数据表名  譬如 传入 user ，不用加前缀
     	if($dsn==DB_DSN)
     	{
    		  $this->_modelName=DB_Prefix."_".$mName; // user=> shop_user
     	}
    	else
    	{
    		   $this->_modelName=$mName;
    	}
    		$this->modelInit();//初始化NotOrm  这一步是必须的
    		
	}
	function modelInit()//初始化链接数据库
	{
	load_lib("DB","NotORM");
		//m的初始化 
		$structure = new NotORM_Structure_Convention(
		    $primary = 'id',  //这里告诉notorm 我们的主键都是id 这种英文单词
		    $foreign = '%sid',  //同理，外键都是 外表名+id    这个很重要，否则notorm拼接sql的时候会拼错。
		    $table = '%s',
		    $prefix =''
		);
		
		$pdo = new PDO($this->_dsn,DB_User,DB_UserPass);
		$pdo->query("set names utf8");
		$this->_db=new NotORM($pdo,$structure);//初始化
	} 
	function loadall($cols="",$where="",$order="",$limit="") //加载表
	{

        $tbName=$this->_modelName;//表名
        if($cols=="")
        {
            $this->_result=$this->_db->$tbName();
        }
        else
        {
            $this->_result=$this->_db->$tbName()->select($cols)->where($where);
        }
        if($order!="")
            $this->_result=$this->result->order($order);
        if($limit!="")
            $this->_result=$this->result->limit($limit);
		
	}
	
	function insert($array)//插入数据
	{
	    return $this->_db->$tbName()->insert($array);
	}
	function update($array)//更新数据
	{
	    return $this->_db->$tbName()->update($array);
	}
	function delete($where)//删除
	{
	    $re= $this->_db->$tbName()->where($where);//
	    return  $re->delete();
	}
	function load($where) //加载 ，只会加载一条
	{
		$tbName=$this->_modelName;//表名
		if(trim($where) == "")
		{
			return false;//禁止程序员 没有任何条件的 加载全表
		}
		else 
		{
			$this->_result=$this->_db->$tbName()->select(" * ")->where($where);
		}
		
	}
	function __get($pname)
	{
		 
	  if($this->_result && count($this->_result)==1   )
	  {
	   
	  	$ret=$this->_result[1];//取第一行   bug fetch()方法 是取下一行
	  
	  	  if($ret[$pname])
		  {
		  		 
		  	return $ret[$pname];
		  }
		  return false;
		 
	  }
	  return false;
	}
	function all()
	{
		return 	$this->_result;
	}
 }

?>