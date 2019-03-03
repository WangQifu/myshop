<?php foreach ($share as $s)?>
<div class="container">
	<div class="row clearfix">
<div class="panel panel-default">
		 <div class="panel-heading">发布</div>
          <div class="panel-body">
            <form role="form" method="post" action="index.php?control=addDB&action=accountSharePost&type=up&sid=<?php echo $s["id"];?>">
			  <div class="form-group">
                <label>标题 <small></small></label>
                <input name="title" type="text" class="form-control" value="<?php echo $s["a_title"];?>">
              </div>
              <div class="form-group">
                <label>游戏名称 <small></small></label>
                <input name="game_name" type="text" class="form-control" value="<?php echo $s["game_name"];?>">
              </div>
              <div class="form-group">
                <label>所在区服 <small></small></label>
                <input name="g_servers" type="text" class="form-control" value="<?php echo $s["g_servers"];?>">
              </div>
              <div class="form-group">
                <label>账号运营商 <small>(例：网易、QQ、微信、其它)</small></label>
                <input name="account_operator" type="text" class="form-control" value="<?php echo $s["account_operator"];?>">
              </div>
              <div class="form-group">
                <label>账号<small>(共享、出租)</small></label>
                <input name="accountnuber" type="text" class="form-control" value="<?php echo $s["accountnuber"];?>">
              </div>
              <div class="form-group">
                <label>密码<small>(多重加密保存)</small></label>
                <input name="password" type="password" class="form-control" value="<?php echo $password;?>">
              </div>
              <div class="form-group">
                <label>价格<small></small></label>
                <div class="input-group">
                  <span class="input-group-addon">¥</span>
                  <input name="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $s["price"];?>">
                  <span class="input-group-addon">.00/天</span>
                </div>
              </div>
              <div class="form-group">
                <label>联系电话<small>(手机号)</small></label>
                <input name="phone" type="text" class="form-control" value="<?php echo $s["phone"];?>">
              </div>
              <div class="form-group">
                <label>联系QQ<small>(选填)</small></label>
                <input name="QQ" type="text" class="form-control" value="<?php echo $s["QQ"];?>">
              </div>
              <div class="form-group">
                <label>联系微信<small>(选填)</small></label>
                <input name="weixin" type="text" class="form-control" value="<?php echo $s["weixin"];?>">
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
        </div>