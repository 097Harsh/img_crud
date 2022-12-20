<?php

// Database Connection
$obj = new mysqli("localhost","root","","fk");

if($obj->connect_errno != 0)
{
	echo $obj->connect_error;
	
	exit;
	
}
?>