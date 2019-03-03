<?php 
//<a href="index.php?control=m_index&action=store_action">我的店铺</a>
//<a href="index.php?control=addDB&action=addgame">添加游戏</a>
//<a href="index.php?control=addDB&action=gamelistview">游戏信息设置</a>
//index.php?control=auditC&action=audit_m;审核
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
    	   
		</div>
		<div class="col-sm-3 col-md-3 column">

    			<div class="text-center"><img alt="140x140" src="<?php echo the_user()->user_image;?>" class="img-circle img-thumbnail" width="80"/></div>
    			<h3 class="text-danger text-center">
    				<?php echo the_user()->user_name;?>
    			</h3>

			<div class="list-group">
				 <a href="#" class="list-group-item active">个人中心</a>
                <div class="list-group-item">
					<a href="index.php?control=manage&action=userdate">个人资料</a>
				</div>
				<div class="list-group-item">
					<a href="index.php?control=manage&action=addusers&type=names">实名认证</a>
				</div>
				<div class="list-group-item">
					<a href="index.php?control=manage&action=addusers&type=phone">添加手机</a>
				</div>
				<div class="list-group-item">
					<a href="index.php?control=manage&action=addusers&type=email">添加邮箱</a>
				</div>
				<div class="list-group-item">
					<a href='index.php?control=essayfileC&action=newFile&gname=&gid=00'>发布文章</a>
				</div>
				<div class="list-group-item">
					<a href='index.php?control=auditC&action=gameKefu'>交易客服</a>
				</div>
				<div class="list-group-item">
					<a href='index.php?control=auditC&action=gameDailian'>成为代练</a>
				</div>
				<div class="list-group-item">
					<a href='index.php?control=addDB&action=accountShareView'>共享出租</a>
				</div>
				<a class="list-group-item active"></a>
				
			</div>
			
		</div>
		<div class="col-sm-9 col-md-9 column">
			<div class="panel panel-default">
    				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>我是买家</div>
    				  <div class="panel-body">
    				     <div class="row">
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_topay.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=pay_await">待确认</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_tosend.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=shipments&fid=0">待交易</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
								    <div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_tosend.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=shipments&fid=1">待收货</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_deal.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=sell_query&action=record">购买历史</a>
											</h5>
										</div>
									</div>
								</div>
							</div>
    				  </div>
    		</div>
    		
    		<div class="panel panel-default">
    				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>我是卖家</div>
    				  <div class="panel-body">
    				        <div class="row">
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_daishenhe.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=audit_c">待审核</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_tosend.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=shipments_seller">待发货</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
								    <div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_quanbushangpin.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=buyC&action=shop_record">我的商品</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<img class="prodimg"  data-toggle="popover" data-trigger="click" title="" data-content="" alt="200x200" src="uploadimg/iconimg/icon_member_miaoshou.png" width="60"  />
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=dealC&action=kefuDeal">待处理</a>
											</h5>
										</div>
									</div>
								</div>
							</div>
    				  </div>
    		</div>
		</div>
	</div>
</div>