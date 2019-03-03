<?php
    include 'my.conf';
    require 'Common/funtions.php';//加载全站 函数文件
    require 'MVC/C/_Main.php';//加载control主文件
    require 'MVC/M/_Model.php';//加载Model主文件
    $get_control=isset($_GET["control"])?trim($_GET["control"]):"indexC";
    $get_action=isset($_GET["action"])?trim($_GET["action"]):"getIndexC";
    $admin_user=the_user();//测试后台用户名
    //var_export( "用户名".$admin_user);
    $admin_role=array("editor","admin");//测试后台用户角色
    if (file_exists("MVC/C/".$get_control.".php"))//$get_control.php
    {
        
        require 'MVC/C/'.$get_control.'.php';
        $control = new $get_control();
        $aysd = "0";
        if (method_exists($control, $get_action))//检查类的方法是否存在
        {
            $getClass=new ReflectionClass($control);//获取该方法的注释
            $getMethod=$getClass->getMethod($get_action);//获取该方法的注释
            if ($getMethod)
            {
                $comments=$getMethod->getDocComment();//获取该方法的注释
                
                if (preg_match("/permission:{(.*?)}/i", $comments,$match_result))
                {
                    $pemission=$match_result[1];
                    $pemission=json_decode("{".$pemission."}");
                    if ($admin_user != "" && $admin_user != null)
                    {
                    	if (in_array($pemission->role, $admin_role))
                    	{
                    		$control->$get_action();//加载需要跳转的页面
                    		$control->run();//ִ运行_Main
                    	}
                        
                    }else 
                    {
                        exit("你没有该权限");
                    }
                   
                }
                else 
                {
                    $control->$get_action();//加载需要跳转的页面
                    $control->run();//ִ运行_Main
                }
                
            }
            else 
            {
                $aysd = "1";
                exit("找不到该页面");
            }
            
        }
    }else {
        $aysd = "1";
        exit ("找不到该页面");
    }
  
 ?>
 <?php if ($aysd=="1"){?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="爱游商店，爱游，国内最全，最自由网络游戏交易及信息发布平台，提供手游交易、装备交易、游戏帐号交易、游戏币交易、游戏金币交易、点卡、游戏点券交易、游戏元宝交易、各类激活码交易、游戏材料交易、游戏宠物交易、游戏道具交易以及专业的代练服务，是国内最安全、最权威、服务最完善的网络游戏交易平台" />
<meta name="keywords" content="爱游商店，爱游，网络游戏交易及信息发布平台、手游交易平台、游戏资讯平台、装备交易平台、帐号交易平台、游戏币交易平台、游戏代练" />
<title>爱游商店-首页</title>
</head>
<body>
  <div>
欢迎进入爱游商店
爱游商店：打造全国最全，资料最详细，集合只有问答社区互动及游戏交易为主的游戏社交服务品台
</div>
</body>
</html>
<?php }?>