<?php
?>
<table border="1">
  <tr>
    <td>优惠券</td>
    <td>额度/折扣</td>
    <td>商家</td>
  </tr>
   <?php
    if (count($ret)>0)
    {
    foreach ($ret as $g)
	{?>
  <tr>
    <td><?php echo $g["title"];?></td>
    <td><?php echo $g["money"];?></td>
    <td><?php echo $g["merchant"];?></td>
  </tr>
  <?php }
	}?> 		
</table>
<div class="easyui-panel" title="添加优惠券" style="width: 100%; height:100%">
	<form id="ff" method="post" action="index.php?control=dealC&action=addCoupon">
		<div>
		<label for="name">优惠券类型:</label>
		<input class="easyui-validatebox" type="text" name="type" data-options="required:true" />
		</div>
		<div>
		<label for="name2">描述:</label>
		<input class="easyui-validatebox" type="text" name="title" data-options="required:true" />
		</div>
		<div>
		<label for="name2">抵用金额:</label>
		<input class="easyui-validatebox" type="text" name="money" data-options="required:true" />
		</div>
		<div>
		<label for="name3">消费满多少使用:</label>
		<input class="easyui-validatebox" type="text" name="condition" data-options="required:true" />
		</div>
		<div>
		<label for="name4">有效期:</label>
		<input type="text"  class="easyui-datetimebox" name="endtime" data-options="required:true" />
		</div>
	</form>
	<div style="text-align:center;padding:5px">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">保存</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
	</div>
</div>
<script>
		function submitForm(){
		 
			$('#ff').form('submit',{
				success:function(result)
				{
					if (result)
					{
						alert(result);
 						//window.location.href="index.php?control=db_insert&action=setRowTitle";
 						//self.location.reload();//刷新当前页面
					}
					
				}
			});
		}
		function clearForm(){
			$('#ff').form('clear');
			self.location.reload();//刷新当前页面
		}
	</script>