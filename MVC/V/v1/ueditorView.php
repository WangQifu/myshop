<?php
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>文章编辑</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="jq.js"> </script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
    <link rel="stylesheet" href="ueditor/themes/default/css/ueditor.css" rel="external nofollow" > 
    
</head>
<body>
<script type="text/javascript"> 
//window.UEDITOR_HOME_URL='ueditor/';//此为ueditor相对于实例页面的路径 
</script> 

<div id="myEditor"></div>
<script type="text/javascript">  
var editor = new baidu.editor.ui.Editor(); 
editor.render("myEditor");
</script> 
<div>
    <button onclick="getContent()">获得内容</button>
</div>
<script type="text/javascript">
function getContent() {
    var arr = [];
    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
    arr.push("内容为：");
    arr.push(UE.getEditor('myEditor').getContent());
    var htm = UE.getEditor('myEditor').getContent();
    ajx(htm);
    alert(arr.join("\n"));
}
function ajx(v)
{
	$.ajax({
        type: "post",
        url: "wenz/filehtml.php",
        data: {"msg":v},//提交到demo.php的数据
        dataType: "json",//回调函数接收数据的数据格式
        success: function(msg){
          
          var data='';
          if(msg!=''){
            data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
          }
         alert("用户名为：" + data.code_msg);    //在#text中输出
          console.log(data);    //控制台输出
          alert("用户名为：" + data.code_msg);
        },
        error:function(msg){
          console.log(msg);
        }
  });
}
</script>
</body>
</html>
