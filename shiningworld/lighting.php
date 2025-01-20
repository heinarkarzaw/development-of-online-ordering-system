<?php   
    session_start();
    include('Connection.php');
    include('customerSession.php');
    include('shopping_cart_functions.php');
    include('get.php');
 //load_data_select.php    
 function fill_sub_category($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM category where parentID=1";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["categoryID"].'">'.$row["categoryName"].'</option>';  
      }  
      return $output;  
 }  
 function fill_category($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM category where categoryName='Lighting'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["categoryID"].'">'.$row["categoryName"].'</option>';  
      }  
      return $output;  
 } 

 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT p.*, c.* 
                    FROM product p, category c 
                    where c.parentID = '1' AND p.categoryID = c.categoryID";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
            $output .=  '<div class="col-md-4 col-sm-6"> ';
            $output .=  '<form action="lighting.php" method="GET" enctype="multipart/form-data">';
            $output .=  '<input type="hidden" name="Action" value="buy">';
            $output .=  '<input type="hidden" name="txtProductID" value='.$row["productID"].'>';
            $output .=  '<div class="product-item">';
            $output .=  '<div class="product-item-image">';
            $output .=  '<a href="product-details.php?productID='.$row["productID"].'"><img src="adminPanel/'.$row["productImage1"].'" alt="Product Name"
                                                    class="img-fluid"></a>';
            $output .=  '<div class="cart-icon">';
            $output .=  '<a href="add_to_wishlist.php?productID='.$row["productID"].'"><i class="far fa-heart"></i></a>';
            $output .=  '<input type="hidden" name="txtBuyQty" value="1" min="1" max='.$row["stock"].'>';
            $output .=  '<button type="submit" name="buy" class="bg-opacity" min="1">';
            $output .=  '<a>';
            $output .=  '<svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75" viewBox="0 0 16.75 16.75">';
            $output .=  '<g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                            <g id="Icon" transform="translate(0 1)">
                            <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <path id="Path_3" data-name="Path 3"
                            d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                            transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                            stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" />
                        </g>
                        </g>';
            $output .=  '</svg>';
            $output .=  '</a>';
            $output .=  '</button>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</form>';
            $output .=  '<div class="product-item-info">';
            $output .=  '<a href="product-details.php?productID='.$row['productID'].'">'.$row['productName'].'</a>';
            $output .=  '<span>'.$row['price'].'MMK</span>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';

      }  
      return $output;  
 }  

 function fill_search_product($connect)  
 {  
      $output = '';  
      $productSearch = $_POST['txtProductSearch'];
      $sql = "SELECT * FROM product WHERE productName LIKE '%$productSearch%'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
            $output .=  '<div class="col-md-4 col-sm-6"> ';
            $output .=  '<form action="lighting.php" method="GET" enctype="multipart/form-data">';
            $output .=  '<input type="hidden" name="Action" value="buy">';
            $output .=  '<input type="hidden" name="txtProductID" value='.$row["productID"].'>';
            $output .=  '<div class="product-item">';
            $output .=  '<div class="product-item-image">';
            $output .=  '<a href="product-details.php?productID='.$row["productID"].'"><img src="adminPanel/'.$row["productImage1"].'" alt="Product Name"
                                                    class="img-fluid"></a>';
            $output .=  '<div class="cart-icon">';
            $output .=  '<a href="add_to_wishlist.php?productID='.$row["productID"].'"><i class="far fa-heart"></i></a>';
            $output .=  '<input type="hidden" name="txtBuyQty" value="1" min="1" max='.$row["stock"].'>';
            $output .=  '<button type="submit" name="buy" class="bg-opacity" min="1">';
            $output .=  '<a>';
            $output .=  '<svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75" viewBox="0 0 16.75 16.75">';
            $output .=  '<g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                            <g id="Icon" transform="translate(0 1)">
                            <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <path id="Path_3" data-name="Path 3"
                            d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                            transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                            stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" />
                        </g>
                        </g>';
            $output .=  '</svg>';
            $output .=  '</a>';
            $output .=  '</button>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</form>';
            $output .=  '<div class="product-item-info">';
            $output .=  '<a href="product-details.php?productID='.$row['productID'].'">'.$row['productName'].'</a>';
            $output .=  '<span>'.$row['price'].'MMK</span>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';

      }  
      return $output;  
 } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lighting and Electronics | Shining World - Lighting</title>
    <link rel="shortcut icon" href="dist/images/logo/SWlogo2.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
    $('#category-dropdown').on('change', function() {
    var category_id = this.value;
    $.ajax({
    url: "fetch-subcategory-by-category.php",
    type: "POST",
    data: {
    category_id: category_id
    },
    cache: false,
    success: function(result){
    $("#sub-category-dropdown").html(result);
    }
    });
    });
    });

    $(document).ready(function(){  
      $('#sub-category-dropdown').change(function(){  
           var sub_category_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{sub_category_id:sub_category_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
    });   
    $(document).ready(function(){  
      $('#category-dropdown').change(function(){  
           var category_id = $(this).val();  
           $.ajax({  
                url:"load_category_data.php",  
                method:"POST",  
                data:{category_id:category_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
    }); 

    </script> 
</head>

<body>
    <!-- Header Area Start -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-top-wrapper">
                            <div class="header-top-info">
                                <div class="email">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.95" height="13.4"
                                            viewBox="0 0 16.95 13.4">
                                            <g id="Mail" transform="translate(0.975 0.7)">
                                                <path id="Path_1" data-name="Path 1"
                                                    d="M3.5,4h12A1.5,1.5,0,0,1,17,5.5v9A1.5,1.5,0,0,1,15.5,16H3.5A1.5,1.5,0,0,1,2,14.5v-9A1.5,1.5,0,0,1,3.5,4Z"
                                                    transform="translate(-2 -4)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                                <path id="Path_2" data-name="Path 2" d="M17,6,9.5,11.25,2,6"
                                                    transform="translate(-2 -4.5)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>shiningworld.wetbise@mail.com</span>
                                    </div>
                                </div>
                                <div class="cta">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.401" height="13.401"
                                            viewBox="0 0 13.401 13.401">
                                            <g id="Phone_Icon" data-name="Phone Icon" transform="translate(0.7 0.7)">
                                                <path id="Phone_Icon-2" data-name="Phone Icon"
                                                    d="M14.111,10.984v1.806A1.206,1.206,0,0,1,12.8,14a11.956,11.956,0,0,1-5.207-1.849,11.754,11.754,0,0,1-3.62-3.613A11.9,11.9,0,0,1,2.117,3.313,1.205,1.205,0,0,1,3.317,2h1.81A1.206,1.206,0,0,1,6.334,3.036a7.719,7.719,0,0,0,.422,1.692A1.2,1.2,0,0,1,6.485,6l-.766.765a9.644,9.644,0,0,0,3.62,3.613l.766-.765a1.208,1.208,0,0,1,1.273-.271,7.76,7.76,0,0,0,1.7.422,1.205,1.205,0,0,1,1.038,1.222Z"
                                                    transform="translate(-2.112 -2)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>+9505923291</span>
                                    </div>
                                </div>
                            </div>
                            <div class="header-top-switcher">
                                <div class="language">
                                    <select class="bg-opacity">
                                        <option value="english">English</option>
                                        <option value="myanmar" disabled>Myanmar</option>
                                    </select>
                                </div>
                                <div class="currency">
                                    <select class="bg-opacity">
                                        <option value="mmk">MMK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="d-none d-lg-block">
                    <nav class="menu-area d-flex align-items-center">
                        <div class="logo">
                            <a href="index.php"><img src="dist/images/logo/SWlogo.png" alt="logo" /></a>
                        </div>
                        <ul class="main-menu d-flex align-items-center">
                            <li><a id ="line-hover" href="index.php">Home</a></li>
                            <li><a id ="line-hover" class="active" href="lighting.php">Lighting</a></li>
                            <li><a id ="line-hover" href="electronics.php">Electronics</a></li>
                            <li><a id ="line-hover" href="shop.php">Shop</a></li>
                            <li><a id ="line-hover" href="location.php">Location</a></li>
                        </ul>
                        <form action="lighting.php" class="search-wrapper-box" method="POST">
                            <div class="search-bar">
                                <input type="text" name="txtProductSearch" placeholder="Search for product...">
                                <button class="bg-opacity" name="btnSearchProduct" type="submit">
                                    <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414"
                                        viewBox="0 0 20.414 20.414">
                                        <g id="Search_Icon" data-name="Search Icon" transform="translate(1 1)">
                                            <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="8.158" cy="8" rx="8.158"
                                                ry="8" fill="none" stroke="#1a2224" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" />
                                            <line id="Line_4" data-name="Line 4" x1="3.569" y1="3.5"
                                                transform="translate(14.431 14.5)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </g>
                                    </svg>
                                    </div>
                                </button> 
                            </div>
                        </form>
                        <div class="menu-icon ml-auto">
                            <ul>
                                <li>
                                    <?php  
                                        if(isset($_SESSION['customerID']))
                                        {
                                            include('count.php'); 
                                    ?>
                                        <a class="btn-hover" href="wishlist.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                                viewBox="0 0 22 20">
                                                <g id="Heart" transform="translate(1 1)">
                                                    <path id="Heart-2" data-name="Heart"
                                                        d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                        transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        <?php 
                                            if ($num_wishlist_rows>0) 
                                            {
                                                echo "<span class='heart'>".$num_wishlist_rows."</span>";
                                            } 
                                        ?>
                                        </a> 
                                    <?php 
                                        }
                                        else
                                        {
                                    ?>
                                             <a class="btn-hover" href="wishlist.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                                    viewBox="0 0 22 20">
                                                    <g id="Heart" transform="translate(1 1)">
                                                        <path id="Heart-2" data-name="Heart"
                                                            d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                            transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </a>
                                    <?php  
                                        }
                                    ?>   
                                </li>
                                <li>
                                    <a class="btn-hover" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1531.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1541.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                        <?php 
                                            if (isset($_SESSION['ShoppingCartFunctions'])) 
                                            {
                                                $size=count($_SESSION['ShoppingCartFunctions']);
                                                if ($size>0) 
                                                {
                                                    echo "<span class='cart'>".$size."</span>";
                                                }
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            
                                         ?> 
                                    </a>
                                </li>
                                <li>
                                    <?php 
                                    if (isset($_SESSION['customerID'])) 
                                    {
                                        echo "<a class='btn-hover' href='user-dashboard.php'>";
                                    ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="#335AFF" stroke="#335AFF"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#335AFF" stroke="#335AFF"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    <?php
                                        echo "</a>";
                                    }
                                    
                                    else
                                    {
                                        echo "<a class='btn-hover' href='account.php'>";
                                    ?>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18'
                                            height='20' viewBox='0 0 18 20'>
                                            <g id='Account' transform='translate(1 1)''>
                                                <path id='Path_86' data-name='Path 86'
                                                    d='M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2'
                                                    transform='translate(-4 -3)' fill='none' stroke='#000'
                                                    stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />
                                                <circle id='Ellipse_9' data-name='Ellipse 9' cx='4' cy='4' r='4'
                                                    transform='translate(4)'' fill='#fff' stroke='#000'
                                                    stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />
                                            </g>
                                        </svg>
                                    <?php  
                                        echo "</a>";
                                    } 
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu -->
                <aside class="d-lg-none">
                    <div id="mySidenav" class="sidenav">
                        <div class="close-mobile-menu">
                            <a href="javascript:void(0)" id="menu-close" class="closebtn"
                                onclick="closeNav()">&times;</a>
                        </div>
                        <div class="search-bar">
                            <form action="lighting.php" class="search-wrapper-box" method="POST">
                                <input type="text" name="txtProductSearch" placeholder="Search for product...">
                                <button class="bg-opacity" name="btnSearchProduct" type="submit"><div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414"
                                    viewBox="0 0 20.414 20.414">
                                    <g id="Search_Icon" data-name="Search Icon" transform="translate(1 1)">
                                        <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="8.158" cy="8" rx="8.158"
                                            ry="8" fill="none" stroke="#1a2224" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line id="Line_4" data-name="Line 4" x1="3.569" y1="3.5"
                                            transform="translate(14.431 14.5)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </div></button>
                            </form>
                        </div>
                        <li><a id ="line-hover" href="index.php">Home</a></li>
                        <li><a id ="line-hover" class="active" href="lighting.php">Lighting</a></li>
                        <li><a id ="line-hover" href="electronics.php">Electronics</a></li>
                        <li><a id ="line-hover" href="shop.php">Shop</a></li>
                        <li><a id ="line-hover" href="location.php">Location</a></li>
                    </div>
                    <div class="mobile-nav d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="dist/images/logo/SWlogo.png" alt="logo" /></a>
                        </div>
                        <form action="lighting.php" class="search-wrapper-box" method="POST">
                            <div class="search-bar">
                                <input type="text" name="txtProductSearch" placeholder="Search for product...">
                                <button class="bg-opacity" name="btnSearchProduct" type="submit">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414"
                                            viewBox="0 0 20.414 20.414">
                                            <g id="Search_Icon" data-name="Search Icon" transform="translate(1 1)">
                                                <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="8.158" cy="8" rx="8.158"
                                                    ry="8" fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <line id="Line_4" data-name="Line 4" x1="3.569" y1="3.5"
                                                    transform="translate(14.431 14.5)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                        <div class="menu-icon">
                            <ul>
                                <li> 
                                    <?php  
                                        if(isset($_SESSION['customerID']))
                                        {
                                            include('count.php'); 
                                    ?>
                                        <a class="btn-hover" href="wishlist.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                                viewBox="0 0 22 20">
                                                <g id="Heart" transform="translate(1 1)">
                                                    <path id="Heart-2" data-name="Heart"
                                                        d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                        transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        <?php 
                                            if ($num_wishlist_rows>0) 
                                            {
                                                echo "<span class='heart'>".$num_wishlist_rows."</span>";
                                            } 
                                        ?>
                                        </a> 
                                    <?php 
                                        }
                                        else
                                        {
                                    ?>
                                             <a class="btn-hover" href="wishlist.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                                    viewBox="0 0 22 20">
                                                    <g id="Heart" transform="translate(1 1)">
                                                        <path id="Heart-2" data-name="Heart"
                                                            d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                            transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    </g>
                                                </svg>
                                            </a>
                                    <?php  
                                        }
                                    ?>   
                                </li>
                                <li>
                                    <a class="btn-hover"href="cart.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1531.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1541.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                        <?php 
                                            if (isset($_SESSION['ShoppingCartFunctions'])) 
                                            {
                                                $size=count($_SESSION['ShoppingCartFunctions']);
                                                if ($size>0) 
                                                {
                                                    echo "<span class='cart'>".$size."</span>";
                                                }
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            
                                         ?> 
                                    </a>
                                </li>
                                <li>
                                    <?php 
                                    if (isset($_SESSION['customerID'])) 
                                    {
                                        echo "<a class='btn-hover' href='user-dashboard.php'>";
                                    ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="#335AFF" stroke="#335AFF"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#335AFF" stroke="#335AFF"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    <?php
                                        echo "</a>";
                                    }
                                    
                                    else
                                    {
                                        echo "<a class='btn-hover' href='account.php'>";
                                    ?>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18'
                                            height='20' viewBox='0 0 18 20'>
                                            <g id='Account' transform='translate(1 1)''>
                                                <path id='Path_86' data-name='Path 86'
                                                    d='M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2'
                                                    transform='translate(-4 -3)' fill='none' stroke='#000'
                                                    stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />
                                                <circle id='Ellipse_9' data-name='Ellipse 9' cx='4' cy='4' r='4'
                                                    transform='translate(4)'' fill='#fff' stroke='#000'
                                                    stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />
                                            </g>
                                        </svg>
                                    <?php  
                                        echo "</a>";
                                    } 
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="hamburger-menu">
                            <a style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</a>
                        </div>
                    </div>
                </aside>
                <!-- Body overlay -->
                <div class="overlay" id="overlayy"></div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <main>
        <!-- BreadCrumb Start-->
        <section class="breadcrumb-area mt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lighting</li>
                            </ol>
                        </nav>
                        <h5>Lighting</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- BreadCrumb Start-->

        <!-- Catagory Search Start -->
        <section class="search">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="search-wrapper">
                        <form action="lighting.php" class="search-wrapper-box" method="POST">
                            <input type="text" name="txtProductSearch" placeholder="Search any products">
                            <button class="btn bg-primary" name="btnSearchProduct" type="submit">SEARCH</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Catagory Search End -->

        <!-- Catagory item start -->
        <section class="categoryitem">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="categoryitem-wrapper">
                        <div class="categoryitem-wrapper-itembox">
                            <h6>Category</h6>
                            <select class="form-control" id="category-dropdown" name="category-dropdown">
                                <option value="" hidden>Select</option>
                                <?php echo fill_category($connect); ?>
                            </select>   
                        </div>
                        <div class="categoryitem-wrapper-itembox">
                            <h6>Subcategory</h6>                          
                            <select class="form-control" id="sub-category-dropdown" name="sub-category-dropdown">
                                <option value="" hidden></option>
                            </select> 
                        </div>
                        
                        <div class="categoryitem-wrapper-itembox">
                            <h6>Price</h6>
                            <form class="price-item">
                                <select class="form-control" disabled>
                                    <option data-display="High to Low">High to Low</option>
                                    <option value="1">Low to High</option>
                                </select>
                            </form>
                        </div>
                        <div class="categoryitem-wrapper-itembox">
                            <h6>Sort By</h6>
                            <select class="form-control" disabled>
                                <option data-display="Newest">Newest</option>
                                <option value="1">Oldest</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Catagory item End -->

        <!-- Populer Product Strat -->
        <section class="populerproduct bg-white p-0 shop-product">
            <div class="container">
                    <div class="row" id="show_product">  
                        <?php 
                            if (isset($_POST['btnSearchProduct'])) 
                            {
                                echo fill_search_product($connect);
                            }
                            else
                            {
                                echo fill_product($connect);
                            } 
                        ?>
                    </div>                    
            </div>
        </section>
        <!-- Populer Product End -->

        <!-- Pagination Start -->
        <section class="pagination">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="pagination-group">
                        <a href="#!-1" class="p_prev"><svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828" viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg></a>
                        <a href="#!1" class="cdp_i active">01</a>
                        <a href="#!+1" class="p_next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.829" viewBox="0 0 9.414 16.829">
                              <g id="Arrow" transform="translate(1.414 15.414) rotate(-90)">
                                <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l7,7,7-7" transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                              </g>
                            </svg>
                            </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pagination End -->

    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row align-items-center newsletter-area">
                <div class="col-lg-5">
                    <div class="newsletter-area-text">
                        <h4 class="text-white">Subscribe to get notification.</h4>
                        <p>
                            Welcome to Shining World Lighting and Electronics products website.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="newsletter-area-button">
                        <form action="#">
                            <div class="form">
                                <input type="email" name="email" id="mail" placeholder="Enter your email address"
                                    class="form-control">
                                <button class="btn bg-secondary border text-capitalize">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row main-footer">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="main-footer-info">
                        <img src="dist/images/logo/SWlogo-white.png" alt="Logo" class="img-fluid">
                        <p>
                            Welcome to Shining World Lighting and Electronics products website.
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Company</h6>
                        <ul class="quicklink">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Quick links</h6>
                        <ul class="quicklink">
                            <li><a href="lighting.php">Lighting</a></li>
                            <li><a href="electronics.php">Electronics</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Account</h6>
                        <ul class="quicklink">
                            <li><a href="cart.php">Your cart</a></li>
                            <li><a href="user-dashboard.php">Profile</a></li>
                            <li><a href="#">Order Completed</a></li>
                            <li><a href="logout.php">Log-out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-flex justify-content-between align-items-center">
                        <div class="copyright-text order-2 order-lg-1">
                            <p>&copy; 2020. Design and Developed by <a href="#">Shining World</a></p>
                        </div>
                        <div class="copyright-links order-1 order-lg-2">
                            <a href="https://www.facebook.com" class="ml-0"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/scss/vendors/plugin/js/slick.min.js"></script>
    <script src="dist/main.js"></script>
    <script>
        function openNav() {

            document.getElementById("mySidenav").style.width = "350px";
            $('#overlayy').addClass("active");
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#overlayy').removeClass("active");
        }
    </script>
</body>
</html>
