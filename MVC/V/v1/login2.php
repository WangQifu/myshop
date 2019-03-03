<script src="MVC/V/v1/js/loginajax.js" type="text/javascript"></script>
<div class="container">
<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-8 column">
					<div class="carousel slide" id="carousel-230276">
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#carousel-230276">
							</li>
							<li data-slide-to="1" data-target="#carousel-230276">
							</li>
							<li data-slide-to="2" data-target="#carousel-230276">
							</li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img alt="爱游商店" src="uploadimg/1.jpg" />
								<div class="carousel-caption">
									<h4>
										爱游商店
									</h4>
									<p>
										更快更准确的游戏资讯，游戏教程，游戏信息
									</p>
								</div>
							</div>
							<div class="item">
								<img alt="爱游商店" src="uploadimg/2.jpg" />
								<div class="carousel-caption">
									<h4>
										自由的游戏交易
									</h4>
									<p>
										更快更自由的游戏交易，让你轻松赚钱
									</p>
								</div>
							</div>
						</div> 
						<a class="left carousel-control" href="#carousel-230276" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
						<a class="right carousel-control" href="#carousel-230276" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
				</div>
				<div class="col-md-4 column">
					<form role="form" action="index.php?control=member&action=login_action&login=2">
						<div class="form-group">
							 <label for="exampleInput">邮箱：</label><input type="text" class="form-control" id="inputUserName" />
						</div>
						<div class="form-group">
							 <label for="exampleInputPassword1">密码：</label><input type="password" class="form-control" id="inputPass" />
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
						   </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>