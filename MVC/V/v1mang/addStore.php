<?php
// echo '{user_id}';//静态方法替换取出
// echo $user_id;//
// echo $user_name;//extract方法取出
$user_store = the_user();

?>
<div class="easyui-panel" title="添加商品" style="width: 100%; height:100%">
	<div style="padding: 10px 60px 20px 60px">
		<form id="store" method="post">
			<table cellpadding="5">
	    		{foreach:tbSet name="tb"}
	    		<tr>
	    			<td>{genInputLabel('tb.COLUMN_COMMENT')}</td>
	    			<td>
	    				{genInput('tb.DATA_TYPE','tb.IS_NULLABLE','tb.COLUMN_NAME','tb.CHARACTER_MAXIMUM_LENGTH','tb.COLUMN_COMMENT')} 	 
	    			</td>
	    		</tr>
	    		{/endforeach}
	    		
			</table>
		
		</form>
		 <div style="text-align:center;padding:5px">
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">确认</a>
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
	    </div>
	    </div>
	
</div>
<script>
		function submitForm(){
		  $(".hideControl").each(function(){
		  	var inputName=$(this).attr("name");
		  	eval("var getValue=ue_"+inputName+".getContent();");
		   	
		  	$(this).val(getValue);
		  })
		 
			$('#store').form('submit',{
				success:function(result)
				{
					alert(result);
				}
			});
		}
		function clearForm(){
			$('#store').form('clear');
		}
</script>