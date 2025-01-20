<?php 
function AddShoppingCart($productID,$buyQty)
{

	include('connection.php'); 
	
	$query="SELECT * FROM product WHERE productID='$productID'";
	$result=mysqli_query($connect,$query);
	$count=mysqli_num_rows($result);

	if($count < 1) 
	{
		echo "<p>ProductID not found.</p>";
		exit();
	}
	$row=mysqli_fetch_array($result);
	$productName=$row['productName'];
	$price=$row['price'];
	$productImage1=$row['productImage1'];
	$stock=$row['stock'];

	if($buyQty < 1) 
	{
		echo "<script>window.alert('Purchase Quantity Cannot be Zero (0)')</script>";
		echo "<script>window.location='cart.php'</script>";
		exit();
	}

	if(isset($_SESSION['ShoppingCartFunctions'])) 
	{
		$Index=IndexOf($productID);
		
		if($Index == -1) 
		{
			$size=count($_SESSION['ShoppingCartFunctions']);

			$_SESSION['ShoppingCartFunctions'][$size]['productID']=$productID;
			$_SESSION['ShoppingCartFunctions'][$size]['productName']=$productName;
			$_SESSION['ShoppingCartFunctions'][$size]['price']=$price;
			$_SESSION['ShoppingCartFunctions'][$size]['buyQty']=$buyQty;
			$_SESSION['ShoppingCartFunctions'][$size]['productImage1']=$productImage1;
			$_SESSION['ShoppingCartFunctions'][$size]['stock']=$stock;
		}
		else
		{
			$_SESSION['ShoppingCartFunctions'][$Index]['buyQty']+=$buyQty;
			echo "<script>alert('Item added.')</script>";
			echo "<script>window.history.back(-1)</script>";

		}
	}
	else
	{
		$_SESSION['ShoppingCartFunctions']=array(); //Create Session Array

		$_SESSION['ShoppingCartFunctions'][0]['productID']=$productID;
		$_SESSION['ShoppingCartFunctions'][0]['productName']=$productName;
		$_SESSION['ShoppingCartFunctions'][0]['price']=$price;
		$_SESSION['ShoppingCartFunctions'][0]['buyQty']=$buyQty;
		$_SESSION['ShoppingCartFunctions'][0]['productImage1']=$productImage1;
		$_SESSION['ShoppingCartFunctions'][0]['stock']=$stock;
	}
	
}

function RemoveShoppingCart($productID)
{
	$Index=IndexOf($productID);
	unset($_SESSION['ShoppingCartFunctions'][$Index]);
	$_SESSION['ShoppingCartFunctions']=array_values($_SESSION['ShoppingCartFunctions']);
	echo "<script>alert('Item removed.')</script>";
	echo "<script>window.location='cart.php'</script>";
}

function ClearShoppingCart()
{	
	unset($_SESSION['ShoppingCartFunctions']);
	echo "<script>alert('Clear Successfully!')</script>";
	echo "<script>window.location='cart.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	$size=count($_SESSION['ShoppingCartFunctions']);

	for($i=0;$i<$size;$i++) 
	{ 
		$price=$_SESSION['ShoppingCartFunctions'][$i]['price'];
		$buyQty=$_SESSION['ShoppingCartFunctions'][$i]['buyQty'];
		$TotalAmount+=($price * $buyQty);
	}
	return $TotalAmount;
}

function CalculateVAT()
{
	$VAT=0;
	$VAT=CalculateTotalAmount() * 0.05;

	return $VAT;
}
function CalculateTotalQuantity()
{
	$TotalQuantity=0;
	$size=count($_SESSION['ShoppingCartFunctions']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$buyQty=$_SESSION['ShoppingCartFunctions'][$i]['buyQty'];
		$TotalQuantity+=$buyQty;
	}
	return $TotalQuantity;
}

function IndexOf($productID)
{
	if (!isset($_SESSION['ShoppingCartFunctions'])) 
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCartFunctions']);

	if ($size < 1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($productID == $_SESSION['ShoppingCartFunctions'][$i]['productID']) 
		{
			return $i;
		}
	}
	return -1;
}

?>