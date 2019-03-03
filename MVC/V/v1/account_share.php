<div class="container">
	<div class="row clearfix">
		
		<div class="col-md-6 column">
		<div class="panel panel-default">
		 <div class="panel-heading">发布</div>
          <div class="panel-body">
            <form role="form" method="post" action="index.php?control=addDB&action=accountSharePost">
			  <div class="form-group">
                <label>标题 <small></small></label>
                <input name="title" type="text" class="form-control" placeholder="描述一下">
              </div>
              <div class="form-group">
                <label>游戏名称 <small></small></label>
                <input name="game_name" type="text" class="form-control" placeholder="游戏">
              </div>
              <div class="form-group">
                <label>所在区服 <small></small></label>
                <input name="g_servers" type="text" class="form-control" placeholder="描述一下">
              </div>
              <div class="form-group">
                <label>运营商 <small>(例：网易、QQ、微信、其它)</small></label>
                <input name="account_operator" type="text" class="form-control" placeholder="共享、出租、账号">
              </div>
              <div class="form-group">
                <label>账号<small>(共享、出租)</small></label>
                <input name="accountnuber" type="text" class="form-control" placeholder="账户密码">
              </div>
              <div class="form-group">
                <label>密码<small>(多重加密保存)</small></label>
                <input name="password" type="password" class="form-control" placeholder="账户密码">
              </div>
              <div class="form-group">
                <label>价格<small></small></label>
                <div class="input-group">
                  <span class="input-group-addon">¥</span>
                  <input name="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">.00/天</span>
                </div>
              </div>
              <div class="form-group">
                <label>联系电话<small>(手机号)</small></label>
                <input name="phone" type="text" class="form-control" placeholder="手机号">
              </div>
              <div class="form-group">
                <label>联系QQ<small>(选填)</small></label>
                <input name="QQ" type="text" class="form-control" placeholder="QQ号">
              </div>
              <div class="form-group">
                <label>联系微信<small>(选填)</small></label>
                <input name="weixin" type="text" class="form-control" placeholder="微信号">
              </div>
				<div class="form-group">
                <label>详细信息 <small>(描述)</small></label>
                <textarea name='describe' class='form-control' rows='5'></textarea>
                </div>
                <div class="" style="text-align:center;padding:5px">
                    <button type="submit" class="btn btn-default">确认</button>
                </div>
			</form>
          </div>
          <div class="panel-footer" style="text-align:center;padding:5px">
            
          </div>
        </div>
			
		</div>
		
		<div class="col-md-6 column">
		<div class="panel panel-default">
		 <div class="panel-heading">预览</div>
		 
          <div class="panel-body">
		  <div class="row clearfix">
            		<div class="col-md-12 column">
            		  <?php 
            		      foreach ($share as $d)
            		      {
            		  ?>
            		    <div class="panel panel-default">
                          <div class="panel-heading">
                          <span class="label label-default"><?php if ($d["price"]<1) echo "免费";?></span> <?php echo $d["a_title"];?>
                          <a href="index.php?control=deleteC&action=deleteShareRowC&did=<?php echo $d["id"];?>&type=delete" class="pull-right">删除></a>
                          </div>
                          <div class="panel-body">
                                <p>
            					    <?php echo $d["game_name"];?><?php if ($d["g_servers"])echo "【".$d["g_servers"]."】";?>
            					</p>
            	
            					<div class="well">
            					<?php echo $d["desc_ribe"];?>
            					</div>
            					<p>
                                    <?php if ($d["price"]>1) echo "¥ ".$d["price"]."/天";?>
            					</p>
                          </div>
                          <div class="panel-footer">
                          <?php if (!the_user()){?>
                            <a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' class="btn btn-block" type="button">登录才能申请使用</a>
                            <?php 
                            }
                            else 
                            {
                            ?>
                            <a href="index.php?control=query_c&action=share_alter&sid=<?php echo $d["id"];?>&states=alter" class="btn btn-block" type="button">修改</a>
                            <?php }?>
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