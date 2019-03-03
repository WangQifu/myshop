<div class="container">
   <div class="row clearfix">
	<div class="col-md-12 column">
	  <?php 
	      foreach ($dailian as $d)
	      {
	  ?>
		<div class="media well">
			<p>
			    <a href="#" target="_blank" class="pull-left"><img src="<?php echo $d["iconimg"];?>" width="30px" class="media-object" alt="爱游资讯" /> </a><?php echo $d["dnick"]."【".$d["fuwu_shijian"]."】";?>
			</p>
			 
			<div class="media-body">
				<p>
				   <?php echo $d["desc_ms"];?>
				</p>
				<p>
				   联系电话：<?php echo $d["phone"];?> QQ： <?php echo $d["QQ"];?> 微信：<?php echo $d["weixin"];?>
				</p>
				
			</div>
		</div>
		<?php 
            }
		?>
	</div>
</div>
</div>
