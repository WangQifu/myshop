<?php
include 'MVC/M/addDBDate.php';
include_once 'my.conf';
include_once 'Common/funtions.php';//加载全站 函数文件
include_once 'MVC/M/_Model.php';//加载Model主文件
    if(IS_AJAX)
    {
        $pic_path = "uploadimg/userimg/";
        $images_name = '';
        $img_name = time();
        $rand = rand(100, 999);
        $imageNameAry = array();
        foreach($_FILES['image_data']['tmp_name'] as $k=>$v)
        {
            move_uploaded_file($v,$pic_path.$img_name.$k.'.jpg');
            $images_name  .=  $img_name.$k.'.jpg'.',';
            $imageNameAry[] = $pic_path.$img_name.$k.'.jpg';
        }
        identityPt($imageNameAry);
    }
    $arr = array(
        '1'=>1,
        'name'=>$images_name
    );
    echo json_encode($arr);