<!DOCTYPE html>
<html>
<head>
<title>爱游商店|游戏信息发布网|玩游戏|找代练|找陪练|彩票计算</title>
<meta name="keywords" content="爱游商店|爱游|商店|游戏信息发布网站|游戏买卖信息发布|手游交易|游戏资讯|装备交易|帐号交易|游戏币交易|游戏代练|游戏创业" />
<meta name="description" content="爱游商店是超新星科技推出一款服务大众游戏玩家、开发者、游戏创业者的服务平台，提供游戏信息发布、交易，装备交易，玩家买卖游戏，游戏代练入驻接单，兼职交易客服等。专注游戏及周边服务的平台" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="image/x-icon" rel="shortcut icon" href="uploadimg/iconimg/favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="MVC/V/v1/css/ly.css" rel="stylesheet" />
<script src="MVC/V/v1/js/jq.js" type="text/javascript"></script>
<link href="MVC/V/v1/css/bootstrap.css" rel="stylesheet" />
<script src="MVC/V/v1/js/bootstrap.js" type="text/javascript"></script>
<link href="MVC/V/v1/css/showDialog.css" rel="stylesheet" />
<script src="MVC/V/v1/js/showDialog.js" type="text/javascript"></script>
<link href="MVC/V/v1/css/bootstrapValidator.min.css" rel="stylesheet" />
<script src="MVC/V/v1/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script src="MVC/V/v1/js/yz.js"></script>
<script type="text/javascript" charset="utf-8" src="MVC/V/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="MVC/V/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="MVC/V/ueditor/lang/zh-cn/zh-cn.js"></script>
<link rel="stylesheet" href="MVC/V/ueditor/themes/default/css/ueditor.css"> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php if(!$hideTop):?>
	<div class="container">
	<div id="mt" class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<div id="header">
						<div class="logo">
							<img class="prodimg"  data-toggle="popover" data-trigger="click" title="爱游商店" data-content="最全的网游服务平台" alt="121x75" src="uploadimg/userimg/icon_logo2.jpg"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">切换导航</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php?control=indexC&action=getIndexC">爱游-首页</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					    <li>
							<a href="index.php?control=gameC&action=gameListView&zm=A&type=syl" target="_blank">手游列表</a>
						</li>
						<li>
							<a href="index.php?control=gameC&action=gameListView&type=dy" target="_blank">端游列表</a>
						</li>
						<li>
							<a href="index.php?control=sell_query&action=setGame_sell" target="_blank">游戏商品</a>
						</li>
						<li>
							<a href="index.php?control=gameC&action=selectSellGame" target="_blank">发布商品</a>
						</li>
						<li>
							<a href="index.php?control=addDB&action=sellGameZD" target="_blank">快速发布</a>
						</li>
						
					</ul>
					<?php 

					//<a href="index.php?control=caipiaoC&action=cpTypeList" arget="_blank">彩票计算</a>
		
					?>
					<ul class="nav navbar-nav navbar-right">
					<?php 
					       $getUser = the_user();
					?>
					<?php if ($getUser):?>
    					<li class="dropdown">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $getUser->user_name ?><strong class="caret"></strong></a>
    							<ul class="dropdown-menu">
    								
    								<li>
    									<a href="index.php?control=buyC&action=shop_record">我的商品</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href='index.php?control=essayfileC&action=newFile&gname=&gid=00'>发布文章</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href='index.php?control=auditC&action=gameDailian'>游戏代练</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href='index.php?control=addDB&action=accountShareView'>共享出租</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="index.php?control=manage&action=userdate">个人资料</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="index.php?control=manage&action=addusers&type=names">实名认证</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="index.php?control=manage&action=addusers&type=phone">添加手机</a>
    								</li>
    								<li class="divider">
    								</li>
    								<li>
    									<a href="index.php?control=manage&action=addusers&type=email">添加邮箱</a>
    								</li>
    								
    							</ul>
    						</li>
    					<?php 
// 						<li>
// 							<a href="index.php?control=indexC&action=userCenter"><php echo $getUser->user_name ></a>
// 						</li>
						?>
						<li>
							<a href="index.php?control=member&action=unlogin">退出</a>
						</li>
					<?php else :?>
						<li>
							<a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' >登陆</a>
						</li>
						<li>
							<a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=logon", 380);'>注册</a>
						</li>
					<?php endif;?>
					</ul>
					
				</div>
				
			</nav>
		</div>
	</div>
</div>
<?php endif;?>
