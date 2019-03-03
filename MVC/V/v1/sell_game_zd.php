<?php
//自定义出售游戏
?>

<div class="container">
	<form id="ff" method="post" action="index.php?control=gameC&action=sellGame&type=zd">
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="panel panel-default">
				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>填写信息</div>
				  <div class="panel-body">
				  					 <div class="form-group">
                                        <label>游戏名称<small>(游戏)</small></label>
                                        <input name="game_name" type="text" class="form-control" placeholder="输入游戏名称">
                                      </div>
                                      
				  					<div class="form-group">
                                        <label>出售类型 <small>(账号/装备/金币)</small></label>
                                        <select name="game_account" class="form-control">
                                                <option value="账号"> 账号 </option>
                                                <option value="装备"> 装备 </option>
                                                <option value="游戏币 ">游戏币 </option>
                                        </select>
                                      </div>
				  					
                                      <div class="form-group">
                                        <label>游戏类型 <small>(端游/手游)</small></label>
                                        <select name="game_type" class="form-control">
                                                <option value="手游"> 手游 </option>
                                                <option value="端游"> 端游 </option>
                                        </select>
                                      </div>
									  <div class="form-group">
                                        <label>选择平台 <small>(安卓/苹果)</small></label>
                                        <select name="game_deal_type" class="form-control">
                                                <option value="苹果"> 苹果 </option>
                                                <option value="安卓"> 安卓 </option>
                                                <option value="端游"> 端游</option>
                                            </select>
                                      </div>
									  <div class="form-group">
                                        <label>运营商 <small>(例：网易/QQ/微信/360账号)</small></label>
                                        <input name="client" type="text" class="form-control" placeholder="账号注册商">
                                      </div>
                                      <div class="form-group">
                                        <label>所属服务器 <small>(大区)</small></label>
                                        <input name="region" type="text" class="form-control" placeholder="输入服务器/大区">
                                      </div>
			 	</div>
			</div>
		</div>
	</div>
	<div style="text-align:center;padding:5px">
	<button type="submit" class="btn btn-block btn-success">下一步</button>
	</div>
		
	</form>
</div>