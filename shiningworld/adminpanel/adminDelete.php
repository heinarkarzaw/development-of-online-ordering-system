<?php 
	session_start();
	include('Connection.php');
	$adminID=$_REQUEST['adminID'];
	$delete="DELETE FROM admin WHERE adminID='$adminID'";
	$ret=mysqli_query($connect,$delete);

	if ($ret) 
	{	
		echo "<script>window.alert('Successfully Deleted')</script>";
		echo "<script>window.location='userDataTable.php'</script>";
	}
	else
	{
		echo "<p>" .mysqli_error($connect). "</p>";
	}	

?>