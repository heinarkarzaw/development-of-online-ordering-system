<?php 
	if (isset($_GET['buy'])) 
    {
        if(isset($_SESSION['customerID']))
        {
            $txtProductID=$_GET['txtProductID'];
            $txtBuyQty=$_GET['txtBuyQty'];
            AddShoppingCart($txtProductID,$txtBuyQty);
            echo "<script>alert('Item added.')</script>";
            echo "<script>window.history.back(-1)</script>";
        }
        else
        {  
            echo "<script>alert('Please login first.');</script>";
            echo "<script>window.location='shop.php'</script>";  
        }
    }

    if (isset($_GET['productID'])) 
    {
        $productID=$_GET['productID'];
        $select="SELECT p.*,c.categoryID,c.categoryName
        FROM product p, category c 
        WHERE p.productID='$productID' AND p.categoryID=c.categoryID";   
        $result=mysqli_query($connect,$select);
        $row=mysqli_fetch_array($result);
        $productName=$row['productName'];
        $price=$row['price'];
        $stock=$row['stock'];
        $categoryID=$row['categoryID'];
        $categoryName=$row['categoryName'];
        $productImage1=$row['productImage1'];
        $productImage2=$row['productImage2'];
        $productImage3=$row['productImage3'];
        $description=$row['description'];
    }
 ?>