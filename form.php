<?php
	session_start();
	include_once('connect.php');

	if(isset($_POST['register'])){

	$filename =  $_FILES['uploadfile']['name'];
	$tempname = $_FILES['uploadfile']['tmp_name'];
	$folder = "Images/".$filename;
	move_uploaded_file($tempname, $folder);
	
		$fname 			= $_POST['fname'];
		$lname 			= $_POST['lname'];
		$pwd 			= $_POST['pwd'];
		$cpwd 			= $_POST['cpwd'];
		$gender 		= $_POST['gender'];
		$email 			= $_POST['email'];
		$phonenumber	= $_POST['phonenumber'];
		$caste			= $_POST['r1'];
		$lang			= $_POST['language'];
		$lang1			= implode(",", $lang);
		$address 		= $_POST['address'];			
		$sql = "INSERT INTO formdata (std_image,fname, lname, pwd, cpwd, gender, email, phonenumber,caste, language, address) VALUES ('$folder','$fname', '$lname', '$pwd','$cpwd','$gender','$email','$phonenumber','$caste','$lang1','$address')";
		//$data = mysqli_query($conn, $sql)

		if(mysqli_query($conn, $sql))
		{
			echo "<script> alert('Added Succesfully')</script>";
		}
		else
		{
			echo "<script> alert('Failed')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>PHP CRUD OPERATIONS</title>
</head>

<body>
	<div class="container">
		<form action="form.php" method="POST" enctype="multipart/form-data">
		<div class="title">Registration Form</div>
		<div class="form">

			<div class="input_field">
				<label>Upload Image</label>
				<input type="file" name="uploadfile" style="width: 100%;">
			</div>
			
			<div class="input_field">
				<label>First Name</label>
				<input type="text" class="input" name="fname" required>
			</div>
			
			<div class="input_field">
				<label>Last Name</label>
				<input type="text" class="input" name="lname" required>
			</div>
			
			<div class="input_field">
				<label>Password</label>
				<input type="password" class="input" name="pwd" required>
			</div>
			
			<div class="input_field">
				<label>Confirm Password</label>
				<input type="password" class="input" name="cpwd" required>
			</div>
			
			<div class="input_field">
				<label>Gender</label>
				<div class="selectbox">
				<select name="gender" required>
				<option value="Not Selected">Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
				</div>
			</div>
			
			<div class="input_field">
				<label>Email Address</label>
				<input type="email" class="input" name="email" required>
			</div>
			
			<div class="input_field">
				<label>Phone Number</label>
				<input type="phone" class="input" name="phonenumber" required>
			</div>

			<div class="input_field">
				<label style="margin-right: 100px;">Caste</label>
				<input type="Radio" name="r1" value="General" required><label style="margin-left: 5px;">General</label>
				<input type="Radio" name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
				<input type="Radio" name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
				<input type="Radio" name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>
			</div>

			<div class="input_field">
				<label style="margin-right: 100px;">Language</label>
				<input type="checkbox" name="language[]" value="Kannada"><label style="margin-left: 5px;">Kannada</label>
				<input type="checkbox" name="language[]" value="English"><label style="margin-left: 5px;">English</label>
				<input type="checkbox" name="language[]" value="Hindi"><label style="margin-left: 5px;">Hindi</label>
			</div>
			
			<div class="input_field">
				<label>Address</label>
				<textarea class="textarea" name="address" required></textarea>
			</div>

			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" name="" required>
					<span class="checkmark"></span>
				</label>
				<p>Agree To Terms And Conditions</p>
			</div> 

			<div class="input_field">
				<input type="submit" value="Register" class="btn" name="register">
			</div>
		
		</div>
		</form>
	</div>
</body>
</html>

