<?php
//出售账号需要填写
?>
<style type="text/css">
.demo{width:760px; margin:40px auto 0 auto; min-height:150px;}
.preview{width:200px;border:solid 1px #dedede; margin:10px;padding:10px;}
.demo p{line-height:26px}
.btn{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;*display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
.btn input {position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
</style>
<script type="text/javascript" src="MVC/V/v1/js/jquery.wallform.js"></script>
<script>
$(function(){
	$("#photoimg").change(function(){
		var status = $("#up_status");
		var btn = $("#up_btn");
		$("#imageform").ajaxForm({
			target: '#preview',
			beforeSubmit:function(){
				status.show();
				btn.hide();
			}, 
			success:function(){
				status.hide();
				btn.show();
			}, 
			error:function(){
				status.hide();
				btn.show();
		} }).submit();
	}); 
	
});
</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>添加图片</div>
			<div class="panel-body">
				<div id="preview"></div>
			        <form id="imageform" method="post" enctype="multipart/form-data" action="uploadDe.php">
			        	<input name="gid" type="hidden" value="<?php echo $gid;?>">
						<div id="up_status" style="display:none"><img src="loader.gif" alt="uploading"/></div>
						<div id="up_btn" class="btn">
							<span>添加图片</span>
							<input id="photoimg" type="file" name="photoimg">
						</div>
					</form>
			</div>
		</div>
		</div>
	</div>
	
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
                                        <label>标题 <small>(商品信息)</small></label>
                                        <input name="shop_title" type="text" class="form-control" placeholder="输入商品标题">
                                      </div>
									  <div class="form-group">
                                        <label>售价 <small>(人民币)</small></label>
                                        <input name="price" type="text" class="form-control" placeholder="输入价格">
                                      </div>
										<div class="form-group">
                                        <label>账号信息 <small>(信息越详细出售越快)</small></label><br>
                                        <?php if ($type=="zd")
                                        		{	
                                        			echo "<textarea name='account_msg' class='form-control' rows='7'></textarea>";
                                        		}
                                        		else 
                                        		{
                                        			if (count($t3) >0 )
                                        			{
                                        			    $num=1;
                                        			    echo "<input name='countt3' type='hidden' value='".count($t3)."'>";
                                        			    foreach ($t3 as $r)
                                        			    {
                                        			        if ($r["row_id"] == "3")
                                        			        {
                                        			            echo "<input name='".$num."' type='hidden' value='".$r["id"]."'>";
                                        			            echo "<input name='title".$num."' type='hidden' value='".$r["add_title"]."'>";
                                        			            echo "<label>".$r["add_title"]."</label>";
                                        			            echo "<input name='".$r["id"]."' type='text' class='form-control' placeholder='".$r["add_title"]."'><br>";
                                        			          $num++;
                                        			        }
                                        			    }
                                        			}
                                        			else 
                                        			{
                                        			    echo "<textarea name='account_msg' class='form-control' rows='7'></textarea>";
                                        			}
                                        			
                                        		}
                                        ?>
                                      </div>
								  </div>
								</div>
								
								<div class="panel panel-default">
								  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>保密信息（信息经过多重加密保障安全）</div>
								  <div class="panel-body">
										<div class="form-group">
                                        <label>游戏账号 <small>(登陆游戏的账号)</small></label>
                                        <input name="longname" type="text" class="form-control" placeholder="输入账号">
                                        </div>
                                        <?php 
// 									  <div class="form-group">
//                                         <label>游戏密码 <small>(登陆游戏的密码)</small></label>
//                                         <input name="longpass" type="password" class="form-control" placeholder="输入密码">
//                                       </div>
                                      ?>
                                      <div class="form-group">
                                        <label>绑定手机 <small>(有则输入绑定内容、无则输入无)</small></label>
                                        <input name="bindingphone" type="text" class="form-control" placeholder="绑定手机_没有就写《无》">
                                      </div>
                                      <div class="form-group">
                                        <label>绑定邮箱 <small>(有则输入绑定内容、无则输入无)</small></label>
                                        <input name="bindingemail" type="text" class="form-control" placeholder="绑定邮箱_没有就写《无》">
                                      </div>
									  <div class="form-group">
                                        <label>其它绑定信息 <small>(有则输入绑定内容、无则输入无)</small></label>
                                        <input name="binding" type="text" class="form-control" placeholder="是否有绑定？_没有就写《无》">
                                      </div>
										
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>交易选项</div>
								  <div class="panel-body">
								  <?php
// 								  <div class="form-group">
// 								  <label>暗号 <small>(交易暗号只有卖家和买家可见)</small></label>
// 								  <input name="deal_pass" type="text" class="form-control" placeholder="交易暗号">
// 								  </div>
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