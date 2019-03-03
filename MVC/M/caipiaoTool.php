<?php
//拆解双色球数据
function ssqCode($openCode)
{
    $openCode=explode("+",$openCode);
    $redCode=explode(",",$openCode[0]);
    $buleCode=$openCode[1];
    $codrAry=array();
    $codrAry[]=$redCode;
    $codrAry[]=$buleCode;
    
    return $codrAry;
}
//拆解大乐透数据
function dltCode($openCode)
{
    $openCode=explode("+",$openCode);
    $redCode=explode(",",$openCode[0]);
    $buleCode=explode(",",$openCode[1]);;
    $codrAry=array();
    $codrAry[]=$redCode;
    $codrAry[]=$buleCode;

    return $codrAry;
}
//单独红球
function cpRedCode($openCode)
{
    $openCode=explode(",",$openCode);
    return $openCode;
}
//计算两期彩票的差值
function countMinus($ary1, $ary2)
{
    $equalNum = array();
    if (count($ary1) == count($ary2))
    {
        for ($i = 0; $i < count($ary1); $i++) {
            $eqn = $ary1[$i] - $ary2[$i];
            $equalNum[] = $eqn;
        }
        return $equalNum;
    }
    return false;
}
//统计每个数字出现的次数
function numberCount($ary)
{
    $numCountAry = array();
    for ($i = 0; $i < count($ary); $i++) {
        $objAry = $ary[$i];
        for ($i = 0; $i < count($objAry); $i++) {
            $num = $objAry[$i];
            $isin = in_array($num, $numCountAry);
            if($isin){
                $keyNum = $numCountAry[$num];
                $keyNum++;
                $numCountAry[$num] = $keyNum;
            }else{
                $numCountAry[$num] = 1;
            }
        }
    }
    
    return $numCountAry;
}
function numberCount2($ary)
{
    $numCountAry = array();
    foreach ($ary as $num)
    {
        if(array_key_exists($num, $numCountAry)){
            $keyNum = $numCountAry["".$num];
            $keyNum=$keyNum+1;
            $numCountAry["".$num] = $keyNum;
            
        }else{
            $numCountAry["".$num] = 1;
        }
    }

    return $numCountAry;
}
//提示平均值和差值(双色球)
function computeZu($red, $blue, $mean1, $mean2)
{
    $redSumc = abs($red);
    $str1 = "红球的和：".$redSumc."/平均：".round($redSumc/$mean1);
    if ($blue)
    {
        $rbnc=$redSumc+abs($blue);
        $str2 = "/注和".$rbnc."/注平均：".round($rbnc/$mean2);
        return $str1.$str2;
    }
    return $str1;
    
}
//提示平均值和差值(大乐透)
function dlt_computeZu($red, $blue, $mean1, $mean2, $mean3)
{
    $redSumc = abs($red);
    $str1 = "红球的和：".$redSumc."/红球平均：".round($redSumc/$mean1);
    if ($blue)
    {
        $blueSumc = abs($blue);
        $str2 = "/蓝球和".$blueSumc."/蓝球平均：".round($blueSumc/$mean2);
        $rbnc=$redSumc+$blueSumc;
        $str3 = "/注和".$rbnc."/注平均：".round($rbnc/$mean3);
        return $str1.$str2.$str3;
    }
    return $str1;

}
//球的总个数
function numBall($cp_key)
{
    $ary_obj = "";
    $nb=array(
        "ssq"=>"33+16",
        "dlt"=>"35+12",
        "fc3d"=>"9",
        "pl3"=>"9",
        "pl5"=>"9",
        "qlc"=>"30",
        "qxc"=>"9",
        "k3"=>"3",
    );
    if (array_key_exists($cp_key, $nb))
    {
        $ary_obj=$nb[$cp_key];
    }
    else  
    {
        $ary_obj = "0";
    }
    return $ary_obj;
}