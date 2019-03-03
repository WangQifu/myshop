<?php
//出售金币/装备
?>
<div class="container">
	<div class="row clearfix">
			<div class="col-md-12 column">
				<form id="ff" method="post" action="index.php?control=gameC&action=upSellGame">
				<input name="gid" type="hidden" value="<?php echo $gid;?>">
				<input name="image" type="hidden" value="<?php echo $images;?>">
					<div class="tab-pane" id="account">
        						<div class="panel panel-default">
								  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>商品信息</div>
								  <div class="panel-body">
								   <div class="form-group">
                                        <label>商品标题 <small>(商品信息)</small></label>
                                        <input name="shop_title" type="text" class="form-control" placeholder="输入商品标题">
                                      </div>
                                      <div class="form-group">
                                        <label>数量 <small>(单位：万)</small></label>
                                        <div class="input-group">
                                        <input name="num_jb_zb" type="text" class="form-control" placeholder="输入数量">
                                        <div class="input-group-addon"><?php echo $units;?></div>
                                        </div>
                                      </div>
									  <div class="form-group">
                                        <label>售价 <small>(人民币)</small></label>
                                        <div class="input-group">
                                        <input name="price" type="text" class="form-control" placeholder="输入价格">
                                        <div class="input-group-addon">元</div>
                                        </div>
                                      </div>
										<div class="form-group">
                                        <label>描述 <small>(信息越详细出售越快)</small></label>
                                        <textarea name="account_msg" class="form-control" rows="7"></textarea>
                                      </div>
								  </div>
								</div>
								
								<div class="panel panel-default">
								  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>交易选项</div>
								  <div class="panel-body">
								        <?php 
										//<div class="form-group">
                                        //<label>暗号 <small>(交易暗号只有卖家和买家可见)</small></label>
                                        //<input name="deal_pass" type="text" class="form-control" placeholder="交易暗号">
                                        //</div>
                                        ?>
										<div class="form-group">
                                        <label>通知手机号 <small>(联系手机号)</small></label>
                                        <input name="phone" type="number" class="form-control" placeholder="输入手机号">
                                        </div>
										<div class="form-group">
                                        <label>通知QQ <small>(联系QQ)</small></label>
                                        <input name="QQ" type="number" class="form-control" placeholder="输入QQ号">
                                        </div>
										<div class="form-group">
                                        <label>通知微信 <small>(联系微信)</small></label>
                                        <input name="weixin" type="text" class="form-control" placeholder="输入微信号">
                                        </div>
										
								  </div>
								</div>
                          
                            </div>
                <div style="text-align:center;padding:5px">
				<button type="submit" class="btn btn-default">确认发布</button>
				<a href="javascript:void(0)" class="btn btn-default" onclick="clearForm()">重置</a>
				</div>
				</form>
			</div>
	</div>
</div>
<script>
		function clearForm(){
			$('#ff').form('clear');
			self.location.reload();//刷新当前页面
		}
</script>