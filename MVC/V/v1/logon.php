<script src="MVC/V/v1/js/jq.js"></script>
<script src="MVC/V/v1/js/mcode_msg.js" type="text/javascript"></script>
<link href="MVC/V/v1/css/bootstrap.css" rel="stylesheet" />
<script src="MVC/V/v1/js/bootstrap.js"></script>
<link href="MVC/V/v1/css/showDialog.css" rel="stylesheet" />
<script src="MVC/V/v1/js/showDialog.js"></script>
<script src="MVC/V/v1/js/gVerify.js"></script>

<div class="container col-md-12">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputUserName">账  户：</label>
					<input type="text" class="form-control" id="inputUserName" placeholder="请输入手机号码"/>
				</div>
				<div class="form-group" id="verify_yzm">
				<div id="v_container" style="width:100%;height:35px;"></div>
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
					<label for="inputPass">密  码：</label>
					<input type="password" class="form-control" id="inputPass" placeholder="请输入密码"/>
				</div>
				<div class="form-group">
					<label for="inputPass">确  认：</label>
					<input type="password" class="form-control" id="inputPass2" placeholder="请输入密码"/>
				</div>
				<div class="form-group">
    				<div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">推荐码</span>
                      <input id="tjcode" name="tjcode" type="text" class="form-control" placeholder="输入推荐码" aria-describedby="basic-addon1">
                    </div>
				</div>
				
				<div class="form-group">
					<div>
						<div class="checkbox">
							 <label><input id="remWeeks" type="checkbox" /> 我已阅读并同意<a href="ueup/newfile/20171106012358830027.html" target="_blank">《爱游商店服务协议》</a></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="button" class="btn btn-info" onclick="logon()">注册</button>
						  
						 <button type="button" onclick='self.parent.sd_remove();' class="btn btn-defot">关闭</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
