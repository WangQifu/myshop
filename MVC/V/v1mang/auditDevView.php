<?php
?>
<script>
$(function(){
	$("#example1").imgbox();
	$("#example2").imgbox({
		'speedIn'		: 0,
		'speedOut'		: 0,
		'alignment'		: 'center',
		'overlayShow'	: true,
		'allowMultiple'	: false
	});
});
</script>

	<style>
		a{color:#FFFFFF}
		
	</style>
	<table id="tb" class="easyui-datagrid" title="开发者审核" style="width:100%;height:70%"
			data-options="pagination:true,
			singleSelect:true,collapsible:true,
			url:'index.php?control=manage&action=devper_audit',
			method:'get',rownumbers:'true'">
		<thead>
			<tr>
				<th data-options="field:'devacc',width:80">申请账号</th>
				<th data-options="field:'devname',width:200">申请人/企业</th>
				<th data-options="field:'works',width:200">出品人</th>
				<th data-options="field:'IDNum',width:200">证件号</th>
				<th data-options="field:'email',width:80,align:'right'">电子邮箱</th>
				<th data-options="field:'phone',width:80,align:'right'">联系信息</th>
				<th data-options="field:'audit',width:80,align:'right'"  formatter="isPub">状态</th>
				<th data-options="field:'addtime',width:100">申请时间</th>
				<th data-options="field:'photo',width:100" formatter="photo_img">证件照</th>
				<th data-options="field:'id',width:60,align:'center'" formatter="showEdit">操作</th>
			</tr>
		</thead>
	</table>
	<div id="showimg"></div>
	 <script>
	 function isPub(val,row)
	 {
	 	if(val==1)
	 	return "已审核";
	 	return "待审核";
	 }
	 function showEdit(val,row)
	 {
	 	return "<a href='index.php?control=manage&action=upper_audit&id="+val+"' color='#999999'>通过</a>";//"<a href='/?id="+val+"' color='#666'>编辑</a>"
	 }
	 function photo_img(val,row)
	 {
		return "<a id='example1' href='upload_img/"+val+"'><img src='upload_img/"+val+"' width='100' height='65' /></a>";//"upload_img/"+val+"'";//
		 //var url = "upload_img/"+val+;
		 //return "<a href='upload_img/"+val+"'>预览</a>"
	 }
	 function update(val)
	 {
		 alert(val);
// 		 url:"index.php?control=devloperC&action=upper_audit",
// 			onClick:function(ret){
// 				 alert(ret);	
// 				}
	 }
	 $(function(){
	 	//以下是对分页控件的处理
	 	 var p = $('#tb').datagrid('getPager');  
	 	 $(p).pagination({ 
     	 pageSize:10,
         pageList: [2,10,20],//可以设置每页记录条数的列表 
         beforePageText: '第',//页数文本框前显示的汉字 
         afterPageText: '页    共 {pages} 页', 
         displayMsg: '当前显示 {from} - {to} 条记录   共 {total} 条记录' 
      
    	});  
    });
	 </script>
	 <script>
	   var flag = true,//状态true为正常的状态,false为放大的状态
	           imgH,//图片的高度
	           imgW,//图片的宽度
	           img = document.getElementsByTagName('img')[0];//图片元素
	  img.onclick =  function(){
	      //图片点击事件
	       imgH = img.height; //获取图片的高度
	       imgW = img.width; //获取图片的宽度
	       if(flag){
	           //图片为正常状态,设置图片宽高为现在宽高的2倍
	           flag = false;//把状态设为放大状态
	           img.height = imgH*2;
	           img.width = imgW*2;
	       }else{
	           //图片为放大状态,设置图片宽高为现在宽高的二分之一
	           flag = true;//把状态设为正常状态
	           img.height = imgH/2;
	           img.width = imgW/2;
	       }
	 
	   }
</script>