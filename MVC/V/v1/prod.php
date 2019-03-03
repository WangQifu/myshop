<style>
	.prod{border:0}
	.prod li{border:0}
	.page-header{margin:0 auto;font-size:22px;font-weight: bold;}
	.price2 span{color:darkred}
	.intr{border:solid 1px #ddd;border-radius: 5px; background: #ddd;text-indent:2em;line-height: 28pt;}
</style>
<script>
	$(document).ready(function(){
	
			function addCartNum(pid)
			{
				$.post("index.php?control=prodC&action=addtocart&",{"pid":pid},function(result){
					$("#cartNum").html(result);
				})
			}
			
			$(".addToCart").click(function(){//添加动画
					var getPid = $(this).attr("pid");
					var oldProd=$(this).parents(".prod")
					var newProd=$(this).parents(".prod").clone();//复制品

					newProd.css({
							position:"fixed",left:$(oldProd).offset().left,top:$(oldProd).offset().top
						})
					
					$(oldProd).parent().append(newProd);
					
					newProd.animate({
							left:$(".mycart").offset().left,
 			 				top:$(".mycart").offset().top,
 			 				width:0,
 			 				height:0
						},"slow","",function(){
								$(newProd).remove();
								addCartNum(getPid);
							});
							return false;
				})
		})
</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-8 column">
		{foreach:proddetail name="prod"}
			<div class="col-md-3">
				<img src="http://img10.360buyimg.com/cms/s200x200_g2/M03/01/0C/rBEGEU-aYKwIAAAAAAEzCXSdbiYAAARXAL5j4AAATMh369.jpg"/>
			</div>
		<div class="col-md-9">
			<ul class="list-group prod">
				<li class="list-group-item">
					<p class="page-header">{prod.prod_name}</p>
				</li>
				<li class="list-group-item">
				<span class="glyphicon glyphicon-sound-7-1">市场价: </span><span>￥{prod.prod_price1}</span>
					
				</li>
				<li class="list-group-item price2">
				<span class=" glyphicon glyphicon-cloud-download ">优惠价: </span><span>￥{prod.prod_price2}</span>
				</li>
				 <li class="list-group-item ">
				  <p class="intr">
				  	{prod.prod_intr}
				  	
				  </p>
				</li>
				 <li class="list-group-item ">
				  <button pid={prod.id} class="btn btn-danger addToCart"><span class="glyphicon glyphicon-shopping-cart"></span>加入购物车</button>
				  
				  <button class="btn btn-info"><span class=" glyphicon glyphicon-thumbs-up"></span>点赞</button>
				</li>
			</ul>
			
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>商品详情</div>
			  <div class="panel-body">
			   {prod.prod_content}
			  </div>
			</div>
		</div>
		{/endforeach}
		</div>
		
		<div class="col-md-4 column">
		</div>
	</div>
</div>