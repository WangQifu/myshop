<?php
    require 'tplfunc.php';
    include_once 'MVC/M/foreach_m.php';
    include_once 'MVC/M/dbUpDate.php';
    include_once 'MVC/M/dbQuery.php';
    include_once 'MVC/M/addDBDate.php';
    include_once 'MVC/M/caipiaoTool.php';
    include_once 'MVC/M/buyM.php';
    
    $foreach_id=array();
    function foreach_callback($match)
    {
        $id=md5(uniqid());
        global $foreach_id;
        $foreach_id[] = $id;//
        return "{".$match[1].":".$match[2].":".$id;
    }
    
    class _Main
    {
        var $_viewName="index";
        var $_objectList=array();//变量数组
        var $_objectList2=array();//变量数组
        var $_cacheTime=0;//假设是0 的话 没有缓存处理
        var $isFileCache=false;//是否保存文件缓存
        var $isAdmin=false;//是否是后台管理
        var $viewP="";
        function setCacheEnabled($cachetime=60)
        {
            if ($cachetime>0)
            {
                $this->_cacheTime=$cachetime;//
            }
        }
        function inCache()//
        {
            if (get_cache($this->_viewName))
            {
                return true;
            }
            return false;
        }
        function addObject($objName, $objValue)
        {
            $this->_objectList[$objName]= $objValue;
        }
        function setViewName($vname){
            //指定页面
            $this->_viewName=$vname;
        }
        
        function run(){
        	
//                 if($this->_cacheTime>0)  //代表要从缓存里面获取内容
//                 {
//                     $getVars=get_cache($this->_viewName);
//                     if($getVars)
//                     {
//                         $this->_objectList=$getVars;
//                         extract($getVars);
//                     }
//                     else{
//                         echo "添加缓存";
//                         set_cache($this->_viewName, $this->_objectList, $this->_cacheTime);
//                         extract($this->_objectList);
//                     }
//                 }
//                 else
//                 {
//                     extract($this->_objectList);//.解包变量
//                 }
				extract($this->_objectList);//.解包变量
                
                ob_start();
                
                $viewPath=Current_ViewPath;
                if($this->isAdmin) $viewPath=Current_ViewPath_Admin;
                if ($this->viewP != "") 
                {
                	$viewPath = $this->viewP;
                	$viewName = ($this->_viewName);
                	include("MVC/V/".$viewPath."/".$viewName.".php"); //加载业务模板
                	
                }else 
                {
                	include("MVC/V/".$viewPath."/head.php");//加载头模板
                	$viewName = ($this->_viewName);
                	include("MVC/V/".$viewPath."/".$viewName.".php"); //加载业务模板
                	include("MVC/V/".$viewPath."/footer.php");//加载尾模板
                }
                
                $getCnt=ob_get_contents();
                ob_clean();
                
                if ($this->isFileCache)
                {
//                     $fileName=md5($_SERVER["REQUEST_URI"]);
//                     if (file_exists(Cache_Path.$fileName))
//                     {
//                         echo "使用缓存";
//                         include (Cache_Path.$fileName);
//                     }else {//开始缓存
//                         $getCnt=$this->genTpl($getCnt);
//                         file_put_contents(Cache_Path.$fileName, $getCnt);
//                         echo $getCnt;
//                     }
                    echo $this->genTpl($getCnt);
                }
                else 
                {
                    echo $this->genTpl($getCnt);
                }
  
        }
        
        function genTpl($getCnt) //解析最终模板
        {
        	$getCnt=$this->genInclude($getCnt);//解析include 方法
        	
        	$getCnt=$this->genForeach($getCnt);//首先解析循环
        	
        	$getCnt=$this->genSimpleVars($getCnt);//然后解析简单变量
        	return $getCnt;
        }
        
        function genInclude($getCnt)//解析include方法
        {
            $pattern="/{include\s+\"([\w\.]{1,30})\"\s*}/is";
            
            if (preg_match_all($pattern, $getCnt, $result))
            {
                $result=$result[1];
   
                foreach ($result as $r)
                {
          
                    if (file_exists(Include_Path.$r))
                    {
                        $getFile=file_get_contents(Include_Path.$r);
                        $getCnt=preg_replace("/{include\s+\"".$r."\"\s*}/is", $getFile, $getCnt);
                    }
                }
            }
            return $getCnt;
        }
        
        function genForeach($tplCnt)
        {
            global $foreach_id;

            $tplCnt = preg_replace_callback("/{(foreach):([a-zA-Z]{1,30})/is", "foreach_callback", $tplCnt);//替换函数foreach_callbak唯一id
    
            foreach ($foreach_id as $fid)
            {
                
                if (preg_match_all("/{foreach:(?<varObject>[a-zA-Z]{1,30}?):".$fid."\s+name=\"(?<varName>\w{1,30}?)\"}/is", $tplCnt, $result))
                {
                    $finalResult="";
                    $varObject = $result["varObject"][0];
                    $varName = $result["varName"][0];

                    if (array_key_exists($varObject, $this->_objectList))
                    {
                        $pattern="/{foreach:".$varObject.":"
                            .$fid."\s+.*?}(?<replaceCnt>.*?){\/endforeach}/is";
                            preg_match($pattern, $tplCnt,$cntReuslt);       
                            $cntReuslt=$cntReuslt["replaceCnt"];//需要被替换的内容
                        foreach ($this->_objectList[$varObject] as $row)
                        {
                            $tmp = $this->replaceForeachVar($cntReuslt, $varName, $row);
                            $finalResult.=$tmp;
                        } 
                      }
                      //替换最终的某个 foreach的值
                    $tplCnt=preg_replace('/{foreach:'.$varObject.':'
                        .$fid.'\s+.*?}.*?{\/endforeach}/is', $finalResult, $tplCnt);
                     
                    }
                }
                return $tplCnt;
        }
      
        function replaceForeachVar($cnt, $varName, $row)
        {

            //替换循环 内部内容
            //这里面原先写法是一个bug,无法解析多个参数的函数,先已改正
            if(preg_match_all("/{(.*?)}/is", $cnt,$result)) //首先取出{} 里面的内容
		{
			 $result=$result[1]; 
			 
			 foreach($result as $r)
			 {
			     
			 	//分别根据{}里面的内容 获取 变量值 如 user.username ,注意:取的是uername ,user是$varName,是已知的
			 	if(!preg_match_all("/".$varName."\.(?<varValue>\w{1,30})/is",$r,$varResult)) continue;
				$varList=$varResult["varValue"];
				if(count($varList)==1 && $varName.".".$varList[0]==trim($r))  //代表没有函数
				{
					$varValue=$varList[0];//没函数 只会有一个变量
					if($row[$varValue])
					{
						$cnt=preg_replace("/{".$varName."\.".$varValue."}/is",
				 $row[$varValue], $cnt);
					}
				}
				else{//代表有函数
				  $newr=$r;
				  foreach($varList as $varValue) //有函数的情况下要循环 里面的所有变量
				  {
				  	if(!$row[$varValue]) continue;
					$newr=preg_replace("/".$varName."\.".$varValue."/is",
					 $row[$varValue], $newr);
				  }
				  
					eval('$last='.$newr.";");
					if($last){
						$cnt=str_replace("{".$r."}",$last, $cnt);
					}
				}
			 }
		}
		return $cnt;
		
        }
        
	function genSimpleVars($tplCnt)//解析简单变量
	{
		if(preg_match_all("/{(?<varObject0>[^\{]*?\((?<varObject1>\w{1,30})\)[^\}]*?)}|\{(?<varObject2>\w{1,30})\}/is", $tplCnt,$result))
		{
		 
			$varObject0=$result["varObject0"];
			 $varObject1=$result["varObject1"];
			 $varObject2=$result["varObject2"];
			 
			$result=$result[0];
			 foreach($result as $r)
			 {
			 	$var0=current($varObject0);
			    $var1=current($varObject1);
				$var2=current($varObject2);
				$getVar=$var1==""?$var2:$var1;
				if($getVar=="") $getVar=$var0;
			 
				if("{".$getVar."}"==$r)
				{
				
					if(array_key_exists($getVar, $this->_objectList))
					{
						$tplCnt=preg_replace("/".$r."/is", $this->_objectList[$getVar], $tplCnt);
						
					}
				}
				else
					{
						if(array_key_exists($getVar, $this->_objectList))
						{
							$newr=str_replace($getVar,$this->_objectList[$getVar],$r);
						    $newr=str_replace(array("{","}"),"",$newr);
							eval('$lasts='.$newr.";");
							if($lasts)
							{
								$tplCnt=str_replace($r,$lasts,$tplCnt);
							}
						}
					}
			 	next($varObject0);
				next($varObject1);
				next($varObject2);
			 }
			 return  $tplCnt;
		}
		else
			return $tplCnt;
		
	}
	
	
    }
    
    
?>