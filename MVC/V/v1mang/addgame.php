<?php
// <label for="ver">版本号:</label>
// <input class="easyui-validatebox" type="text"  class="easyui-textbox" name="versions" data-options="required:true" />
// </div>
// <div>
// <label for="pack">包   名:</label>
// <input class="easyui-validatebox" type="text"  class="easyui-textbox" name="package" data-options="required:true" />
// </div>
?>
<div class="easyui-panel" title="添加" style="width: 100%; height:100%">
	<form id="ff" method="post" action="index.php?control=devloperC&action=form">
		<input type="hidden" name="did" value="up" />
		
		<div class="group">
               <label>平台 <small>(端游/手游)</small></label>
                     <select name="game_type" class="form-control">
                     <option value="手游"> 手游 </option>
                     <option value="端游"> 端游 </option> 
                     <option value="页游"> 页游 </option>
             
                    </select>
        </div>
        
        <div  class="nameinput">
		<label for="name">游戏名:</label>
		<input class="easyui-validatebox" type="text"  class="easyui-textbox" name="appname" data-options="required:true" />
		</div>
		
		<div class="btn">
		<span>应用图标</span>
		<input id="fileupload" type="file" name="mypic">
		</div>
		<div class="progress">
		<span class="bar"></span><span class="percent">0%</span >
		</div>
		<div class="files"></div>
		<div id="showimg"></div>
        
		<div>
		<label for="key">首字母/大写:</label>
		<input class="easyui-validatebox" type="text"  class="easyui-textbox" name="szm" data-options="required:true" />
		</div>
		<div>
		<label for="key">关键字:</label>
		<input class="easyui-validatebox" type="text"  class="easyui-textbox" name="keyword" data-options="required:true" />
		</div>
	</form>
	<div style="text-align:center;padding:5px">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">保存</a>
	
	</div>
</div>
<script type="text/javascript">
$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
	$("#fileupload").wrap("<form id='myupload' action='upLoadAction.php' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		showimg.empty();
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
				btn.html("上传中...");
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				
				//files.html("<b>"+data.name+"("+data.size+"k)</b>");
				//获得后台返回的json数据，显示文件名，大小，以及删除按钮 
                files.html("<b>"+data.name+"("+data.size+"k)</b><span class='delimg' rel='"+data.pic+"'>删除</span>"); 
                
				var img = "uploadimg/iconimg/"+data.pic;
				showimg.html("<img src='"+img+"'/><input type='hidden' name='icon720' value='"+img+"' />");
				btn.html("修改");
				progress.show();
			},
			error:function(xhr){
				btn.html("上传失败");
				bar.width('0')
				files.html(xhr.responseText);
			}
		});
	});
    
    
	$(".files").on('click','.delimg',function(){
		var pic = $(this).attr("rel");
		$.post("upLoadAction.php?act=delimg",{imagename:pic},function(msg){
			if(msg==1){
				files.html("删除成功.");
				btn.html("选择图标");
				showimg.empty();
				self.location.reload();//刷新当前页面
			}else{
				alert(msg);
			}
		});
	});

	$('.btn').on('input',".mypic", function(){//同步查询
		var value =$(" input[ name='appname' ] ").val();
		
    });
});
</script>

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
 						//window.location.href="index.php?control=devloperC&action=form";
 						self.location.reload();//刷新当前页面
					}
					
				}
			});
		}
		function clearForm(){
			//<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
			$('#ff').form('clear');
			self.location.reload();//刷新当前页面
		}
</script>