<?php
function db_key($date,$key)
{
    $kv="";
	foreach ($date as $k)
	{
		$kv = $k[$key];
	}
	return $kv;
}
function db_row($date,$row,$key)
{
    $ary=array();
    foreach ($date as $v)
    {
        $ary[]=$v[$key];
    }
    return $ary[$row];
}
