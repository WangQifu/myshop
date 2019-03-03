<?php
function deleteImage($image)
{
    $filename = $image;//传入绝对路径
    if(!empty($filename)){
        unlink($filename);
        return "1";
    }
    return "0";
}
function deleteSQLRow($tablename, $rowId)
{
    $m = load_model($tablename);//加载表
    $de=$m->delete(" id='".$rowId."' ");
//     $tableName = "shop_".$tablename;
//     $re= $m->$tableName()->where('id',$rowId);//查询出id=31的数据返回 object(NotORM_Row)
//     $re->delete();//删除id=31的数据，返回删除的条数，失败返回0
    return $de;
}