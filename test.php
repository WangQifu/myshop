<?php

function red1($str)
{
    return "<font color='red'>".$str."</font>";
}
    $str = "{red1('user.user_name')}";
    $varName="user";
    if(preg_match_all("/{(.*?".$varName."\.(?<varValue>\w{1,30}).*?)}/is", $str, $result))
    {
        //var_export($result);
        $result=$result[1];
        //var_export($result);
        foreach ($result as $r)
        {
            //echo "111r=".$r;
            $r=str_replace("user.user_name", "wqf", $r);
            
            eval('$last='.$r.";");
            if ($last)
            {
                echo $last;
            }
        }
    }

?>