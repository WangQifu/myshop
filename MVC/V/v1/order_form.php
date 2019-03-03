<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column">
		      {foreach:row name="tb"}
    		      <div class="media shop_row">
    				  <a href="#" class="pull-left"><img src="{tb.image}" width="160px" class="media-object" alt='' /></a>
    				<div class="media-body">
    					<h4 class="media-heading shop_titles">
    						【{tb.game_name}】【{tb.game_account}】{tb.shop_title}
    					</h4>
    					<p>
    					    <span>出售:{tb.game_account}</span>|<span>区服：{tb.region}</span>
    					</p>
    					<?php 
            			     if ($ly_view == "账号")
            			     {
            			?>
    					<p>
    					    <span>绑定信息:</span> 
    					</p>
    					<p>
    					<span class="glyphicon glyphicon-phone">：{tb.bindingphone}</span>
    					</p>
    					<p>
    					<span class="glyphicon glyphicon-envelope">：{tb.bindingemail}</span>
    					</p>
    					<p>
    					 其它：{tb.binding}
    					</p>
    					<?php }?>
    					<p>
    					    <span>¥ {tb.price}</span>
    					</p>
    					
    				</div>
    			</div>
    			<p class="page-header"></p>
		         
				<form id="ff" role="form" action="index.php?control=buyC&action=buy_g" method="post">
				<div class="panel panel-default">
				  <div class="panel-heading">联系方式</div>
				  <div class="panel-body">
				    <input type="hidden" name="product_id" value="{tb.id}" />
        			<input type="hidden" name="product_name" value="{tb.shop_title}" />
        			<input type="hidden" name="price" value="{tb.price}" />
        			<input type="hidden" name="seller" value="{tb.user_name}" />
        			<input type="hidden" name="image" value="{tb.image}" />
        			<input type="hidden" name="shop_type" value="<?php echo $ly_view;?>" />
        				<div class="form-group">
        					 <label for="exampleInputPhone">联系手机：</label><input type="text" name="phone" class="form-control" id="exampleInputPhone" />
        				</div>
        				<div class="form-group">
        					 <label for="exampleInputPhone">联系QQ：</label><input type="text" name="QQ"  class="form-control" id="exampleInputPhone" />
        				</div>
        				<div class="form-group">
        					 <label for="exampleInputPhone">联系暗号：</label><input type="text" name="kouling"  class="form-control" id="exampleInputPhone" />
        				</div>
				  </div>
				 </div>
			<?php 
			     if ($ly_view == "账号")
			     {
			?>
			     <div class="panel panel-default">
				  <div class="panel-heading">修改绑定信息</div>
				  <div class="panel-body">
				     <div class="form-group">
					 <label for="exampleInputPhone">修改绑定手机：</label><input type="text" name="binding_phone"  class="form-control" id="exampleInputPhone" />
        				</div>
        				
        				<div class="form-group">
        					 <label for="exampleInputEmail">修改绑定邮箱：</label><input type="email" name="binding_email"  class="form-control" id="exampleInputEmail1" />
        				</div>
        				
        				<div class="form-group">
        					 <label for="exampleInputPhone">邀请码：</label><input type="text" name="invitation_code"  class="form-control" id="exampleInputPhone" />
				</div>
				  </div>
				 </div>
				
				<?php }?>
				<div class="tabbable" id="tabs-269066">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-4944801" data-toggle="tab">客服协助</a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-4944801">
						<ul class="list-group">
						  <li class="list-group-item">
						      <input type="radio" name="kefu" id="kefu" value="0" checked> 不需要客服！自己联系交易（注！此项风险平台不承担）
						  </li>
						  <?php 
						      if (count($kefu)>0)
						      {
						          
						          foreach ($kefu as $kf)
						          {
						              if ($kf["iconimg"])
						              {
						                  $icon_img = $kf["iconimg"];
						              }
						              else 
						              {
						                  $icon_img = "uploadimg/iconimg/usericon.png";
						              }
						              
						  ?>
                          <li class="list-group-item">
                              <input type="radio" name="kefu" id="kefu" value="<?php echo $kf["id"];?>">
                              <img src="<?php echo $icon_img;?>" alt="<?php echo $kf["username"];?>" width="60px">
                               <?php echo $kf["kefunick"];?>
                               <span class="badge">
                                    <?php 
                					   if ($kf["kefu_type"]==0)
                					   {
                					       echo "普通客服 ";
                					   }
                					   if ($kf["kefu_type"]==15)
                					   {
                					       echo "白银客服";
                					   }
                					   if ($kf["kefu_type"]==30)
                					   {
                					       echo "黄金客服";
                					   }
                					   if ($kf["kefu_type"]==60)
                					   {
                					       echo "铂金客服";
                					   }
                					   if ($kf["kefu_type"]==88)
                					   {
                					       echo "砖石客服";
                					   }
                					
                					?>
                               </span>
                           </li>
                          <?php 
						          }
						      }
                          ?>
                        </ul>
					</div>
				
				</div>
			</div>
				
				<button type="submit" class="btn btn-block btn-success">确认购买</button>
			</form>
			{/endforeach}
		</div>
	</div>
		</div>
		<div class="col-md-2 column">
		</div>
	</div>
		
</div>
