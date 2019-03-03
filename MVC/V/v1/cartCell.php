<script>
	$(document).ready(function(){
	

			$(".ToCart").click(function(pid){
					$.post("index.php?control=indexC&action=accounts&",{"pid":pid},function(result){
						$("#cartNum").html(result);
					})
				});
	}
</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<?php
				foreach ($cart as $r)
				{
			?>
			<div class="media">
				 <a href="#" class="pull-left"><img src="skin/img/64.jpg" class="media-object" alt='' /></a>
				<div class="media-body">
					<h4 class="media-heading">
						<?php echo $r["prod_name"];?>
					</h4> <?php echo $r["prod_content"];?>
					<a href='#' class="btn btn-default addToCart" pid="<?php echo $d["id"];?>" class="btn btn-default ToCart" >立即购买</a>
				</div>
			</div>
			<?php 
				}
			?>
		</div>
	</div>
</div>