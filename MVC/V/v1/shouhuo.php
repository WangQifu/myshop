<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
			     <?php 
			     foreach ($shrow as $r)
			     {
			     ?>
				<h2>
					<?php echo $r["game_name"];?>【<?php echo $r["buy_type"];?>】¥：<?php echo $r["price"];?>、元
				</h2>
				<p>
					游戏类型：<?php echo $r["game_type"];?>
				</p>
				<p>
					游戏平台：<?php echo $r["game_client"];?>
				</p>
				<p>
					运 营 商：<?php echo $r["operator"];?>
				</p>
				<p>
					收购区服：<?php echo $r["region"];?>
				</p>
				<p>
					联系电话：<?php echo $r["phone"];?>
				</p>
				<p>
					联系QQ：<?php echo $r["qqnum"];?>
				</p>
				<p>
					收购描述：<?php echo $r["buy_desc"];?>
				</p>
				<p>
					注：请将商品上架到爱游商店后联系
				</p>
				<?php }?>
			</div>
		</div>
	</div>
</div>
