<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<?php 
		  foreach ($setRet as $tb)
		  {
		?>
		  <div class="media shop_row">
				  <a href="#" class="pull-left"><img src="<?php echo $tb["image"];?>" width="120px" class="media-object" alt='' /></a>
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
					if (count($setMS)>0)
					{
					    foreach ($setMS as $ms)
					    {
					        echo $ms["title"].":".$ms["content"]."<br>";
					    }
					}
					elseif ($tb["account_msg"])
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
		</div>
	</div>
</div>