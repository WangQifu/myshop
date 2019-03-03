<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		{foreach:setRet name="tb"}
		  <div class="media shop_row">
			  <a href="#" class="pull-left"><img src="{tb.image}" width="120px" class="media-object" alt='' /></a>
			<div class="media-body">
				<h4 class="media-heading shop_titles">
					{tb.product_name}
				</h4>
				<p>
				    订单号：{tb.number}
				</p>
				<p>
				    卖家:{tb.seller}
				</p>
				<p>
				    <span>¥ {tb.price}</span>
				</p>
				
			</div>
		</div>
		<p class="page-header"></p>
			{/endforeach}
		</div>
	</div>
</div>