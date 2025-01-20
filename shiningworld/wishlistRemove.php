<?php 
	session_start();
	include('Connection.php');
	$wishlistID=$_REQUEST['wishlistID'];
	$delete="DELETE FROM wishlist WHERE wishlistID='$wishlistID'";
	$ret=mysqli_query($connect,$delete);

	if ($ret) 
	{
		echo "<script>window.alert('Item has removed!')</script>";
		echo "<script>window.location='wishlist.php'</script>";
	}
	else
	{
		echo "<p>" .mysqli_error($connect). "</p>";
	}
?>