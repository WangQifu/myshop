<div class="container">
    <div class="col-md-12 column">
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">待处理订单</h3>
    </div>
    <div class="panel-body">
                    <?php
                    foreach ($list as $l)
                    {
                        ?>
        			<div class="media well">
        				<div class="media-body">
        					<h4 class="media-heading">
        						<a href="index.php?control=dealC&action=dealMsg&gid=<?php echo $l["product_id"];?>&sid=<?php echo $l["id"];?>">
        						<?php echo "买家:".$l["buyer"];?>_购买_【<?php echo $l["product_name"];?>】【<?php echo $l["shop_type"];?>】
        						</a>
        					</h4>
        					<p>
        					<?php echo "订单编号:".$l["number"];?>
        					</p>
        					<p>
        					<?php echo "价格:".$l["price"];?>
        					</p>
        					<p>
        					<?php echo "订单状态:".$l["deliver_goods"];?>
        					</p>
        				</div>
        			</div>
        			<?php 
                        }
        			?> 
    		  </div>
    	  </div>
       </div>
</div>