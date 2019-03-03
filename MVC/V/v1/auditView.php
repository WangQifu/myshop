<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="tabbable" id="tabs-871970">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-530188" data-toggle="tab">待审核</a>
					</li>
					<li>
						<a href="#panel-419270" data-toggle="tab">审核成功</a>
					</li>
					<li>
						<a href="#panel-419271" data-toggle="tab">审核失败</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-530188">
					       <?php 
                    		  foreach ($setRet as $tb)
                    		  {
                    		?>
                    				<div class="media shop_row">
                    				  <img src="<?php echo $tb["image"];?>" width="120px" class="media-object" alt="爱游商店" />
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo $tb["game_name"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_account"]."|";
                    					echo $tb["game_deal_type"]."|";
                    					echo $tb["client"]."|";
                    					echo $tb["region"];
                    					?>
                    					</h4>
                    					<p><?php echo $tb["shop_title"];?></p>
                    					<p><?php 
                    					if ($tb["account_msg"])
                    					{
                    					    echo $tb["account_msg"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    					<p>
                    					    <span><?php echo $tb["audit"];?></span>
                    					</p>
                    				</div>
                    			</div>
                    			<p class="page-header"></p>
                    		<?php 
                    		  }
                    		?>
                    		
                    		 <?php 
                    		  foreach ($setSH as $tb)
                    		  {
                    		?>
                    			<div class="media shop_row">
                    				  
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo "【收货】".$tb["game_name"]."|";
                    					echo $tb["buy_type"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_client"]."|";
                    					echo $tb["operator"]."|";
                    					echo "服务器/大区".$tb["region"];
                    					?>
                    					</h4>
                 
                    					<p><?php 
                    					if ($tb["buy_desc"])
                    					{
                    					    echo $tb["buy_desc"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    					<p>
                    					    <span><?php echo $tb["audit"];?></span>
                    					</p>
                    				</div>
                    			</div>
                    			<p class="page-header"></p>
                    		<?php 
                    		  }
                    		?>
					</div>
					<div class="tab-pane" id="panel-419270">
						<?php 
                    		  foreach ($setPass as $tb)
                    		  {
                    		?>
                    						<div class="media shop_row">
                    				 <img src="<?php echo $tb["image"];?>" width="120px" class="media-object" alt='' />
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo $tb["game_name"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_account"]."|";
                    					echo $tb["game_deal_type"]."|";
                    					echo $tb["client"]."|";
                    					echo $tb["region"];
                    					?>
                    					</h4>
                    					<p><?php echo $tb["shop_title"];?></p>
                    					<p><?php 
                    					if ($tb["account_msg"])
                    					{
                    					    echo $tb["account_msg"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    				</div>
                    			</div>
                    			<p class="page-header"></p>
                    		<?php 
                    		  }
                    		?>
                    		
                    		 <?php 
                    		  foreach ($setSH_t as $tb)
                    		  {
                    		?>
                    			<div class="media shop_row">
                    	
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo "【收货】".$tb["game_name"]."|";
                    					echo $tb["buy_type"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_client"]."|";
                    					echo $tb["operator"]."|";
                    					echo "服务器/大区".$tb["region"];
                    					?>
                    					</h4>
                 
                    					<p><?php 
                    					if ($tb["buy_desc"])
                    					{
                    					    echo $tb["buy_desc"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    					<p>
                    					    <span><?php echo $tb["audit"];?></span>
                    					</p>
                    				</div>
                    			</div>
                    			<p class="page-header"></p>
                    		<?php 
                    		  }
                    		?>
					</div>
					<div class="tab-pane" id="panel-419271">
						<?php 
                    		  foreach ($setDc as $tb)
                    		  {
                    		?>
                    						<div class="media shop_row">
                    				 <img src="<?php echo $tb["image"];?>" width="120px" class="media-object" alt='' />
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo $tb["game_name"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_account"]."|";
                    					echo $tb["game_deal_type"]."|";
                    					echo $tb["client"]."|";
                    					echo $tb["region"];
                    					?>
                    					</h4>
                    					<p><?php echo $tb["shop_title"];?></p>
                    					<p><?php 
                    					if ($tb["account_msg"])
                    					{
                    					    echo $tb["account_msg"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    					<P><span><?php echo $tb["audit"];?></span></P>
                    				</div>
                    			</div>
                    			<p class="page-header"></p>
                    		<?php 
                    		  }
                    		?>
                    		
                    		 <?php 
                    		  foreach ($setSH_s as $tb)
                    		  {
                    		?>
                    			<div class="media shop_row">
                    				  
                    				<div class="media-body">
                    					<h4 class="media-heading shop_titles">
                    					<?php 
                    					echo "【收货】".$tb["game_name"]."|";
                    					echo $tb["buy_type"]."|";
                    					echo $tb["game_type"]."|";
                    					echo $tb["game_client"]."|";
                    					echo $tb["operator"]."|";
                    					echo "服务器/大区".$tb["region"];
                    					?>
                    					</h4>
                 
                    					<p><?php 
                    					if ($tb["buy_desc"])
                    					{
                    					    echo $tb["buy_desc"];
                    					}
                    					?></p>
                    					<p>
                    					    <span>¥ <?php echo $tb["price"];?></span>
                    					</p>
                    					<p>
                    					    <span><?php echo $tb["audit"];?></span>
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
		  
		</div>
	</div>
</div>