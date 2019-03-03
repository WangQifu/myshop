<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		{foreach:setRet name="tb"}
		<div class="media shop_row">
			  <a href="#" class="pull-left"><img src="{tb.image}" width="120px" class="media-object" alt='' /></a>
			<div class="media-body">
				<h4 class="media-heading shop_titles">
					{tb.game_name}【{tb.state_dg}】
				</h4>
				<p>
				   {tb.shop_title} 
				</p>
				<p>
				    <span>¥ {tb.price}</span>
				</p>
				
			</div>
		</div>
		<p class="page-header"><a href="index.php?control=buyC&action=shop_soldout&type=out&gid={tb.id}">下架</a></p>
		
		{/endforeach}		
		</div>
	</div>
</div>
