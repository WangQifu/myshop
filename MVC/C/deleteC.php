<?php
include_once 'MVC/M/deleteM.php';
class deleteC extends _Main
{
    function deleteShareRowC()
    {
        $ary = array(
            state_s=>"删除"
        );
        $de = update("account_share", $_GET["did"], $ary);
        if ($de)
        {
            exit("删除成功");
        }
        else 
        {
            exit("删除失败");
        }
    }
}