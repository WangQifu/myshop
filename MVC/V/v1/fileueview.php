<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
                <input type="hidden" id="gid" name="gid" value="<?php echo $_GET["gid"];?>"/>
			    <div class="form-group">
					 <label for="">游戏名称：</label><input type="text" class="form-control" id="gamename" name="gamename" value="<?php if ($_GET["gname"]){ echo $_GET["gname"];}?>"/>
				</div>
				<div class="form-group">
					 <label for="">文章类型：</label>
					 <div class="dropdown" >
                        <select name="type" id="type">
                        <option value="新闻资讯">新闻资讯</option>
                        <option value="教程">教程</option>
                        <option value="攻略">攻略</option>
                        <option value="活动信息">活动信息</option>
                        </select>	 
                    </div>
				</div>
				<div class="form-group">
					 <label for="">文章标题：</label><input type="text" class="form-control" id="title" name="title"/>
				</div>
				<div class="form-group">
					 <label for="">关键字：</label><input type="text" class="form-control" id="key" name="key"/>
				</div>
				<div class="form-group">
					 <label for="">内容：</label>
					 <div id="myEditor"></div>
                    <script type="text/javascript">  
                    var editor = new baidu.editor.ui.Editor(); 
                    editor.render("myEditor");
                    </script>
				</div>
				
				<div class="form-group">
                    <button id="btn" class="btn btn-success btn-block" onclick="getContents()">发表文章</button>
                </div>

			 
		</div>
	</div>
</div>

<script type="text/javascript">

function getContents() {
    var htm = UE.getEditor('myEditor').getContent();
    if(htm)
    {
    	posts(htm);
    }
    else
    {
    	alert("请输入内容");
    }
    //
}
function posts(v)
{
	var title=$('#title').val();
	var key=$('#key').val();
	var name=$('#gamename').val();
	var gid=$('#gid').val();
	var type=$('#type').val();
	//ajx方式提交
	$.post("./ueup/newfile/filehtml.php", 
			{"msg":v,"title":title,"key":key,"name":name,"gid":gid,"type":type}, 
			function(result){
				alert(result);
				self.location.reload();//刷新当前页面
		})
}
</script>