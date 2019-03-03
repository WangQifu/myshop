<?php
if (count($row)==0)
{
	echo "无需要审核的内容";
}
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			
			<?php 
			foreach ($row as $tb)
			{
			    if ($lxtype == "dl")
			    {
			?>
			 <table cellpadding="5">
			    		<tr>
			    			<td>用户：<?php echo $tb["username"];?></td>
			    			
			    		</tr>
			    		<tr>
			    			<td>
			    				昵称【<?php echo $tb["dnick"];?>】	 
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				代练游戏id:<?php echo $tb["gameid"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				申请时间:<?php echo $tb["sq_timer"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				在线时间:<?php echo $tb["fuwu_shijian"];?><br>
			    			</td>
			    		</tr>
			 
			    		<tr>
			    			<td>
			    				客服押金:<?php echo $tb["dailian_yajin"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				缴纳金额:<?php echo $tb["dailian_yajin"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				描述:<?php echo $tb["desc_ms"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				手机:<?php echo $tb["phone"];?>|QQ:<?php echo $tb["QQ"];?>|微信:<?php echo $tb["weixin"];?><br>
			    			</td>
			    		</tr>
				</table>
				<a href="index.php?control=auditC&action=dailian_audic&did=<?php echo $tb["id"];?>&type=dailian_sh" class="btn btn-info">通过审核</a>
				<a href="index.php?control=auditC&action=dailian_audic&did=<?php echo $tb["id"];?>&type=dailian_no" class="btn btn-info">失败审核</a>
			<?php }else {?>
				<table cellpadding="5">
			    		<tr>
			    			<td>用户：<?php echo $tb["username"];?></td>
			    			
			    		</tr>
			    		<tr>
			    			<td>
			    				客服昵称【<?php echo $tb["kefunick"];?>】	 
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				服务游戏id:<?php echo $tb["gameid"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				申请时间:<?php echo $tb["sq_timer"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				在线时间:<?php echo $tb["fuwu_shijian"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				客服类型:<?php echo $tb["kefu_type"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				客服押金:<?php echo $tb["kefu_yajin"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				缴纳金额:<?php echo $tb["kefu_type"]+$tb["kefu_yajin"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				手机:<?php echo $tb["phone"];?>|QQ:<?php echo $tb["QQ"];?>|QQ:<?php echo $tb["weixin"];?><br>
			    			</td>
			    		</tr>
				</table>
				<a href="index.php?control=auditC&action=kefu_audic&kid=<?php echo $tb["id"];?>&type=kefu_sh" class="btn btn-info">通过审核</a>
				<a href="index.php?control=auditC&action=kefu_audic&kid=<?php echo $tb["id"];?>&type=kefu_no" class="btn btn-info">失败审核</a>
			<?php }
			}?>
		</div>
	</div>
</div>
