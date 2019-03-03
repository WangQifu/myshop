<style>
#footer {
    padding: 15px 0;
    background: #fff;
    border-top: 1px solid #ddd;
    text-align: center;
}
.mycart
{
	position:fixed;
	bottom:10px;
}
</style>	
<?php if(!$hideFooter):?>

<div class="container">
	    <div class="row clearfix">
		<div class="col-md-12 column">
			<div id="footer">
				<div class="footerNav">
					
				</div>
				<div class="copyRight">
					Copyright ©2017 超新星科技 爱游商店 版权所有 <a href="http://www.miitbeian.gov.cn/">黔ICP备17009525号</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
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
    <div class="col-md-2 mycart">
    	<a href="" class=""></a>
    	
    </div>
<?php endif;?>
	</body>
</html>