<?php 
	include('connection.php');
    if (isset($_GET['adminID'])) 
    {
        $adminID=$_GET['adminID'];
        $query="SELECT profileImage FROM admin WHERE adminID='$adminID'";
        $result=mysqli_query($connect,$query);
        $row=mysqli_fetch_array($result);
        $profileImage=$row['profileImage'];
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>
 	</title>
 </head>
 <body>
 	<img src="<?php echo $profileImage ?>" alt="User Image">
 </body>
 </html>