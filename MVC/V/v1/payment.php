
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<?php 
		    if (count($setRet)>0)
		    {
		        foreach ($setRet as $tb)
		        {
		?>
		  <div class="media shop_row">
				  <a href="#" class="pull-left"><img src="<?php echo $tb["image"];?>" width="120px" class="media-object" alt='' /></a>
				<div class="media-body">
					<h4 class="media-heading shop_titles">
						<?php echo $tb["product_name"];?>
					</h4>
					<p>
					    订单号：<?php echo $tb["number"];?>
					</p>
					<?php if ($type=="账号"){?>
					<p>
					    <span>您要修改的绑定信息</span> 
					</p>
					<p>
					<span class="glyphicon glyphicon-phone">改绑手机：<?php echo $tb["binding_phone"];?></span>
					</p>
					<p>
					<span class="glyphicon glyphicon-envelope">改绑邮箱：<?php echo $tb["binding_email"];?></span>
					</p>
					<p>
    					 其它：<?php if ($tb["binding"]) echo $tb["binding"];?>
    				</p>
    				<?php }?>
					<p>
					    <span>¥ <?php echo $tb["price"];?></span>
					</p>
					<input type="hidden" name="kefuphone" value="18386400708" />
					<input type="hidden" name="ddnum" value="<?php echo $tb["number"];?>" />
					<p>
					<a  href="index.php?control=buyC&action=payment&bid=<?php echo $tb["id"];?>&kefuphone=18386400708&ddnum=<?php echo $tb["number"];?>" class="btn btn-info">确认订单</a>
					</p>
					<p>
					<a href='index.php?control=buyC&action=payment&bid=<?php echo $tb["id"];?>&type=cancel' class="btn btn-info" class="btn btn-default ToCart" >取消</a>
					</p>
				</div>
			</div>
			<p class="page-header"></p>
			<?php 
		        }
		    }
			?>
		</div>
	</div>
</div>
