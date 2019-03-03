<?php session_start();?>
<script src="MVC/V/v1/js/loginajax.js" type="text/javascript"></script>
<div class="container col-md-12">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label for="inputUserName">账户：</label>
						<input type="text" class="form-control" id="inputUserName" placeholder="请输入用户名"/>
				</div>
				<div class="form-group">
					 <label for="inputPass">密码：</label>
						<input type="password" class="form-control" id="inputPass" placeholder="请输入用密码"/>
				
				</div>
				<div class="form-group">
					<div>
						<div class="checkbox">
							 <label><input id="remWeek" type="checkbox" /> 一周内免登陆</label>
							 <a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=logon", 380);'>注册</a>
							 <a href="index.php?control=query_c&action=changePassword&type=forgePass" class="pull-right">忘记密码></a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div>
						 <button type="button" class="btn btn-info" onclick="login()">登录</button>
						  
						 <button type="button" onclick='self.parent.sd_remove();' class="btn btn-defot">关闭</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	
</script>