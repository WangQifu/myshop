<?php
?>
<div class="container">
	<form id="ff" method="post" action="index.php?control=gameC&action=buyGoods">
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="panel panel-default">
				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>填写收购信息</div>
				  <div class="panel-body">
				  					 <div class="form-group">
                                        <label>游戏名称<small>(游戏)</small></label>
                                        <input name="game_name" type="text" class="form-control" placeholder="输入游戏名称">
                                      </div>
				  					<div class="form-group">
                                        <label>收购类型 <small>(账号/装备/金币)</small></label>
                                        <select name="buy_type" class="form-control">
                                                <option value="账号"> 账号 </option>
                                                <option value="装备"> 装备 </option>
                                                <option value="游戏币 ">游戏币 </option>
                                                <option value="道具">道具 </option>
                                                <option value="其它">其它 </option>
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
                                        <select name="game_client" class="form-control">
                                                <option value="苹果"> 苹果 </option>
                                                <option value="安卓"> 安卓 </option>
                                                <option value="端游"> 端游</option>
                                            </select>
                                      </div>
									  <div class="form-group">
                                        <label>运营商 <small>(例：网易/QQ/微信/360账号)</small></label>
                                        <input name="operator" type="text" class="form-control" placeholder="账号注册商">
                                      </div>
                                      <div class="form-group">
                                        <label>所属服务器 <small>(大区)</small></label>
                                        <input name="region" type="text" class="form-control" placeholder="输入服务器/大区">
                                      </div>
                                      <div class="form-group">
                                        <label>收购价格 <small>(大区)</small></label>
                                        <input name="price" type="number" class="form-control" placeholder="价格">
                                      </div>
                                      <div class="form-group">
                                        <label>联系电话<small>(推荐使用手机)</small></label>
                                        <input name="phone" type="text" class="form-control" placeholder="联系电话">
                                      </div>
                                      <div class="form-group">
                                        <label>联系QQ <small>(QQ)</small></label>
                                        <input name="qqnum" type="text" class="form-control" placeholder="输入联系QQ号">
                                      </div>
                                      <div class="form-group">
                                        <label>详细信息 <small>(描述)</small></label>
                                        <textarea name='buy_desc' class='form-control' rows='7'></textarea>
                                      </div>
			 	</div>
			</div>
		</div>
	</div>
	<div style="text-align:center;padding:5px">
	<button type="submit" class="btn btn-block btn-success">确认发布</button>
	</div>
		
	</form>
</div>