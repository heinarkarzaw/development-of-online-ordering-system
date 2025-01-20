<?php 
   include('connection.php');
   if(isset($_SESSION['customerID'])) 
   {
      $customerID = $_SESSION['customerID'];
      $select = "SELECT * FROM customer WHERE customerID='$customerID'";
      $query = mysqli_query($connect, $select);
      $data = mysqli_fetch_array($query);
      $fullName=$data['fullName'];
      $address=$data['address'];
      $city=$data['city'];
      $township=$data['township'];
      $email=$data['email'];
      $password=$data['password'];
      $phone=$data['phone'];
   }
 ?>