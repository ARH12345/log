<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<title>Login Credentials</title>
</head>
<body>
	<form action="" method="POST" autocomplete="off">
	<div class="center">
		<h1>Login</h1>
		<div class="form">
			<input type="text" class="textfield" name="username" placeholder="username">
			<input type="password" class="textfield" name="password" placeholder="password">
			<div class="forgetpass"><a href="#" class="link" onclick="message()">Forgot Password?</a></div>
			<input type="submit" name="login" class="btn" value="Login">
			<div class="signup">New Member? <a href="form.php" class="link">SignUp Here</a> </div>
		</div>
	</div>
	</form>
<script>
	function message() 
	{
		alert("Please Remember Your Password");
	}
</script>
</body>
</html>

<?php 

	include "connect.php";

	if(isset($_POST['login'])){
		$email = $_POST['username'];
		$pwd = $_POST['password'];

		$sql = "SELECT * FROM FORMDATA WHERE email = '$email' and pwd = '$pwd'";

		$result = mysqli_query($conn,$sql);

		$total = mysqli_num_rows($result);

		//echo $total;

		if($total==1){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['email'];
			//echo "Hi".$_SESSION['username'];
			header('location:display.php');
		}else{
			echo "Login Failed";
		}
	}
?>