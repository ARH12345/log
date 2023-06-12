<?php
include('connect.php');

$Id = $_GET['Id'];

$query = "DELETE FROM FORMDATA WHERE Id = '$Id'";

$data = mysqli_query($conn,$query);

if($data)
{
			echo "<script>alert('Record Deleted successfully')</script>";
        	?>
        	<meta http-equiv="refresh" content="0; url=http://localhost/Learnings/CRUD/display.php" />
        	<?php
}
else
{
	echo "<script>alert('ailed To delete')</script>";
}
?>