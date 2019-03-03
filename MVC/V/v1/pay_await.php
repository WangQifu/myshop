<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		   <p class="msbg">
				  	<?php
				  	     if (!$msg)
				  	     {
				  	         echo "商品很抢手哦！赶紧下单";
				  	     }
				  	     else 
				  	     {
				  	         echo $msg;
				  	     }
				  	?>
		   </p>                         
		  {foreach:setRet name="tb"}
			<div class="media shop_row">
				  <a href="#" class="pull-left"><img src="{tb.image}" width="170px" class="media-object" alt='' /></a>
				<div class="media-body">
					<h4 class="media-heading shop_titles">
						{tb.product_name}
					</h4>
					<p>
					    订单号：{tb.number}
					</p>
					<?php if ($type == "账号")
					       {
					    ?>
					<p>
					    <span>修改绑定信息</span> 
					</p>
					<p>
					<span class="glyphicon glyphicon-phone">：{tb.binding_phone}</span>
					</p>
					<p>
					<span class="glyphicon glyphicon-envelope">：{tb.binding_email}</span>
					</p>
					<?php }?>
					<p>
					    <span>¥ {tb.price}</span>
					</p>
					<p>
					<a href='index.php?control=buyC&action=payment&bid={tb.id}&kefuphone=18386400708&ddnum={tb.number}' class="btn btn-info" pid="{tb.id}" class="btn btn-default ToCart" >确认下单</a>
					</p>
					<p>
					<a href='index.php?control=buyC&action=payment&bid={tb.id}&type=cancel' class="btn btn-info" pid="{tb.id}" class="btn btn-default ToCart" >取消订单</a>
					</p>
					
				</div>
			</div>
			<p class="page-header"></p>

			{/endforeach}
		</div>
	</div>
	
	<div class="row clearfix">
		<div class="col-md-12 column">                         
		  <?php 
		  if (count($setRetCl)>0)
		  {
		  foreach ($setRetCl as $cl){
		  
		  ?>
			<div class="media shop_row">
				  <a href="#" class="pull-left"><img src="<?php echo $cl["image"];?>" width="170px" class="media-object" alt='' /></a>
				<div class="media-body">
					<h4 class="media-heading shop_titles">
						<?php echo $cl["product_name"];?>
					</h4>
					<p>
					    订单号：<?php echo $cl["number"];?>
					</p>
					<?php if ($type == "账号")
					       {
					    ?>
					<p>
					    <span>修改绑定信息</span> 
					</p>
					<p>
					<span class="glyphicon glyphicon-phone">绑定手机：<?php echo $cl["binding_phone"];?></span>
					</p>
					<p>
					<span class="glyphicon glyphicon-envelope">绑定邮箱：<?php echo $cl["binding_email"];?></span>
					</p>
					<?php }?>
					<p>
					    <span>¥ <?php echo $cl["price"];?></span>
					</p>
				</div>
			</div>
			<?php 
			     if ($cl["kefu_id"]>0)
			     {
			?>
				  	<a href="#" onclick='showWindow("客服信息", "index.php?control=kefuC&action=queryKefu&kid=<?php echo $cl["kefu_id"];?>", 500);' class="pull-right">此订单交易服务客服>></a>
			<?php 
			     }
			     else 
			     {
			         echo '<span class="label label-default pull-right">自理订单</span>';
			     }
			?>
			<p class="page-header"></p>
            <?php
                }
		      }
            ?>
		</div>
	</div>
	
</div>
