<?php
// <script type="text/javascript">
// $(document).ready(function(){
// 	var spotMax = 30;
// 	if($('div.spot').size() >= spotMax) {$(obj).hide();}
// 	$("input#add").click(function(){     addSpot(this, spotMax);
// 	});
// });
	
// 	function addSpot(obj, sm) {
// 		$('div#spots').append(
// 				'<div class="spot">' +
// 				'<input type="text" name="add_title" placeholder="输入栏目"/> ' +
// 				'<input type="button" class="remove" value="删除" /></div>')
// 				.find("input.remove").click(function(){
// 					$(this).parent().remove();
// 					$('input#add').show();
// 				});
					
// 					if($('div.spot').size() >= sm) {$(obj).hide();}
// 	};
// 	</script>
	
// 	<form action="test.php" method="post"  name="asdf" id="asdf">
	
// 	<div id="spots">
// 	<input type="button" id="add" name="add" value="添加标题" /><br />
// 	</div>
	
// 	<input type="button" name="Submit" value="确认发布" id="send" />
// 	</form>
// 	<script>
// 	$('#send').click(function(){
// 		alert('Demonstration Only: submit disabled');
// 	});
// 		</script>
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
		<input type="hidden" name="row_id" value="<?php echo $rid;?>" />
		<div>
		<label for="name">添加标题:</label>
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

