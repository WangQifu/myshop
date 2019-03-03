<?php
include_once 'MVC/M/userM.php';
include_once 'MVC/M/dbUpDate.php';
class query_c extends _Main
{
    function queryGameName()
    {
        $gameName = queryRow("applist","*"," appname='".$_POST["gamename"]."' and game_type='".$_POST["game_type"]."' ");
        if (db_key($gameName, "appname") == $_POST["gamename"])
        {
            exit("1");
        }
        else 
        {
            exit("0");
        }
       
    }
    function share_account() {
        $user = queryRow("user", "*"," id='".the_user()->user_id."' ");
        if (db_key($user, "user_identity_num")) {
            $share = queryRow("account_share", "*", " id='".$_GET["sid"]."'");
            $this->addObject("share", $share);
            $this->addObject("password", myDecrypt(db_key($share, "password"), pass_CryptKeyQT));//pass_CryptKeyQT
            $this->log_account($_GET["sid"], "使用共享账号", "");
            $this->setViewName("shareUserView");
        }
        else {
            $this->setViewName("addTrueName");
        }
    }
    function log_account($tid,$msg,$bz) {
        $logAry = array(
            "log_typeid"=>$tid,
            "log_userid"=>the_user()->user_id,
            "log_msg"=>$msg,
            "log_timer"=>the_time("h"),
            "log_bz"=>$bz
        );
        user_log($logAry);
    }
    function changePassword()
    {
        if ($_GET["type"] == "cpas")
        {
            $this->addObject("title", "修改密码");
            $this->setViewName("changePassword");
        }
        if ($_GET["type"]=="form")
        {
            $old = $_POST["oldpass"];
            $new = $_POST["newpass"];
            $userx = queryRow("user", "*"," id='".the_user()->user_id."' ");
            $jmi = myDecrypt(db_key($userx, "user_pass"), User_CryptKey);
            if ($old == $jmi)
            {
                $ary = array(
                    "user_pass"=>myCrypt($new, User_CryptKey)
                );
                $up=update("user", the_user()->user_id, $ary);
                if ($up)
                {
                    $this->addObject("dt", $userx);
                    $this->xiugaimima("修改成功！","userView");
                }
                else 
                {
                    $this->addObject("title", "修改密码");
                    $this->xiugaimima("信息不正确,请从新输入！","changePassword");
                }
            }
            else 
            {
                $this->addObject("title", "修改密码");
                $this->xiugaimima("请输入正确的旧密码","changePassword");
            }
        }
        if($_GET["type"] == "forgePass")
        {
            $this->addObject("title", "忘记密码");
            $this->setViewName("changePassword");
        }
    }
    function xiugaimima($msg, $view) {
        $this->addObject("msg", $msg);
        $this->setViewName($view);
    }
    function cxxgmi()
    {
        $username = $_POST["username"];
        $new = $_POST["userpass"];
        $ary = array(
            "user_pass"=>myCrypt($new, User_CryptKey)
        );
        $up=updateWhere("user", " user_name='".$username."' ", $ary);
        if ($up)
        {
            $this->setViewName("index_v");
            exit("修改成功");
        }
        
    }
    function share_alter()
    {
        $share = queryRow("account_share", "*", " id='".$_GET["sid"]."'");
        $this->addObject("share", $share);
        $this->addObject("password", myDecrypt(db_key($share, "password"), pass_CryptKeyQT));//pass_CryptKeyQT
        $this->setViewName("v1next/share_alter");
    }
    
}

