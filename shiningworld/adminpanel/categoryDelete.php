<?php 
	session_start();
	include('Connection.php');
	$categoryID=$_REQUEST['categoryID'];
	$delete="DELETE FROM category WHERE categoryID='$categoryID'";
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