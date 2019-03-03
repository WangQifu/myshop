<?php
$action = $_GET['act'];
if($action=='delimg'){//删除
	$filename = $_POST['imagename'];
	if(!empty($filename)){
		unlink('uploadimg/iconimg/'.$filename);
		echo '1';
	}else{
		echo '删除失败.';
	}
}else{
	$picname = $_FILES['mypic']['name'];
	$picsize = $_FILES['mypic']['size'];
	if ($picname != "") {
		if ($picsize > 102400) {
			echo '图片大小不能超过1M';
			exit;
		}
		$type = strstr($picname, '.');
		if ($type != ".jpg" && $type != ".png"&& $type != ".jpeg") {
			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		$pic_path = "uploadimg/iconimg/".$pics;
		
		move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
	}
	$size = round($picsize/1024,2);
	$arr = array(
			'name'=>$picname,
			'pic'=>$pics,
			'size'=>$size
	);
	echo json_encode($arr);
}
?>