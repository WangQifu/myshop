<script src="MVC/V/v1/js/gmcode_msg.js" type="text/javascript"></script>
<script src="MVC/V/v1/js/gVerify.js"></script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		  <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php echo $title;?>
					</h3>
				</div>
				<div class="panel-body">
				<?php if ($msg){?>
				<div class="well"><?php echo $msg;?></div>
				<?php }
				if ($title == "修改密码"){?>
					<form class="form-horizontal" role="form" method="post" action="index.php?control=query_c&action=changePassword&type=form">
        				<div class="form-group">
        					<label for="inputPassword3" class="col-sm-2 control-label">原密码：</label>
        					<div class="col-sm-10">
        						<input name="oldpass" type="password" class="form-control" id="inputPassword3" />
        					</div>
        				</div>
        				<div class="form-group">
        					 <label for="inputPassword3" class="col-sm-2 control-label">新密码：</label>
        					<div class="col-sm-10">
        						<input name="newpass" type="password" class="form-control" id="inputPassword3" />
        					</div>
        				</div>
        				<div class="form-group">
        					<div class="col-sm-offset-2 col-sm-10">
        						 <button type="submit" class="btn btn-default">确认</button>
        					</div>
        				</div>
        			</form>
        			<?php }
        			 if ($title == "忘记密码")
        			 {
        			?>
        			 <form class="form-horizontal" role="form">
        				<div class="form-group">
        					<label for="inputUserName">账  户：</label>
        					<input type="text" class="form-control" id="inputUserName" placeholder="请输入手机号码"/>
        				</div>
        				<div class="form-group" id="verify_yzm">
        				<div id="v_container" style="width:300px;height:35px;"></div>
            				<div class="input-group">
                              <input type="text" id="code_input" value="" class="form-control" placeholder="请输入校验">
                              <span class="input-group-btn">
                                <button id="my_button" class="btn btn-default" type="button">验证</button>
                              </span>
                            </div>
        				</div>
        				<div class="form-group" id="verify_phone">
        				<label for="inputUserName">验证码：</label>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="请输入验证码" id="code">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="getCode(this)" id="J_getCode">获取验证码</button>
                                <button class="btn btn-default active disabled" id="J_resetCode" style="display:none;"><span id="J_second">60</span>秒后重发</button>
                              </span>
                              </div>
                        </div>
        				<div class="form-group">
        					<label for="inputPass">新密码：</label>
        					<input type="password" class="form-control" id="inputPass" placeholder="请输入新密码"/>
        				</div>
        				<div class="form-group">
        						 <button type="button" class="btn btn-info btn-block" onclick="gaimi()">确认</button>
        				</div>
        			</form>
        			<?php }?>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
