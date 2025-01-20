<?php 
	session_start();
    include('connection.php');
    include('customerSession.php');
  
	if(isset($_SESSION['customerID']))
	{
		if (isset($_GET['productID'])) 
		{
			$productID=$_REQUEST['productID'];
			$insert = "INSERT INTO wishlist(customerID, productID)
		          		VALUES('$customerID', '$productID')";
			$result=mysqli_query($connect,$insert);
			if ($result) 
			{	
				echo "<script>window.alert('Item added.')</script>";
			  	echo "<script>window.history.back(-1)</script>";
			}
		}
		
	}
	else
	{
		echo "<script>window.alert('Please login first.')</script>";
		echo "<script>window.history.back(-1)</script>";
	}

 ?>