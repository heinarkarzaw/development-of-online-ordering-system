<?php 
	session_start();
	include('Connection.php');
	$productID=$_REQUEST['productID'];
	$delete="DELETE FROM product WHERE productID='$productID'";
	$ret=mysqli_query($connect,$delete);

	if ($ret) 
	{
		echo "<script>window.alert('Successfully Deleted')</script>";
		echo "<script>window.location='productDataTable.php'</script>";
	}
	else
	{
		echo "<p>" .mysqli_error($connect). "</p>";
	}
?>