<?php 
	include('connection.php');


	$create = "Create Table orders
	(
		orderID int NOT NULL Primary Key AUTO_INCREMENT,
		orderNo varchar(15) NOT NULL,
		orderDate date,
		customerID int,
		address varchar(50),
		township varchar(20),
		city varchar(20),
		phone varchar(19),
		productID int,	
		buyQty int,
		grandTotal int,		
		paymentType varchar(150),
		deliveryDate date,
		Foreign Key(productID) References product(productID),
		Foreign Key(customerID) References customer(customerID)
	)";
	$query = mysqli_query($connect,$create);

	if ($query) 
	{
		echo "<p>Orders table is created successfully.</p>";
	}

	$create = "Create Table wishlist
	(
		wishlistID int NOT NULL Primary key AUTO_INCREMENT,
		customerID int,
		productID int,		
		Foreign Key(productID) References product(productID),
		Foreign Key(customerID) References customer(customerID)
	)";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Wishlist table is created successfully.</p>";
	}
	$create = "Create Table product
	(
		productID int NOT NULL Primary key AUTO_INCREMENT,
		productName varchar(50),
		productBrand varchar(50),
		categoryID int,
		stock int,
		price int,
		productImage1 text,
		productImage2 text,
		productImage3 text,
		featured varchar(30),
		description text,
		Foreign Key(categoryID) References category(categoryID)
	)";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Product table is created successfully.</p>";
	}
	$create = "Alter table category
			   ADD parentID int After categoryID";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Category table is altered successfully.</p>";
	}
	$create = "Create Table category
	(
		categoryID int NOT NULL Primary key AUTO_INCREMENT,
		categoryName varchar(50),
		description text
	)";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Category table is created successfully.</p>";
	}
	$create = "Create Table admin
	(
		adminID int NOT NULL Primary key AUTO_INCREMENT,
		fullName varchar(30),
		address varchar(50),
		phone varchar(20),
		email varchar(30),
		password varchar(20),
		profileImage text
	)";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Admin table is created successfully.</p>";
	}
	$create = "Create Table customer
	(
		customerID int NOT NULL Primary key AUTO_INCREMENT,
		fullName varchar(30),
		address varchar(50),
		city varchar(20),
		township varchar(20),
		phone varchar(20),
		email varchar(30),
		password varchar(20)
	)";
	$query = mysqli_query($connect,$create);
	if ($query) 
	{
		echo "<p>Customer table is created successfully.</p>";
	}
 ?>