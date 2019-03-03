<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="tabbable" id="tabs-126011">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-2542903" data-toggle="tab">陪练信息</a>
					</li>
					<li>
						<a href="#panel-9177652" data-toggle="tab">找陪练</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-2542901">
						<div class="row clearfix">
                            		<div class="col-md-12 column">
                            		  <?php 
                            		      foreach ($peilian as $d)
                            		      {
                            		  ?>
                            			<div class="media well">
                                			<p>
                                			    <a href="#" target="_blank" class="pull-left"><img src="<?php echo $d["iconimg"];?>" width="30px" class="media-object" alt="爱游资讯" /> </a><?php echo $d["dnick"]."【".$d["fuwu_shijian"]."】";?>
                                			</p>
                            				 
                            				<div class="media-body">
                            					<p>
                            					   <?php echo $d["desc_ms"];?>
                            					</p>
                            					<p>
                            					   联系电话：<?php echo $d["phone"];?> QQ： <?php echo $d["QQ"];?> 微信：<?php echo $d["weixin"];?>
                            					</p>
                            					
                            				</div>
                            			</div>
                            			<?php 
                                            }
                            			?>
                            		</div>
                            	</div>
					</div>
					<div class="tab-pane" id="panel-9177652">
						<form id="ff" method="post" action="index.php?control=kefuC&action=issuePeilian">
                        	<div class="row clearfix">
                        		<div class="col-md-12 column">
                        				<div class="panel panel-default">
                        				  <div class="panel-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span>填写陪练信息</div>
                        				  <div class="panel-body">
                        				                    <div class="form-group">
                                                                <label>选择平台 <small>(安卓/苹果)</small></label>
                                                                <select name="game_type" class="form-control">
                                                                        <option value="安卓"> 安卓 </option>
                                                                        <option value="苹果"> 苹果</option>
                                                                        <option value="电脑"> 电脑</option>
                                                                        <option value="页游"> 页游</option>
                                                                        <option value="其它"> 其它</option>
                                                                    </select>
                                                              </div>
                        				  					 <div class="form-group">
                                                                <label>游戏名称<small>(游戏)</small></label>
                                                                <input name="game_name" type="text" class="form-control" placeholder="输入游戏名称">
                                                              </div>

                        									  <div class="form-group">
                                                                <label>游戏账号<small>(加密保存)</small></label>
                                                                <input name="game_users" type="text" class="form-control" placeholder="账号">
                                                              </div>
                                                              
                                                              <div class="form-group">
                                                                <label>陪练区<small>(大区)</small></label>
                                                                <input name="game_region" type="text" class="form-control" placeholder="服务器-大区">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>陪练角色<small>(角色名)</small></label>
                                                                <input name="game_nick" type="text" class="form-control" placeholder="角色昵称">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>任务要求 <small>(代练任务)</small></label>
                                                                <input name="dailian_renwu" type="text" class="form-control" placeholder="任务">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>陪练天数 <small></small></label>
                                                                <input name="dailian_task" type="number" class="form-control" placeholder="/天">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>价格<small></small></label>
                                                                <input name="price" type="text" class="form-control" placeholder="价格">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>联系手机 <small></small></label>
                                                                <input name="phone" type="number" class="form-control" placeholder="手机">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>联系QQ<small></small></label>
                                                                <input name="QQ" type="number" class="form-control" placeholder="QQ">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>联系微信 <small></small></label>
                                                                <input name="weixin" type="text" class="form-control" placeholder="微信">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>其它说明<small>（描述）</small></label>
                                                                <textarea name='desc_ms' class='form-control' rows='7'></textarea>
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
					<div class="tab-pane" id="panel-2542903">
						<div class="row clearfix">
                            		<div class="col-md-12 column">
                            		  <?php 
                            		      foreach ($peilian_msg as $d)
                            		      {
                            		  ?>
                            			<div class="media well">
                                			<p>
                                			    <a href="#" target="_blank" class="pull-left"><img src="<?php echo $d["iconimg"];?>" width="30px" class="media-object" alt="爱游资讯" /> </a><?php echo "【".$d["game_type"]."】".$d["game_name"];?>
                                			</p>
                            				 
                            				<div class="media-body">
                            					<p>
                            					   <?php echo $d["peilian_renwu"];?>
                            					</p>
                            					<p>
                            					   联系电话：<?php echo $d["phone"];?> QQ： <?php echo $d["QQ"];?> 微信：<?php echo $d["weixin"];?>
                            					</p>
                            					
                            				</div>
                            			</div>
                            			<?php 
                                            }
                            			?>
                            		</div>
                            	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
