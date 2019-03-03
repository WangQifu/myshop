<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		
		<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">订单信息：</h3>
          </div>
          <div class="panel-body">
             <dl class="dl-horizontal">
			<?php 
			         foreach ($dealRow as  $sr)
			         {
			             $zt = $sr["deliver_goods"];
			             $did= $sr["id"];
			    ?>
			    <dt>
					订单状态：
				</dt>
				<dd>
					<?php echo $sr["deliver_goods"];?>
				</dd>
				<dt>
					订单编号：
				</dt>
				<dd>
					<?php echo $sr["number"];?>
				</dd>
				<dt>
					商品名称：
				</dt>
				<dd>
					<?php echo $sr["product_name"];?>
				</dd>
				<dt>
					出售类型：
				</dt>
				<dd>
					<?php echo $sr["shop_type"];?>
				</dd>
				<dt>
					买家：
				</dt>
				<dd>
					<?php echo $sr["buyer"];?>
				</dd>
				<dt>
					联系电话：
				</dt>
				<dd>
					<?php echo $sr["phone"];?>
				</dd>
				<dt>
					联系QQ：
				</dt>
				<dd>
					<?php echo $sr["QQ"];?>
				</dd>
				<dt>
					订单日期：
				</dt>
				<dd>
					<?php echo $sr["time"];?>
				</dd>
				<?php }?>
			</dl>
          </div>
        </div>
		  
		<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">卖家联系方式：</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
			    <?php 
			         foreach ($shopRow as  $sr)
			         {
			    ?>
				<dt>
					卖家：
				</dt>
				<dd>
					<?php echo $sr["user_name"];?>
				</dd>
				<dt>
					联系电话：
				</dt>
				<dd>
					<?php echo $sr["phone"];?>
				</dd>
				<dt>
					联系QQ：
				</dt>
				<dd>
					<?php echo $sr["QQ"];?>
				</dd>
				<dt>
					联系微信：
				</dt>
				<dd>
					<?php echo $sr["weixin"];?>
				</dd>
				<dt>
					当前库存：
				</dt>
				<dd>
					<?php echo $sr["amount"];?>
				</dd>
				<?php }?>
			</dl>
          </div>
        </div>
        
        <div>
            <span class="label label-danger">注意修改绑定信息(先联系卖家发货才能发货给客户)</span>
        </div>
        <div id="mt">
            <a href="index.php?control=buyC&action=kefu_affirm&did=<?php echo $did;?>&zt=<?php echo $zt;?>" class="btn btn-success btn-block <?php if ($zt != "买家已发货") echo "disabled";?>" type="button">发货</a>
        </div>
        
		</div>
	</div>
</div>
