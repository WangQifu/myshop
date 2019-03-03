<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
    	   <div class="row clearfix">
    		<div class="col-sm-9 col-md-9 column">
    		  <div class="carousel slide" id="carousel-322689">
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#carousel-322689">
							</li>
							<li data-slide-to="1" data-target="#carousel-322689">
							</li>							
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img alt="爱游商店" src="uploadimg/1.jpg" title="爱游商店|游戏资讯" />
								<div class="carousel-caption">
									<h4>
										爱游商店,招募游戏创业者
									</h4>
									<p>
										爱游商店招募游戏创业者,游戏交易介入客服,游戏代练入驻,合作共赢
									</p>
								</div>
							</div>
							<div class="item">
								<img alt="爱游商店,游戏交易" src="uploadimg/2.jpg" title="爱游商店|游戏交易" />
								<div class="carousel-caption">
									<h4>
										全力打造最自由游戏交易平台
									</h4>
									<p>
									       自由的游戏交易更多的交易模式,买卖游戏,创业代练,一站式搞定
									</p>
								</div>
							</div>
							
						</div> <a class="left carousel-control" href="#carousel-322689" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-322689" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
    		</div>
    		<div class="col-sm-3 col-md-3 column">
        		<div class="panel panel-default">
                  <div class="panel-body">
                    <a href='index.php?control=sell_query&action=setGame_sell'  target="_blank">
    				<img alt="彩票助手" src="uploadimg/timg/wzry.jpg" class="img-thumbnail" />
    				</a>
    				<h1>爱游商店产品列表</h1>
                  </div>
                </div>
              <div id="mt" class="text-center">
              <img alt="共享游戏账号" src="uploadimg/cpimg/gxzh.jpg" class="img-rounded" width="100%"/>
              </div>
    		  
    		</div>
	       </div>
			
			<div class="row clearfix" >
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=sell_query&action=setGame_sell" class="btn btn-block btn-default" type="button">
					<span class="glyphicon glyphicon-gift" aria-hidden="true">|游戏商品</span>
					 </a>
				</div>
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=gameC&action=selectSellGame" class="btn btn-block btn-default" type="button">
					 <span class="glyphicon glyphicon-yen" aria-hidden="true">|发布出售信息</span>
					 </a>
				</div>
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=addDB&action=customGameZD" class="btn btn-block btn-default" type="button">
					 <span class="glyphicon glyphicon-pencil" aria-hidden="true">|自定义发布出售信息</span>
					 </a>
				</div>
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=addDB&action=buyGoods" class="btn btn-block btn-default" type="button">
					 <span class="glyphicon glyphicon-list-alt" aria-hidden="true">|发布收货信息</span>
					 </a>
				</div>
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=kefuC&action=queryDailian" class="btn btn-block btn-default" type="button">
					<span class="glyphicon glyphicon-search" aria-hidden="true">|代练信息</span>
					 </a>
				</div>
				<div id="mt" class="col-md-2 column">
					 <a href="index.php?control=kefuC&action=queryPeiwan" class="btn btn-block btn-default" type="button">
					 <span class="glyphicon glyphicon-search" aria-hidden="true">|陪练信息</span>
					 </a>
				</div>
			</div>
			
			<div id="mt" class="row clearfix">
        		<div class="col-sm-3 col-md-3 column">
        		<div class="guide-panel">
        		  <p>
        		      <a href="index.php?control=helplistC&action=helpbuy1" target="_blank">购买指南</a>|<a href="index.php?control=helplistC&action=helpissue1" target="_blank">发布指南</a>
        		  </p>
        		  <p>
        		      <a href="index.php?control=helplistC&action=helpwenwen&type=wen1" target="_blank">买东西要手续费</a>|<a href="index.php?control=helplistC&action=helpwenwen" target="_blank">发布手续费问题</a>
        		  </p>
        		</div>
        		<div id="mt" class="panel panel-default umsg-panel">
                  <div class="panel-heading"><span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span> 信息</div>
                  <div class="panel-body new-zx">
                  <ul>
                     <?php 
            		      foreach ($row_sh as $w)
            		      {
            		  ?>
            		  
        				<li>
        					<a href="index.php?control=sell_query&action=shougou&sid=<?php echo $w["id"];?>" target="_blank">【<?php echo $w["game_name"];?>】<?php echo $w["buy_type"]; echo "_".$w["region"]; ?></a>
        				</li>
            			<?php 
                            }
            			?>
            		</ul>
                  </div>
                </div>
        		</div>
        		<div class="col-sm-9 col-md-9 column">  
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">
					                   爱游游戏资讯
					    </h3>
					  </div>
					  <div class="panel-body message-panel">
					      <?php 
                		      foreach ($wenz as $w)
                		      {
                		  ?>
                			<div class="media well">
                				 <a href="<?php echo $w["fileurl"];?>" target="_blank" class="pull-left"><img src="<?php echo $w["image1"];?>" width="60px" class="media-object img-ratio" title="爱游商店|<?php echo $w["title"];?>" alt="爱游资讯" /></a>
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
        		</div>
        	</div>
        	<div class="row">
					<div class="col-md-3 prod">
						<div class="thumbnail">
							<a href='index.php?control=sell_query&action=setGame_sell&pid=63'>
                                <img alt="王者荣耀" src="uploadimg/timg/wzry.jpg">
                            </a>
						</div>
					</div>
					<div class="col-md-3 prod">
						<div class="thumbnail">
							<a href='index.php?control=sell_query&action=setGame_sell&pid=574'>
                                <img alt="地下城与勇士" src="uploadimg/timg/dnf.jpg">
                            </a>
						</div>
					</div>
					<div class="col-md-3 prod">
						<div class="thumbnail">
							<a href='index.php?control=sell_query&action=setGame_sell&pid=575'>
                                <img alt="魔兽世界" src="uploadimg/timg/wow.jpg">
                            </a>
						</div>
					</div>
					<div class="col-md-3 prod">
						<div class="thumbnail">
							<a href='index.php?control=sell_query&action=setGame_sell&pid=576'>
                                <img alt="影响联盟" src="uploadimg/timg/lol.jpg">
                            </a>
						</div>
					</div>
				</div>
        	
        	<?php if (count($shop)>0){?>
        	<div class="row">
        	<?php foreach ($shop as $r){?>
				<div class="col-md-4">
					<div class="thumbnail">
    					<div class="shop-box">
    					   <a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>"><img alt="爱游|<?php echo $r["game_name"];?>" src="<?php if ($r["image"]) echo $r["image"]; else echo "uploadimg/userimg/iconimgtubiao.jpg";?>" /></a>
    					</div>
						<div class="caption">
							<h3 class="line-limit-length text-center">
								<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>">【<?php echo $r["game_name"];?>】【<?php echo $r["game_account"];?>】<?php echo $r["shop_title"];?></a>
							</h3>
							<p class="row2">
								<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>"><?php echo $r["account_msg"];?></a>
							</p>
							<p>
								<span>¥<?php echo $r["price"];?></span>
							</p>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
			<?php }?>
			
			<div class="row clearfix">
        		<div class="col-md-4 column">
        			<div class="panel panel-default">
        				<div class="panel-heading">
        					<h3 class="panel-title">
        						代练信息
        					</h3>
        				</div>
        				<div class="panel-body">
        				<div class="dx-panel">
        				    <ul>
        					 <?php 
                    		      foreach ($dailian as $d)
                    		      {
                    		  ?>
                    		  <li>
                    		  <a href="index.php?control=kefuC&action=dailianMsg&did=<?php echo $d["id"];?>" target="_blank">
                    		  <?php echo "【".$d["fuwu_shijian"]."】".$d["dnick"];?>
                    		  <span>
                    		   <?php echo $d["desc_ms"];?>
                    		  </span>
                    		  </a>
                    		  </li>
                    			
                    			<?php 
                                    }
                    			?>
                            </ul>
                         </div>
        				</div>
        		
        			</div>
        		</div>
        		<div class="col-md-4 column">
        			<div class="panel panel-default">
        				<div class="panel-heading">
        					<h3 class="panel-title">
        						共享信息
        					</h3>
        				</div>
        				<div class="panel-body">
        				<div class="dx-panel">
        				    <ul>
        					<?php 
                    		      foreach ($share as $d)
                    		      {
                    		  ?>
                    		  <li>
                    		   
                    		  <a href="index.php?control=kefuC&action=shareAc&sid=<?php echo $d["id"];?>" target="_blank">
                    		  <?php echo $d["a_title"];?>
                    		  <span>
                    		   <?php echo $d["game_name"];?><?php if ($d["g_servers"])echo "【".$d["g_servers"]."】";?>
                    		  </span>
                    		  <span class="spright">
                    		  <?php if ($d["price"]>1) echo "¥ ".$d["price"]."/天";?>
                    		  <span class="label label-default"><?php if ($d["price"]<1) echo "免费";?></span>
                    		  </span>
                    		  </a>
                    		  </li>
                    		    
                    			<?php 
                                    }
                    			?>
                    			</ul>
                    		</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 column">
        			<div class="panel panel-default">
        				<div class="panel-heading">
        					<h3 class="panel-title">
        						资讯
        					</h3>
        				</div>
        				<div class="panel-body">
        				<div class="dx-panel">
        				    <ul>
        					<?php 
                		      foreach ($wenz as $w)
                		      {
                		  ?>
                		      <li>
                		      <a href="<?php echo $w["fileurl"];?>" target="_blank">
                    		    【<?php echo $w["type"];?>】<?php echo $w["title"];?>
                    		  </a>
                    		  </li>
        
                			<?php 
                                }
                			?> 
                			</ul>
                		</div>
        				</div>
        				
        			</div>
        		</div>
        	</div>
			
			<div class="tabbable" id="tabs-456274">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-36650000" data-toggle="tab">手机游戏</a>
					</li>
					<li>
						<a href="#panel-66610111" data-toggle="tab">电脑游戏</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-36650000">
					<div class="panel panel-default">
                      <div class="panel-body">
						<div class="btn-group">
				           <?php 
				               $aryAZ=alphabet_AZ();
				               foreach ($aryAZ as $zm)
				               {
				                   $zs_id = "";
				                   if ($zm == "热")
				                   {
				                       $zs_id = "1";
				                   }
				                   else 
				                   {
				                       $zs_id = $zm;
				                   }
				           ?>
                    		<a href="index.php?control=gameC&action=gameListView&zm=<?php echo $zs_id;?>&type=sy" target="_blank" class="btn btn-default" type="button"><?php echo $zm;?></a>
						
							<?php 
				               }
							?>
						    </div>
						    
						    <div class="row"  id="mt">
							<?php foreach ($viewD as $d){?>
								<div class="col-md-3 prod">
									<div class="thumbnail">
										<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>">
										<img class="prodimg img-rounded" title="爱游商店|<?php echo $d["appname"];?>" data-content="爱游商店" alt="<?php echo $d["appname"];?>" src="<?php echo $d["icon720"];?>" width="100" height="100"  />
										</a>
										<div class="caption text-center">
											<h5>
												<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>"><?php echo $d["appname"];?></a>
											</h5>
										</div>
									</div>
								</div>
								<?php 
                			         } 
								?>
							</div>
						</div>
					</div>
					</div>
					<div class="tab-pane" id="panel-66610111">
						<div class="panel panel-default">
                          <div class="panel-body">
                            <div class="btn-group">
					           <?php 
					               $aryAZ=alphabet_AZ();
					               foreach ($aryAZ as $zm)
					               {
					                   $zs_id = "";
					                   if ($zm == "热")
					                   {
					                       $zs_id = "1";
					                   }
					                   else 
					                   {
					                       $zs_id = $zm;
					                   }
					           ?>
				        
                        		<a href="index.php?control=gameC&action=gameListView&zm=<?php echo $zs_id;?>&type=dy" target="_blank" class="btn btn-default" type="button"><?php echo $zm;?></a>
							
								<?php 
					               }
								?>
							 </div>
							 <div class="row"  id="mt">
    							<?php foreach ($viewDY as $d){?>
    								<div class="col-md-3 prod">
    									<div class="thumbnail">
    										<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>">
    										<img class="prodimg img-rounded" title="爱游商店|<?php echo $d["appname"];?>" data-content="爱游商店" alt="<?php echo $d["appname"];?>" src="<?php echo $d["icon720"];?>" width="180px" height="120px"  />
    										</a>
    										<div class="caption text-center">
    											<h5>
    												<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>"><?php echo $d["appname"];?></a>
    											</h5>
    										</div>
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
<script type="text/javascript">
$('.carousel').carousel({
	  interval: 3000
})
</script>
