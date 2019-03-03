<link type="text/css" rel="stylesheet" href="MVC/V/v1/css/fileinput.min.css" />
<script type="text/javascript" src="MVC/V/v1/js/fileinput.min.js"></script>
<script type="text/javascript" src="MVC/V/v1/js/zh.js"></script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
                 <input type="file" class="file" id="img_url1" name="image_data[]"accept="image/*" multiple>
		</div>
	</div>
</div>
<script>
$("#img_url1").fileinput({  
	   language: 'zh',  
	   uploadUrl: "upload", //上传后台操作的方法  
	   uploadAsync: false, //设置上传同步异步 此为同步  
	   maxFileSize: 200,  
	   dropZoneTitle: "选择上传身份证【正面】【反面】【手持身份证照片】3张",
	   maxFileCount: 3,
	   allowedFileExtensions: ['jpg,png,jpeg'] //限制上传文件后缀  
	});//初始化 后 上传插件的样子
</script>