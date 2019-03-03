<link type="text/css" rel="stylesheet" href="MVC/V/v1/css/fileinput.min.css" />
<script type="text/javascript" src="MVC/V/v1/js/fileinput.min.js"></script>
<script type="text/javascript" src="MVC/V/v1/js/zh.js"></script>
<style>
	.prod{border:0}
	.prod li{border:0}
	.page-header{margin:0 auto;font-size:22px;font-weight: bold;}
	.price2 span{color:darkred}
	.intr{border:solid 1px #ddd;border-radius: 5px; background: #ddd;text-indent:2em;line-height: 28pt;}
</style>
<style>
	p span{color:darkred;
        font-size: 18px;
	    margin-left: 10px;
    }
    .line-limit-length {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; //文本不换行，这样超出一行的部分被截取，显示...
    }
    .row2{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    height: 42px;
    }
    .shop_titles{
    	margin-top: 10px;
    }
    .shop_row{
    	padding-top: 10px;
    }
</style>
<script>
	$(document).ready(function(){
	
			function addCartNum(pid)
			{
				$.post("index.php?control=prodC&action=addtocart&",{"pid":pid},function(result){
					$("#cartNum").html(result);
				})
			}
			
			$(".addToCart").click(function(){//添加动画
					var getPid = $(this).attr("pid");
					var oldProd=$(this).parents(".prod")
					var newProd=$(this).parents(".prod").clone();//复制品

					newProd.css({
							position:"fixed",left:$(oldProd).offset().left,top:$(oldProd).offset().top
						})
					
					$(oldProd).parent().append(newProd);
					
					newProd.animate({
							left:$(".mycart").offset().left,
 			 				top:$(".mycart").offset().top,
 			 				width:0,
 			 				height:0
						},"slow","",function(){
								$(newProd).remove();
								addCartNum(getPid);
							});
							return false;
				})
		})
</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		{foreach:game name="prod"}
			<div class="col-md-2 text-center">
				<img width="140" alt="爱游商店|{prod.appname}" src="{prod.icon720}" class="img-rounded" />
			</div>
		<div class="col-md-10">
			<ul class="list-group prod">
				<li class="list-group-item">
					<p class="page-header">{prod.appname}</p>
				</li>
				 <li class="list-group-item ">
				  <p class="intr">
				  	共有：<?php echo $num=count($row);?>件宝贝
				  </p>
				</li>
				 <li class="list-group-item ">
				  <a href="index.php?control=addDB&action=preview&rowid=4&gid={prod.id}" pid="{prod.id}" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span>我要卖</a>
				  
				  <button class="btn btn-info"><span class="glyphicon glyphicon-heart"></span>关注</button>
				   <a href="index.php?control=kefuC&action=queryDailian&gid={prod.id}" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-flash"></span>代练</a>
				</li>
			</ul>
		</div>
		
		{/endforeach}
		</div>
	</div>
	
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<div class="tabbable" id="tabs-500394">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#panel-52035" data-toggle="tab">宝贝</a>
							</li>
							<li>
								<a href="#panel-440959" data-toggle="tab">资讯/攻略</a>
							</li>
							<li>
								<a href="#panel-440959-3" data-toggle="tab">社区</a>
							</li>
							<li>
								<a href="#panel-440959-g" data-toggle="tab">共享</a>
							</li>
							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="panel-52035">
		
									<div class="row clearfix">
									<div class="col-md-12 column">
										<?php
										foreach ($row as $r)
											{
											    $gname=$r["game_name"];
										?>
										<div class="media shop_row">
											 <a href="index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>" class="pull-left"><img src="<?php if ($r["image"]) echo $r["image"]; else echo "uploadimg/userimg/iconimgtubiao.jpg";?>" width="120px" class="media-object" alt="爱游商店|<?php echo $gname;?>" /></a>
											<div class="media-body">
												<h4 class="media-heading shop_titles">
													<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' class="" pid="<?php echo $r["id"];?>" class="btn btn-default ToCart" >
													【<?php echo $gname;?>】<?php echo $r["shop_title"];?>
													</a>
												</h4>
												<p>
												    <span>¥ <?php echo $r["price"];?></span>
												</p>
											</div>
										</div>
										<p class="page-header"></p>
										<?php 
											}
										?>
									</div>
								</div>
							</div>
							
							<div class="tab-pane" id="panel-440959">
							     <div class="row clearfix">
                            		<div class="col-md-12 column">
                            		  <?php 
                            		      foreach ($wenz as $w)
                            		      {
                            		  ?>
                            			<div class="media well">
                            				 <a href="<?php echo $w["fileurl"];?>" target="_blank" class="pull-left"><img src="<?php echo $w["image1"];?>" width="60px" class="media-object" alt="爱游资讯" /></a>
                            				<div class="media-body">
                            					<h4 class="media-heading">
                            						<a href="<?php echo $w["fileurl"];?>" target="_blank">【<?php echo $w["type"];?>】<?php echo $w["title"];?></a>
                            					</h4>
                            					
                            				</div>
                            			</div>
                            			<?php 
                                            }
                            			?>
                            		</div>
                            	</div>
								<p>

								<a href='index.php?control=essayfileC&action=newFile&gname=<?php echo $gamename;?>&gid=<?php echo $gid;?>' class="btn btn-default" >发布文章</a>
								</p>
							</div>
							<div class="tab-pane" id="panel-440959-3">
							     <div class="row clearfix">
                            		<div class="col-md-12 column">
                            		  <?php 
                            		      foreach ($dongtai as $d)
                            		      {
                            		  ?>
                            			<div class="media well">
                                			<p>
                                			     <a href="#" target="_blank" class="pull-left"><img src="<?php echo $d["usericon"];?>" width="30px" class="media-object" alt="爱游资讯" /> </a><?php $new_tel3 = preg_replace('/(\d{3})\d{4}(\d{4})/', '$1****$2', $d["username"]); echo $new_tel3;?>
                                			</p>
                            				 
                            				<div class="media-body">
                            					<h4 class="media-heading">
                            						<?php echo $d["c_title"];?>
                            					</h4>
                            					<p>
                            					   <?php echo $d["c_desc"];?>
                            					</p>
                            				</div>
                            			</div>
                            			<?php 
                                            }
                            			?>
                            		</div>
                            	</div>
							<?php if (the_user()){?>
								<div class="panel panel-default" id="mt">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">发表动态</h3>
                                  </div>
                                  <div class="panel-body" >
                                    <form role="form">
                                        <input type="hidden" name="gid" id="gameid" value="<?php echo $gid;?>" />
                        				<div class="form-group">
                        					 <label for="">标题：</label><input type="text" class="form-control" id="title" name="title"/>
                        				</div>
                        				<div class="form-group">
                        					 <label for="">内容：</label><textarea class="form-control" rows="3" id="desc" name="desc"></textarea> 
                        				</div>
                        				
                        				 <button type="submit" class="btn btn-block btn-default" onclick="gamec()">发布</button>
                        			</form>
                                  </div>
                                </div>
                                <?php }else {?>
                                <a href="#" class="btn btn-block btn-success" type="button" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' >登陆发表</a>
                                <?php }?>
							</div>
							<div class="tab-pane" id="panel-440959-g">
							     <div class="row clearfix">
                            		<div class="col-md-12 column">
                            		  <?php 
                            		      foreach ($share as $d)
                            		      {
                            		  ?>
                            		    <div class="panel panel-default">
                                          <div class="panel-heading"><span class="label label-default"><?php if ($d["price"]<1) echo "免费";?></span> <?php echo $d["a_title"];?></div>
                                          <div class="panel-body">
                                                <p>
                            					    <?php echo $d["game_name"];?><?php if ($d["g_servers"])echo "【".$d["g_servers"]."】";?>
                            					</p>
                            	
                            					<div class="well">
                            					<?php echo $d["desc_ribe"];?>
                            					</div>
                            					<p>
                                                    <?php if ($d["price"]>1) echo "¥ ".$d["price"]."/天";?>
                            					</p>
                                          </div>
                                          <div class="panel-footer">
                                          <?php if (!the_user()){?>
                                            <a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' class="btn btn-block" type="button">登录才能申请使用</a>
                                            <?php 
                                            }
                                            else 
                                            {
                                            ?>
                                            <a href="index.php?control=query_c&action=share_account&sid=<?php echo $d["id"];?>" class="btn btn-block" type="button">申请使用</a>
                                            <?php }?>
                                          </div>
                                        </div>
                            			
                            			<?php 
                                            }
                            			?>
                            		</div>
                            	</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function gamec()
{
//ajx方式提交
	$.post("index.php?control=addDB&action=gameCommunity", {"title":$("#title").val(),
		"desc":$("#desc").val(),"gid":$("#gameid").val() }, function(result){
			//alert(result);
			self.location.reload();//刷新当前页面
		})
}
</script>
