<?php
if (count($row)==0)
{
	echo "无需要审核的内容";
}
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		{foreach:row name="tb"}
				<table cellpadding="5">
			    		<tr>
			    			<td>用户：{tb.user_name}</td>
			    			
			    		</tr>
			    		<tr>
			    			<td>
			    				发布游戏【{tb.game_name}】	 
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				游戏端:{tb.game_type}<br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				出售类型:{tb.game_account}<br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				标题:{tb.shop_title}<br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				售价:{tb.price}<br>
			    			</td>
			    		</tr>
				</table>
				<a href="index.php?control=auditC&action=audit_m&gid={tb.id}&type=game" class="btn btn-info">通过审核</a>
				<a href="index.php?control=auditC&action=audit_m&gid={tb.id}" class="btn btn-info">失败审核</a>
			{/endforeach}
			
			<?php 
			foreach ($row_sh as $tb)
			{
			    
			?>
				<table cellpadding="5">
			    		<tr>
			    			<td>用户：<?php echo $tb["user_id"];?></td>
			    			
			    		</tr>
			    		<tr>
			    			<td>
			    				发布游戏【<?php echo $tb["game_name"];?>】	 
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				游戏端:<?php echo $tb["game_type"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				收购类型:<?php echo $tb["buy_type"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				描述:<?php echo $tb["buy_desc"];?><br>
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				售价:<?php echo $tb["price"];?><br>
			    			</td>
			    		</tr>
				</table>
				<a href="index.php?control=auditC&action=audit_m&gid=<?php echo $tb["id"];?>&type=game_sh" class="btn btn-info">通过审核</a>
				<a href="index.php?control=auditC&action=audit_m&gid=<?php echo $tb["id"];?>" class="btn btn-info">失败审核</a>
			<?php }?>
		</div>
	</div>
</div>