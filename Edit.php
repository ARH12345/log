<?php
	session_start();
	include_once('connect.php');
	error_reporting(0);
    if(isset($_POST['UpdateDetails'])){
      $Id 			=$_GET['Id'];
      $fname		=$_POST['fname'];  
      $lname		=$_POST['lname'];  
      $pwd			=$_POST['pwd']; 
      $cpwd			=$_POST['cpwd']; 
      $gender		=$_POST['gender'];  
      $email		=$_POST['email'];  
      $phonenumber	=$_POST['phonenumber']; 
      $caste		=$_POST['r1']; 
      $lang			= $_POST['language'];
	  $lang1		= implode(",", $lang);
      $address		=$_POST['address'];  



    	
        $sql = "UPDATE formdata SET fname='$fname',lname='$lname',pwd='$pwd',cpwd='$cpwd', gender='$gender',email='$email',phonenumber='$phonenumber',caste = '$caste', language='$lang1', address='$address' where Id='$Id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) 
        {
        	echo "<script>alert('Record updated successfully')</script>";
        	?>
        	<meta http-equiv="refresh" content="1; url=http://localhost/Learnings/CRUD/display.php" />
        	<?php

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    }

if (isset($_GET['Id'])) {

    $Id = $_GET['Id']; 

    $sql = "SELECT * FROM FORMDATA WHERE Id='$Id'";

    $result = mysqli_query($conn,$sql); 



    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

	      $fname=$row['fname'];  
	      $lname=$row['lname'];  
	      $pwd=$row['pwd'];  
	      $cpwd=$row['cpwd'];  
	      $gender=$row['gender'];   
	      $email=$row['email'];  
	      $phonenumber=$row['phonenumber'];  
	      $caste = $row['caste'];
	      $language = $row['language'];
    	  $language1 = explode(",", $language);
	      $address=$row['address'];  

        } 
?>


<!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link rel="stylesheet" type="text/css" href="style.css">
      <title>Update</title>    
 </head>  
<body>
	<div class="container">

		<form action="" method="POST">
		<div class="title">Update Your Details</div>
		<div class="form">
			<div class="input_field">
				<label>First Name</label>
				<!-- <input type="text" class="input" name="fname" required> -->
				<input type="text" class="input" name="fname" value="<?php echo $fname; ?>";><br>
			</div>
			
			<div class="input_field">
				<label>Last Name</label>
				<input type="text" class="input" name="lname" value="<?php echo $lname; ?>"><br>
			</div>
			
			<div class="input_field">
				<label>Password</label>
				<input type="password" class="input" name="pwd" value="<?php echo $pwd; ?>"><br>
			</div>
			
			<div class="input_field">
				<label>Confirm Password</label>
				<input type="password" class="input" name="cpwd" value="<?php echo $cpwd; ?>"><br>
			</div>
			
			<div class="input_field">
				<label>Gender</label>
				<div class="selectbox">
				<select name="gender">
				<option value="">Select</option><br>
				<option value="Male"
				<?php 
 					if($gender == 'Male')
 					{ 
 						echo "selected";
 					}
				?>
				>
				Male</option><br>
				<option value="Female"
				<?php 
 					if($gender == 'Feale')
 					{ 
 						echo "selected";
 					}
				?>
				>
				Female</option>
				</select>
				</div>
			</div>
			
			<div class="input_field">
				<label>Email Address</label>
				<input type="email" class="input" name="email" value="<?php echo $email; ?>"><br>
			</div>
			
			<div class="input_field">
				<label>Phone Number</label>
				<input type="phone" class="input" name="phonenumber" value="<?php echo $phonenumber; ?>"><br>
			</div>

			<div class="input_field">
				<label style="margin-right: 100px;">Caste</label>
            	<input type="radio" name="r1" value="General" required <?php if($caste == 'General'){ echo "checked";} ?>>
            	<label style="margin-left: 5px;">General</label>
            	<input type="radio" name="r1" value="OBC" required <?php if($caste == 'OBC'){ echo "checked";} ?>>
            	<label style="margin-left: 5px;">OBC</label>
            	<input type="radio" name="r1" value="SC" required <?php if($caste == 'SC'){ echo "checked";} ?>>
            	<label style="margin-left: 5px;">SC</label>
            	<input type="radio" name="r1" value="ST" required <?php if($caste == 'ST'){ echo "checked";} ?>>
            	<label style="margin-left: 5px;">ST</label>
			</div>

			<div class="input_field">
				<label style="margin-right: 100px;">Language</label>
				<input type="checkbox" name="language[]" value="Kannada"
				<?php
				if(in_array("Kannada", $language1)){
					echo "checked";
				}
				?>

				>

				<label style="margin-left: 5px;">Kannada</label>
				<input type="checkbox" name="language[]" value="English"

				<?php
				if(in_array("English", $language1)){
					echo "checked";
				}
				?>

				>

				<label style="margin-left: 5px;">English</label>
				<input type="checkbox" name="language[]" value="Hindi"

				<?php
				if(in_array("Hindi", $language1)){
					echo "checked";
				}
				?>				

				>

				<label style="margin-left: 5px;">Hindi</label>
			</div>			
			
			<div class="input_field">
				<label>Address</label>
				<textarea class="textarea" name="address"><?php echo $address; ?>
				</textarea><br>
			</div>

			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" name="" required>
					<span class="checkmark"></span>
				</label>
				<p>Agree To Terms And Conditions</p>
			</div> 

			<div class="input_field">
				<input type="submit" value="Update Details" class="btn" name="UpdateDetails">
			</div>
		
		</div>
		</form>
	</div>
</body>
 
 </html>  
    <?php

    } else{ 

        header('Location: display.php');

    } 

}

?> 
