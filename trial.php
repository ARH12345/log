<?php

include "connect.php";

$sql = "SELECT * FROM FORMDATA";

$data = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trial</title>
</head>
<body>

<table border="1">
	<tr>
		<th>ID</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Gender</th>
		<th>Contact Number</th>
		<th>Email Id</th>
		<th>Caste</th>
		<th>Language</th>
		<th>Address</th>
		<th>Image</th>
		<th>Operation</th>
	</tr>
	<?php 
		if($data->num_rows>0){
			while($row=$data->fetch_assoc()){
				echo "
				<tr>
					<td>".$row['Id']."</td>
					<td>".$row['fname']."</td>
					<td>".$row['lname']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['phonenumber']."</td>
					<td>".$row['email']."</td>
					<td>".$row['caste']."</td>
					<td>".$row['language']."</td>
					<td>".$row['address']."</td>
					<td>".$row['std_image']."</td>
				</tr>
				";
			}
		}

	?>
</table>

</body>
</html>