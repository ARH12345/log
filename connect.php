<?php
// error_reporting(0);
// $hostname = "localhost:3307";
// $username = "root";
// $password = "";
// $DBName = "formresponivepart3";

// $conn = 'mysqli_connect("$hostname","$username","$password","$DBName")';

// if($conn)
// {
// 	//echo "Connnection Successful";
// }
// else
// {
// 	echo "Failure".mysqli_connect_error();
// }

?>


<?php
	//for MySQLi OOP
	$conn = mysqli_connect('localhost:3307', 'root', '', 'cruddatabase');
	if($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
//if($conn)
// {
// 	//echo "Connnection Successful";
// }
// else
// {
// 	echo "Failure".mysqli_connect_error();
// }
?>

