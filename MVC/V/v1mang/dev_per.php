<?php
?>
<div class="easyui-panel" title="开发者资料" style="width: 100%; height:100%">
	<div style="padding: 10px 60px 20px 60px">
		<form id="ff" method="post" action="index.php?control=devloperC&action=form">
		<input type="hidden" name="did" value="<?php echo $did;?>" />
			<table cellpadding="5">
				
	    		{foreach:tbSet name="tb"}
	    		<tr>
	    			<td>{genInputLabel('tb.COLUMN_COMMENT')}</td>
	    			<td>
	    				{genInput('tb.DATA_TYPE','tb.IS_NULLABLE','tb.COLUMN_NAME','tb.CHARACTER_MAXIMUM_LENGTH','tb.COLUMN_COMMENT',null,null)} 	 
	    			</td>
	    		</tr>
	    		{/endforeach}
	    		
			</table>
		
		</form>
		 <div style="text-align:center;padding:5px">
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">保存</a>
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
		 
			$('#ff').form('submit',{
				success:function(result)
				{
					if (result)
					{
						alert(result);
 						
					}
					
				}
			});
		}
		function clearForm(){
			$('#ff').form('clear');
		}
	</script>