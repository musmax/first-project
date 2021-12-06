<?php
//session_start();
$db = mysqli_connect('localhost', 'root', '', 'loginsystem');
if(mysqli_connect_errno()){
	echo "Database Connection failed with the following errors:".mysqli_connect_error();
	die();
}
else{
	//echo "Database Connection was Successful";
}
?>