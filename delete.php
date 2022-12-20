<?php

include 'connect.php';

$id = $_GET["delid"];

// to delete a file from the specified folder
$result = $obj->query("select * from file_task where id='$id'");
$row = $result->fetch_object();
unlink("upload/$row->f_name");

// to delete the record from the table
$exe = $obj->query("delete from file_task where id='$id'");

if($exe)
{
	header('location:read.php');
}
else
{
	echo "Error...";
}

?>