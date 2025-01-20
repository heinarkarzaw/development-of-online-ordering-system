<?php 
   if(isset($_GET['productID'])) 
   {
      $productID = $_GET['productID'];
      $select = "SELECT * FROM product WHERE productID='$productID'";
      $query = mysqli_query($connect, $select);
      $data = mysqli_fetch_array($query);
      $productName=$data['productName'];
      $productBrand=$data['productBrand'];
      $categoryID=$data['categoryID'];
      $stock=$data['stock'];
      $price=$data['price'];
      $productImage1=$data['productImage1'];
      $productImage2=$data['productImage2'];
      $productImage3=$data['productImage3'];
      $description=$data['description'];
   }
 ?>