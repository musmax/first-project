<?php
//session_start();
// connection for local srver
/*$db = mysqli_connect('localhost', 'root', '', 'loginsystem');
if(mysqli_connect_errno()){
	echo "Database Connection failed with the following errors:".mysqli_connect_error();
	die();
}
else{
	//echo "Database Connection was Successful";
}*/
// connection for remote server
$db = mysqli_connect(' remotemysql.com', '2Bew5a62cw', 'nElk632C2g', ' 2Bew5a62cw');
if(mysqli_connect_errno()){
	echo "Database Connection failed with the following errors:".mysqli_connect_error();
	die();
}
else{
	//echo "Database Connection was Successful";
}
?>


