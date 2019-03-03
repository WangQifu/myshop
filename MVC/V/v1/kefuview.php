
<div class="container">
	<div class="row clearfix">
		<div class="col-md-4 column">
		<img alt="140x140" src="uploadimg/userimg/kefushoufeibiao2017.png" class="img-thumbnail" />
		
		</div>
		<div class="col-md-4 column">
		    <div class="divcenter">
		      <img alt="客服头像" src="uploadimg/iconimg/usericon.png" class="img-circle img-thumbnail" />
		    </div>
			
			<dl class="dl-horizontal">
			<?php
            foreach ($kefu as $row)
            {
             
            ?>
				<dt>
					服务游戏：
				</dt>
				<dd>
					<?php echo $gamename;?>
				</dd>
				<dt>
					服务时段：
				</dt>
				<dd>
					<?php echo $row["fuwu_shijian"];?>
				</dd>
				<dt>
					开通类型：
				</dt>
				<dd>
					<?php 
					   if ($row["kefu_type"]==0)
					   {
					       echo "普通客服 （免费）";
					   }
					   if ($row["kefu_type"]==15)
					   {
					       echo "白银客服（15元/每月）";
					   }
					   if ($row["kefu_type"]==30)
					   {
					       echo "黄金客服（30元/每月）";
					   }
					   if ($row["kefu_type"]==60)
					   {
					       echo "铂金客服（60元/每月）";
					   }
					   if ($row["kefu_type"]==88)
					   {
					       echo "砖石客服（88元/每月）";
					   }
					
					?>
				</dd>
				<dt>
					保证押金：
				</dt>
				<dd>
					¥ <?php echo $row["kefu_yajin"];?> 元
				</dd>
				<dt>
					联系电话：
				</dt>
				<dd>
					<?php echo $row["phone"];?>
				</dd>
				<dt>
					QQ：
				</dt>
				<dd>
					<?php echo $row["QQ"];?>
				</dd>
				<?php if ($row["weixin"])
				{?>
				<dt>
					微信：
				</dt>
				<dd>
					<?php echo $row["weixin"];?>
				</dd>
				<?php }?>
				<?php if ($row["state_zt"] == "申请")
				{?>
				<dt>
					状态：
				</dt>
				<dd>
					审核中
				</dd>
				<?php }?>
				(注：需要缴纳：客服类型费(¥)1月+服务押金(¥)=<?php echo $row["kefu_type"]+$row["kefu_yajin"];?>元)
			<?php }?>
			</dl>
		</div>
		<div class="col-md-4 column">
		  <div class="row">
			<div class="thumbnail">
				<img alt="734500064" src="uploadimg/userimg/qrcode_734500064.jpg" width="180px"/>
				<div class="caption">
					<h5>
						开通客服联系QQ：734500064/1057770701
					</h5>
					<p>
						微信号：WQFor8082
					</p>
				</div>
			</div>
		 </div>
	</div>
</div>
