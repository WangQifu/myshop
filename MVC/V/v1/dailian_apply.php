<?php
//申请客服
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		  <form id="ff" role="form" action="index.php?control=auditC&action=dailian_logon" method="post">
				<div class="panel panel-default">
				  <div class="panel-heading">申请成为游戏代练</div>
				  <div class="panel-body">
				    <input type="hidden" name="product_id" value="{tb.id}" />
        			<input type="hidden" name="product_name" value="{tb.shop_title}" />
        			<input type="hidden" name="price" value="{tb.price}" />
        			<input type="hidden" name="seller" value="{tb.user_name}" />
        			<input type="hidden" name="image" value="{tb.image}" />
        			<input type="hidden" name="shop_type" value="<?php echo $ly_view;?>" />
        			  <div class="form-group">
                       <label>服务游戏 <small>(每个号只能申请服务一款游戏)</small></label>
                       <select name="gameid" class="form-control">
                                <?php 
                                    foreach ($list as $r)
                                    {
                                      
                                ?>
                               <option value="<?php echo $r["id"];?>"> 【<?php echo $r["game_type"];?>】<?php echo $r["appname"];?> </option>
                                <?php }?>
                        </select>
                      </div> 
                      <div class="form-group">
                       <label>服务时间<small>(白天/夜间/全天)</small></label>
                       <select name="fuwu_shijian" class="form-control">
                                <option value="白天"> 白天</option>
                                <option value="夜间"> 夜间 </option>
                                <option value="全天 "> 全天 /24h</option>
                        </select>
                      </div>
        				
                        <div class="form-group">
        					 <label for="exampleInputPhone">昵称：</label>
        					 <input type="text" name="dnick" class="form-control" id="exampleInput" />
        				</div>
        				<div class="form-group">
        					 <label for="exampleInputPhone">联系手机：</label>
        					 <input type="text" name="phone" class="form-control" id="exampleInputPhone" />
        				</div>
        				<div class="form-group">
        					 <label for="exampleInputPhone">QQ：</label>
        					 <input type="text" name="QQ"  class="form-control" id="exampleInputPhone" />
        				</div>
        				<div class="form-group">
        					 <label for="exampleInputPhone">微信：</label>
        					 <input type="text" name="weixin"  class="form-control" id="exampleInputPhone" />
        				</div>
        				<?php 
//         				<div class="form-group">
//         					 <label for="exampleInputPhone">服务保证金<small>（保证金额度=游戏代练额度、不能代练交易金额大于保证金的订单）</small></label>
//         					 <input type="number" name="dailian_yajin"  class="form-control" id="exampleInputPhone" />
//         				</div>
        				?>
        				<div class="form-group">
        					 <label for="exampleInputPhone">能力描述：</label>
        					 <input type="text" name="desc_ms"  class="form-control" id="exampleInput" />
        				</div>
        			     <div class="form-group">
        					 <label for="">注！<small>（提交申请后请及时联系客服QQ：734500064 进行开通申请 ）</small></label>
        					
        				</div>
				  </div>
				 </div>

				<button type="submit" class="btn btn-block btn-success">确认申请</button>
			</form>
		</div>
	</div>
</div>
