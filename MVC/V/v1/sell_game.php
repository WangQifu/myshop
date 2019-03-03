<?php
//出售游戏
?>
<div class="container">
	<form id="ff" method="post" action="index.php?control=gameC&action=sellGame&type=ad">
	{foreach:game name="tb"}
	<div class="row clearfix">
		<div class="col-md-12 column">
			<input type="hidden" name="game_id" value="{tb.id}" />
			<input name="game_name" type="hidden" value="{tb.appname}">
			<input name="game_type" type="hidden" value="{tb.game_type}">
			<input name="image" type="hidden" value="{tb.icon720}">
				<div class="panel panel-default">
				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>填写信息</div>
				  <div class="panel-body">
				  <div > 
					<div class="row clearfix">
						<div class="col-md-12 column text-center">
							<img width="140" alt="140x140" src="{tb.icon720}" class="img-rounded" />
							<h3>
								{tb.appname}
							</h3>
						</div>
					</div>				  
				  </div>
									  <div class="form-group">
                                        <label>出售类型 <small>(账号/装备/金币)</small></label>
                                        <select name="game_account" class="form-control">
                                                <option value="账号"> 账号 </option>
                                                <option value="装备"> 装备 </option>
                                                <option value="游戏币">游戏币</option>
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
                                        <?php if (count($t1) > 0){?>
                                        <select name="client" class="form-control">
                                        <?php 
                                       	 	foreach ($t1 as $r){
                                        		echo "<option value='".$r."'>".$r."</option>";
                                        	}
                                        ?>
                                            </select>
                                            <?php }
                                                  else 
                                                  {
                                                      echo "<input name='client' type='text' class='form-control' placeholder='输入运营商/服务器'>";
                                                  }
                                                ?>
                                      </div>
                                      <div class="form-group">
                                        <label>所属服务器 <small>(大区)</small></label>
                                        <?php if (count($t2) > 0){?>
                                        <select name="region" class="form-control">
                                        <?php 
                                        	foreach ($t2 as $r){
                                        		echo "<option value='".$r."'>".$r."</option>";
                                        	}
                                        
                                        ?>
                                    
                                            </select>
                                            <?php }
                                                  else 
                                                  {
                                                      echo "<input name='region' type='text' class='form-control' placeholder='输入所在大区'>";
                                                  }
                                                ?>
                                      </div>		
			 	</div>
			</div>
		</div>
	</div>
				
	{/endforeach}
	<div style="text-align:center;padding:5px">
	<button type="submit" class="btn btn-block btn-success">下一步</button>
	</div>
	</form>
</div>