<?php
include_once 'addDBDate.php';
function user_log($array)
{
    $row = addTableRow("user_log", $array);
    return $row;
}