<?php 

include "connect.php";

$sql = "SELECT * FROM FORMDATA";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <title>Display Page</title>
    <style>
        body{
        background-color: #D071F9;
        }
        table{
        background-color: white;
        } 
        .update, .Delete
        {
          background-color: green;
          color: white;
          outline: none;
          border-radius: 5px;
          height: 22px;
          widows: 80px;
          font-weight: bold;
          cursor: pointer;
        }
        .Delete{
          background-color: red;
          color: white;
          outline: none;
          border-radius: 5px;
          height: 22px;
          widows: 80px;
          font-weight: bold;
          cursor: pointer;
        }
    </style>
</head>

<body>
<body>  
 <div class="container">  
     <h1 align="center"><mark>Display Records</mark></h1>
      <center><table border="1" cellspacing="7" width="100%">  
           <tr>  
                <th width="3%">Id</th> 
                <th width="3%">Image</th> 
                <th width="9%">First Name</th> 
                <th width="9%">Last name</th>  
                <th width="5%">Gender</th>  
                <th width="16%">Email Address</th>  
                <th width="11%">Contact number</th>
                <th width="8%">Caste</th>  
                <th width="17%">Languages</th> 
                <th width="13%">Address</th> 
                <th width="16%">Operations</th>                  

           </tr>  
           <?php   
                if ($result->num_rows > 0) {  
                     while ($row = $result->fetch_assoc()) {  
                          echo "  
                               <tr>  
                               <td>".$row['Id']."</td> 

                               <td><img src='".$row['std_image']."' width='100px' height = '100px'></td> 
                               
                               <td>".$row['fname']."</td> 
                               <td>".$row['lname']."</td>  
                               <td>".$row['gender']."</td>  
                               <td>".$row['email']."</td>  
                               <td>".$row['phonenumber']."</td> 
                               <td>".$row['caste']."</td>  
                               <td>".$row['language']."</td>  
                               <td>".$row['address']."</td>
                               <td><a href='Edit.php?Id=$row[Id]; ?>'><input type='submit' value='Update' class='update'></a>
                               <a href='Delete.php?Id=$row[Id]; ?>'><input type='submit' value='Delete' class='Delete' onclick = 'return checkdelete()'></a><a href='Delete.php?Id=$row[Id];?>'></a>
                               </td>
                               </tr>  
                          ";  
                     }  
                }  
           ?>  
      </table> 
      </center> 
 </div>  
 </body>  
 <script>
      function checkdelete() {
           return confirm('Are You Sure Want To Delete?');
      }
 </script>
 </html>

