<?php
include_once (dirname(dirname(dirname(__FILE__)))."/MVC/M/addDBDate.php");;
include_once (dirname(dirname(dirname(__FILE__)))."/my.conf");
include_once (dirname(dirname(dirname(__FILE__))).'/Common/funtions.php');//加载全站 函数文件
include_once (dirname(dirname(dirname(__FILE__))).'/MVC/M/_Model.php');//加载Model主文件

$code_msg=$_POST["msg"];
//匹配出图片
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]|\.png))[\'|\"].*?[\/]?>/";//2
$res = preg_match($pattern, $code_msg, $img);
$imgsrc = $img[1];
//
$head = '<!DOCTYPE html>
         <html>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <head>';
$description = '<meta name="description" content="爱游商店|爱游|商店|国内最自由的网络游戏交易及信息发布平台|提供手游交易|装备交易|游戏帐号交易|'.$_POST["key"].'" />';
$keywords = '<meta name="keywords" content="爱游商店|爱游|商店|网络游戏交易|游戏信息发布|手游交易|游戏资讯|装备交易|帐号交易|游戏币交易|游戏代练|游戏创业|'.$_POST["key"].'" />';
$title = "<title>".$_POST["title"]."|爱游商店|网络游戏交易平台|手游交易|游戏信息发布</title>";
$jsf ='<link href="http://www.iyoustore.com/MVC/V/v1/css/ly.css" rel="stylesheet" />
<script src="http://www.iyoustore.com/MVC/V/v1/js/jq.js"></script>
<link href="http://www.iyoustore.com/MVC/V/v1/css/bootstrap.css" rel="stylesheet" />
<script src="http://www.iyoustore.com/MVC/V/v1/js/bootstrap.js"></script>
<link href="http://www.iyoustore.com/MVC/V/v1/css/showDialog.css" rel="stylesheet" />
<script src="http://www.iyoustore.com/MVC/V/v1/js/showDialog.js"></script>
<link href="http://www.iyoustore.com/MVC/V/v1/css/bootstrapValidator.min.css" rel="stylesheet" />
<script src="http://www.iyoustore.com/MVC/V/v1/js/bootstrapValidator.min.js"></script>';
$body = "</head><body>";
$navhead = '<div class="container">
	<div id="mt" class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-sm-3 col-md-3 column">
					<div id="header">
						<div class="topAD">
						</div>
						<div class="logo">
							<img class="prodimg"  data-toggle="popover" data-trigger="click" title="爱游商店" data-content="最全的网游服务平台" alt="200x200" src="http://www.iyoustore.com/uploadimg/iconimg/icon_logo_aysd.png" width="80"  />
						</div>
					</div>
					
				</div>
				<div class="col-sm-9 col-md-9 column">
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">切换导航</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="http://www.iyoustore.com/index.php?control=indexC&action=getIndexC">首页</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://www.iyoustore.com/index.php?control=sell_query&action=setGame_sell" target="_blank">游戏商品</a>
						</li>
						<li>
							<a href="http://www.iyoustore.com/index.php?control=gameC&action=selectSellGame" target="_blank">发布商品</a>
						</li>
						<li>
							<a href="http://www.iyoustore.com/index.php?control=addDB&action=sellGameZD" target="_blank">快速发布</a>
						</li>
                        <li>
							<a href="http://www.iyoustore.com/index.php?control=caipiaoC&action=cpTypeList" target="_blank">彩票开奖</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

    <div class="row clearfix">
		<div class="col-md-12 column">
			<p>
				
			';
$foot = '</p>
		</div>
        </div>
    </div>
    
    <div class="container">
	    <div class="row clearfix">
		<div class="col-md-12 column">
			<div id="footer">
				<div class="footerNav">
					 
				</div>
				<div class="copyRight">
					Copyright ©2018 超新星科技 爱游商店 版权所有 <a href="http://www.miitbeian.gov.cn/">黔ICP备17009525号</a>
				</div>
			</div>
    	</div>
    	</div>
    </div>
    
    </body>
</html>';
//拼接内容
$ht = $head.$title.$description.$keywords.$jsf.$body.$navhead.$code_msg.$foot;
//6随机数
$ychar="0,1,2,3,4,5,6,7,8,9";
$list=explode(",",$ychar);
for($i=0;$i<6;$i++){
    $randnum=rand(0,9);
    $authnum.=$list[$randnum];
}
$tdn = date('Ymdhis');
$filename = $tdn.$authnum.".html";
$fileMsg = "";
    if (($TxtRes = fopen($filename, 'w+'))===FALSE)
    {
        $fileMsg = "00";//创建文件失败
        exit();
    }
    $fileMsg = "11";//创建成功！
    if (!fwrite($TxtRes, $ht))//将信息写入文件
    {
        $fileMsg = "01";//尝试写入失败
        
        fclose($TxtRes);
        exit();
    }
    $fileMsg = "12";//发表成功
    fclose($TxtRes);
//     $file=fopen($filename, "x");
//     fputs($file, $code_msg);
//     fclose($file);
    $array=array(
        "gameid"=>$_POST["gid"],
        "type"=>$_POST["type"],
        "title"=>$_POST["name"]."|".$_POST["title"],
        "image1"=>$imgsrc,
        "image2"=>"",
        "image3"=>"",
        "timer"=>the_time(""),
        "usersid"=>the_user()->user_id,
        "username"=>the_user()->user_name,
        "fileurl"=>"ueup/newfile/".$filename,
        "audit"=>"待审核"
    );
    $ret=addTableRow("essay", $array);
$data='{msg:"'.$fileMsg.'"}';//组合成json格式数据
//echo json_encode($data);//输出json数据
if ($ret) {
    echo "发布成功";
}


    
    