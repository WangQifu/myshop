<?php
class kefuC extends _Main
{
    //查询客服信息
    function queryKefu()
    {
        $kid = $_GET["kid"];
        $kefu = queryRow("jiaoyi_kefu", "*", " id='".$kid."' ");
        $this->addObject("kefu", $kefu);
        $this->addObject("hideTop",true);
        $this->addObject("hideFooter",true);
        $this->setViewName("informationKefu");
    }
    //查询游戏代练
    function queryDailian()
    {
        $gid = $_GET["gid"];
        $dl = queryRow("dailian", "*", " gameid='".$gid."' ");
        if (count($dl)<=0)
        {
            $dl = queryRow("dailian", "*", " id>0 ");
        }
        
        $dlmsg = queryRow("dailian_msg", "*", " id>0 ");
        $this->addObject("dailian", $dl);
        $this->addObject("dailian_msg", $dlmsg);
        $this->setViewName("dailian_msg");
    }
    //查询游戏陪玩
    function queryPeiwan()
    {
        $gid = $_GET["gid"];
        $dl = queryRow("peilian", "*", " gameid='".$gid."' ");
        if (count($dl)<=0)
        {
            $dl = queryRow("peilian", "*", " id>0 ");
        }
    
        $dlmsg = queryRow("peilian_msg", "*", " id>0 ");
        $this->addObject("peilian", $dl);
        $this->addObject("peilian_msg", $dlmsg);
        $this->setViewName("peilian_view");
    }
    //发布代练信息
    function issueDailian()
    {
        if (the_user())
        {
            if ($_POST)
            {
                $msg_ary = array(
                    "user_id"=>the_user()->user_id,
                    "game_type"=>GET("game_type", "post"),
                    "game_name"=>GET("game_name", "post"),
                    "game_users"=>GET("game_users", "post"),
                    "game_password"=>GET("game_password", "post"),
                    "game_region"=>GET("game_region", "post"),
                    "game_nick"=>GET("game_nick", "post"),
                    "dailian_renwu"=>GET("dailian_renwu", "post"),
                    "dailian_task"=>GET("dailian_task", "post"),
                    "price"=>GET("price", "post"),
                    "phone"=>GET("phone", "post"),
                    "QQ"=>GET("QQ", "post"),
                    "weixin"=>GET("weixin", "post"),
                    "desc_ms"=>GET("desc_ms", "post")
                );
                $dailian_msg = addTableRow("dailian_msg", $msg_ary);
                if ($dailian_msg)
                {
                    $this->queryDailian();
                }
            }
        }else 
        {
            $this->isAdmin=false;
            $this->setViewName("login2");
        }
    }
    //发布陪练信息
    function issuePeilian()
    {
        if (the_user())
        {
            if ($_POST)
            {
                $msg_ary = array(
                    "user_id"=>the_user()->user_id,
                    "game_type"=>GET("game_type", "post"),
                    "game_name"=>GET("game_name", "post"),
                    "game_users"=>GET("game_users", "post"),
                    "game_password"=>GET("game_password", "post"),
                    "game_region"=>GET("game_region", "post"),
                    "game_nick"=>GET("game_nick", "post"),
                    "peilian_renwu"=>GET("dailian_renwu", "post"),
                    "peilian_task"=>GET("dailian_task", "post"),
                    "price"=>GET("price", "post"),
                    "phone"=>GET("phone", "post"),
                    "QQ"=>GET("QQ", "post"),
                    "weixin"=>GET("weixin", "post"),
                    "desc_ms"=>GET("desc_ms", "post")
                );
                $dailian_msg = addTableRow("peilian_msg", $msg_ary);
                if ($dailian_msg)
                {
                    $this->queryPeiwan();
                }
            }
        }else
        {
            $this->isAdmin=false;
            $this->setViewName("login2");
        }
    }
    function dailianMsg()
    {
        $did = $_GET["did"];
        $dl = queryRow("dailian", "*", " id='".$did."' ");
        $this->addObject("dailian", $dl);
        $this->setViewName("v1next/dailianMsg");
    }
    function shareAc()
    {
        $sid = $_GET["sid"];
        $dl = queryRow("account_share", "*", " id='".$sid."' ");
        $this->addObject("share", $dl);
        $this->setViewName("v1next/shareAc");
    }
    
}