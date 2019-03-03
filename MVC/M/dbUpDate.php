<?php
function addgamelite($table,$whereid,$array)
{
	$up = load_model($table);
	$tableName = "shop_".$table;
	$data =$array;
	$ret_up = $up->_db->$tableName()->where('id',$whereid)->update($data);
	if ($ret_up)
	{
		return $ret_up;
	}
}

function update($table,$whereid,$array)
{
	$up = load_model($table);
	$tableName = "shop_".$table;
	$data =$array;
	$ret_up = $up->_db->$tableName()->where('id',$whereid)->update($data);
	return $ret_up;
}

function updateWhere($table,$where,$array)
{
    $up = load_model($table);
    $tableName = "shop_".$table;
    $data =$array;
    $ret_up = $up->_db->$tableName()->where($where)->update($data);
    return $ret_up;
}