<?php 
	include('connection.php');
	if (isset($_SESSION['adminID'])) 
	{
		$adminID = $_SESSION['adminID'];
		$select = "SELECT * FROM admin WHERE adminID='$adminID'";
		$query = mysqli_query($connect,$select);
		$data = mysqli_fetch_array($query);
		$fullName = $data['fullName'];
		$address = $data['address'];
		$phone = $data['phone'];
		$email = $data['email'];
		$password = $data['password'];
		$profileImage = $data['profileImage'];
	}
 ?>