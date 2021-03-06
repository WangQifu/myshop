<?php
$getStore = the_store(); 

?>
<script>
	$(document).ready(function(){

			function addTab(title, url)
			{
				if($('#mytab').tabs('exists', title))
				{
					$('#mytab').tabs('select', title);
				}
				else{
					var content = '<iframe scrolling="no" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
			        $('#mytab').tabs('add',{
			            title:title,
			            content:content,
			            closable:true
			        });
				}
			}
			//加载树型菜单
			$("#mytree").tree({
					url:"index.php?control=m_index&action=user_m_tree",
					onClick:function(node){
						
    						if(node.attributes && node.attributes.url)
    						{
    							//alert(node.attributes.url);
    							addTab(node.text,node.attributes.url);
    						}
    							
						}
				})
		})
</script>
 
	  <style>
	   .tabs-panels{height:100%;}
	  </style>
		<div data-options="region:'north'" style="height:50px;line-height:21pt;height:41pt;text-indent:2em;font-size:28px">
		店铺管理</div>
	 
		 
		<div data-options="region:'west',split:true" title="管理" style="width:220px;">
			
			  <div class="easyui-accordion" data-options="fit:true,border:false">
				<div title="基础信息管理" style="padding:10px;" data-options="selected:true">
					<ul class="easyui-tree" id="mytree">
			
		        	</ul>
				</div>
				<div title="权限管理"  style="padding:10px;">
					
					<?php 
						echo $getStore->store_id;
						var_export($getStore);
										
					?>
				</div>
				<div title="系统管理" style="padding:10px">
					
				</div>
			</div>
		
		</div>
		<div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
			 	<div class="easyui-tabs" style="width:100%;height:100%" id="mytab">
		<div title="商品列表" style="padding:10px" closable="true" >
			<iframe src="index.php?control=m_index&action=listProd" style="width: 100%;height: 100%;" scrolling="no" frameborder="0"></iframe>
		</div>
		 
	</div>
		</div>
