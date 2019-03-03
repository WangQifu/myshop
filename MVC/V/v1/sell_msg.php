<?php
?>
<style>
	.prod{border:0}
	.prod li{border:0}
	.page-header{margin:0 auto;font-size:22px;font-weight: bold;}
	.price2 span{color:darkred}
	.intr{border:solid 1px #ddd;border-radius:5px; background: #ddd;line-height: 28pt; width: 80px;}
</style>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<?php 
		  if ($state == "预定")
		  {
		      $btn = "disabled";
		      echo '<div class="well">温馨提示：该商品已被预订，未付款将自动恢复</div>';
		  }
		  else 
		  {
		      $btn = "";
		  }
		?>
		
		{foreach:row name="prod"}
			<div class="col-md-3 text-center">
				<a href="index.php?control=sell_query&action=setGame_sell&pid={prod.game_id}&pn={prod.game_name}"><img src="{prod.image}" width="200px"/></a>
			</div>
		<div class="col-md-9">
			<ul class="list-group prod">
				<li class="list-group-item">
					<p class="page-header"><a href="index.php?control=sell_query&action=setGame_sell&pid={prod.game_id}&pn={prod.game_name}">【{prod.game_name}】</a> {prod.shop_title}</p>
				</li>
				<li class="list-group-item">
				    <p>
				        
				    </p>
				</li>
				<li class="list-group-item price2">
				<span class="glyphicon glyphicon-yen"> </span><span>{prod.price}</span>
				</li>
				 <li class="list-group-item ">
				  <p class="intr">
				  	<span class="glyphicon glyphicon-tags"> {prod.game_account}</span>
				  </p>
				</li>
				<?php 
// 				 <li class="list-group-item ">
// 				  <a href='index.php?control=sell_query&action=order_form&gid={prod.id}&type={prod.game_account}' pid={prod.id} class='btn btn-danger <php echo $btn;>'>
// 				  <span class="glyphicon glyphicon-shopping-cart"></span>立即购买</a>
// 				</li>
				?>
			</ul>
		</div>
		<div class="col-md-12 column">
		<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>商品详情</div>
			  <div class="panel-body">
			    <table class="table table-condensed">
                    <tr>
                      <td class="active">平台：{prod.game_type}</td> 
                    </tr>
                    <tr>
                       <td class="success">出售：{prod.game_account}</td>
                    </tr>
                    <tr>
                    <td class="warning">应用：{prod.game_deal_type}</td>
                    </tr>
                    <tr>
                    <td class="danger">运营商：{prod.client}</td>
                    </tr>
                    <tr>
                    <td class="info">服务区：{prod.region}</td>
                    </tr>
                    <?php 
        			     if ($ly_view == "账号")
        			     {
        			?>
                    <tr>
                    <td class="danger">绑定手机：{prod.bindingphone}</td>
                    </tr>
                    <tr>
                    <td class="warning">绑定邮箱：{prod.bindingemail}</td>
                    </tr>
                    <tr>
                    <td class="success">其它绑定：{prod.binding}</td>
                    </tr>
                    <?php }?>
                    
                </table>
                
                <table>
                <?php if (the_user()){?>
                    <tr>
                    <td>联系手机：{prod.phone}</td>
                    </tr>
                    <tr>
                    <td>联系微信：{prod.weixin}</td>
                    </tr>
                    <tr>
                    <td>联系 Q Q：{prod.QQ}</td>
                    </tr>
                    <?php }else {?>
                    <tr>
                    <td><a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' class="btn btn-block btn-danger" type="button">联系购买</a></td>
                    </tr>
                    <?php }?>
                    
                 </table>
                 <hr>
                <?php if ($ly_view == "账号" && count($desc) > 0 )
        			     {
        			         foreach ($desc as $d)
        			         {
        			             echo $d["title"].":".$d["content"]."<br>";
        			         }
        		          }
        	           else {    
        	    ?>
			                  {prod.account_msg}
			   <?php }?>
			  </div>
			</div>
		</div>
		{/endforeach}
		</div>
	</div>
</div>
