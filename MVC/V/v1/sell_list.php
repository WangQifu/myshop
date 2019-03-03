<?php
//我要买页面
?>
<style>
   .thumbnail a img
   {
   	width:255px;
	height:155px;
	width:expression(document.body.clientWidth>600?"600px":"auto"); 
    overflow:hidden; 
   }
	p span{color:darkred;
        font-size: 18px;
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
</style>
<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
			<div class="tabbable" id="tabs-71005">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-baobei" data-toggle="tab">商品信息</a>
					</li>
					<li>
						<a href="#panel-shouhuo" data-toggle="tab">收购信息</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-baobei">
						<div class="row clearfix">
                    		<div class="col-md-12 column">
                    			<div class="row">
                    			 <?php
                    			foreach ($row as $r)
                    				{
                    			?>
                    				<div class="col-md-3">
                    					<div class="thumbnail">
                    						<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>"><img alt="爱游|<?php echo $r["game_name"];?>" src="<?php if ($r["image"]) echo $r["image"]; else echo "uploadimg/userimg/iconimgtubiao.jpg";?>" height="150"/></a>
                    						<div class="caption">
                    							<h5 class="line-limit-length text-center">
                    								<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>">【<?php echo $r["game_name"];?>】【<?php echo $r["game_account"];?>】<?php echo $r["shop_title"];?></a>
                    							</h5>
                    							<p class="row2">
                    								<a href='index.php?control=sell_query&action=sell_msgV&gid=<?php echo $r["id"];?>' pid="<?php echo $r["id"];?>"><?php echo $r["account_msg"];?></a>
                    							</p>
                    							<p>
                    								<span>¥<?php echo $r["price"];?></span>
                    							</p>
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
					<div class="tab-pane" id="panel-shouhuo">
						<div class="row clearfix">
                    		<div class="col-md-12 column">
                    		  <?php 
                    		      foreach ($row_sh as $w)
                    		      {
                    		  ?>
                    			<div class="media well">
                    				<div class="media-body">
                    					<h4 class="media-heading">
                    						<a href="index.php?control=sell_query&action=shougou&sid=<?php echo $w["id"];?>" target="_blank">【<?php echo $w["game_name"];?>】<?php echo $w["buy_type"]; echo "_".$w["region"]; ?></a>
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
			</div>
		</div>
	</div>
</div>