
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row">
			<?php 
			     foreach ($kefu as $k)
			     {
			?>
				<div class="col-md-12">
					<div class="thumbnail">
						<img alt="300x200" width="150px" src="<?php if ($k["iconimg"]) echo $k["iconimg"]; else echo ("uploadimg/iconimg/usericon.png");?>" />
						<div class="caption">
							<h3>
								<?php echo $k["username"];?>
							</h3>
							<p>
								联系电话：<?php echo $k["phone"];?>
							</p>
							<p>
								联系QQ：<?php echo $k["QQ"];?>
							</p>
							<p>
								联系微信：<?php echo $k["weixin"];?>
							</p>
							<p>
								
							</p>
						</div>
					</div>
				</div>
                <?php 
			     }
                ?>
			</div>
			<button type="button" onclick='self.parent.sd_remove();' class="btn btn-success btn-block">确定</button>
		</div>
	</div>

