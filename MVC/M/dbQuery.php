<?php
function queryRow($table="",$cole="",$where="",$order="",$limit="")
{
	$m = load_model($table);//加载表
	$m->loadall($cole,$where,$order,$limit);
	$ret = $m->all();
	return $ret;
}
//倒序
function queryRow_desc($tabName, $cole="", $where)
{
    $prod=load_model($tabName);
    $shopName="shop_".$tabName;
    $ret=$prod->_db->$shopName()->select($cole);//这一行 是写死的
    $ret=$ret->where($where)->order("id desc");
    return $ret;
}

function dbTableLimit($tabName, $where,$page,$pagesize)
{
	$prod=load_model($tabName);
	$shopName="shop_".$tabName;
	$ret=$prod->_db->$shopName()->select('*');//这一行 是写死的
	$ret=$ret->where($where)->order("id desc")->limit($pagesize,($page-1)*$pagesize);
	return $ret;
}
//倒序
function dbTableLimit2($tabName, $where, $limit)
{
    $prod=load_model($tabName);
    $shopName="shop_".$tabName;
    $ret=$prod->_db->$shopName()->select('*');//这一行 是写死的
    $ret=$ret->where($where)->order("id desc")->limit($limit);
    return $ret;
}
//倒序
function dbTableLimit3($tabName, $limit)
{
    $prod=load_model($tabName);
    $shopName="shop_".$tabName;
    $ret=$prod->_db->$shopName()->select('*');//这一行 是写死的
    $ret=$ret->order("id desc")->limit($limit);
    return $ret;
}

function dbTableLimit4($tabName, $where, $limit)
{
    $prod=load_model($tabName);
    $shopName="shop_".$tabName;
    $ret=$prod->_db->$shopName()->select('*');//这一行 是写死的
    $ret=$ret->where($where)->limit($limit);
    return $ret;
}