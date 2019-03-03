<?php
?>
<div class="easyui-panel" title="添加" style="width: 100%; height:100%">
<?php 
echo "添加"."<br>";
foreach ($title as $t)
{
	
	echo $t["add_title"]."<br>";
}
?>
	<form id="ff" method="post" action="index.php?control=db_insert&action=setRowTitle">
		
		<input type="hidden" name="game_id" value="<?php echo $gid;?>" />
		<div>
		<select name='row_id' class='form-control'>
		<?php 
			foreach ($title as $t)
			{
			?>
				<?php 	
				echo "<option value='".$t["id"]."'>".$t["add_title"]."</option>";
					}
				?>
		</select>
		<label for="name">添加:</label>
		<input class="easyui-validatebox" type="text"  class="easyui-textbox" name="add_title" data-options="required:true" />
		</div>
		
	</form>
	<div style="text-align:center;padding:5px">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">保存</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
	</div>
</div>
<script>
		function submitForm(){
		  $(".hideControl").each(function(){
		  	var inputName=$(this).attr("name");
		  	eval("var getValue=ue_"+inputName+".getContent();");
		   	
		  	$(this).val(getValue);
		  })
		 
			$('#ff').form('submit',{
				success:function(result)
				{
					if (result)
					{
						alert(result);
 						//window.location.href="index.php?control=db_insert&action=setRowTitle";
 						self.location.reload();//刷新当前页面
					}
					
				}
			});
		}
		function clearForm(){
			$('#ff').form('clear');
			self.location.reload();//刷新当前页面
		}
	</script>

