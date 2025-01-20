<?php 
    session_start();
    include('adminSession.php');
    if (isset($_GET['productID'])) 
    {
        $productID=$_REQUEST['productID'];
        $select="SELECT * FROM product
                where productID = '$productID'";    
        $ret=mysqli_query($connect,$select);
        $row=mysqli_fetch_array($ret);
        $productID = $row['productID'];
        $productName = $row['productName'];
        $productBrand = $row['productBrand'];
        $category = $row['categoryID'];
        $stock = $row['stock'];
        $price = $row['price'];
        $productImage1 = $row['productImage1'];
        $productImage2 = $row['productImage2'];
        $productImage3 = $row['productImage3'];
        $featured = $row['featured'];
        $description = $row['description'];
                
    }
    if (isset($_POST['btnUpdate'])) 
    {
        $uProductID=$_POST['txtProductID'];
        $uProductName=$_POST['txtProductName'];
        $uProductBrand=$_POST['txtProductBrand'];
        $uCategory=$_POST['txtCategory'];
        $uStock=$_POST['txtStock'];
        $uPrice=$_POST['txtPrice'];
        $uFeatured=$_POST['txtFeatured'];
        $uDescription=$_POST['txtDescription'];
        $update = "UPDATE product SET productName = '$uProductName',
                                    productBrand = '$uProductBrand',
                                    categoryID = '$uCategory',
                                    stock = '$uStock',
                                    price = '$uPrice',
                                    featured = '$uFeatured',
                                    description = '$uDescription'
                                    WHERE productID='$uProductID'";

        $query=mysqli_query($connect,$update);
        if ($query) 
        {
            echo "<script> alert('Update success!')</script>";
            echo "<script>window.location = 'productDataTable.php'</script>";
        }
            
    }
        
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lighting and Electronics | Shining World - Account</title>
    <link rel="shortcut icon" href="dist/img/logo/SWlogo2.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/main.css">
    <script>
        function refreshCaptcha()
        {
            var img = document.images['captcha_image']; 
            img.src = img.src.substring(
                0,img.src.lastIndexOf("?")
                )+"?rand="+Math.random()*1000;
        }

        function showPassword() 
        {
          var x = document.getElementById("passID");
          var y = document.getElementById("rPassID");
          if (x.type === "password" && y.type ==="password") 
          {
            x.type = "text";
            y.type = "text";
          } 
          else 
          {
            x.type = "password";
            y.type = "password";
          }
        }
    </script>
</head>

<body>
    <!-- Header Area Start -->
   
    <!-- Header Area End -->
    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <h5 class="text-center"><img src="dist/img/logo/SWlogo.png" alt="SWlogo"> | Admin Site - Update Product Details</h5>
            <br>
            <div class="container">
                <div class="row">
                <div class="col-lg-6 col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center">Product details</h5>
                            <h6> Image1 - <img src="<?php echo $productImage1 ?>" width="100px" height="100px" class="user-image" alt="User Image"></h6>
                            <h6> Image2 - <img src="<?php echo $productImage2 ?>" width="100px" height="100px" class="user-image" alt="User Image"></h6>
                            <h6> Image3 - <img src="<?php echo $productImage3 ?>" width="100px" height="100px" class="user-image" alt="User Image"></h6>
                            <h6> Product Name - <b><?php echo $productName ?></b></h6>
                            <h6> Product Brand - <b><?php echo $productBrand ?></b></h6>
                            <h6> Product Category - <b><?php echo $category ?></b></h6>
                            <h6> Stock - <b><?php echo $stock ?></b></h6> 
                            <h6> Price - <b><?php echo $price ?>(MMK)</b></h6> 
                            <h6> Description - <b><?php echo $description ?></b></h6> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">Update product details</h5>
                            <form action="productUpdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="txtProductID" value="<?php echo $productID; ?>" />
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtProductName" placeholder=" " value="<?php echo $productName; ?>" required>
                                    <label for="" class="form__label">Product Name</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtProductBrand" placeholder=" " value="<?php echo $productBrand; ?>" required>
                                    <label for="" class="form__label">Product Brand</label>
                                </div>             
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtCategory" placeholder=" " value="<?php echo $category; ?>" required>
                                    <label for="" class="form__label">Category</label>
                                </div>
                                <div class="form__div">
                                    <input type="number" class="form__input" name="txtStock" placeholder=" " value="<?php echo $stock; ?>" required>
                                    <label for="" class="form__label">Stock</label>
                                </div>
                                <div class="form__div">
                                    <input type="number" class="form__input" name="txtPrice" placeholder=" " value="<?php echo $price; ?>" required>
                                    <label for="" class="form__label">Price</label>
                                </div>
                                <?php 
                                    if($featured == 'yes')
                                    {
                                ?>
                                        <div class="form-group">
                                            <div class="radio">
                                                <p>Featured product?</p>
                                                <label><input type="radio" name="txtFeatured" id="yes" value="yes" checked>Yes</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="txtFeatured" id="no" value="no">No</label>
                                            </div>
                                        </div>
                                <?php  
                                    }
                                    else
                                    {
                                ?>
                                        <div class="form-group">
                                            <div class="radio">
                                                <p>Featured product?</p>
                                                <label><input type="radio" name="txtFeatured" id="yes" value="yes">Yes</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="txtFeatured" id="no" value="no" checked>No</label>
                                            </div>
                                        </div>
                                <?php  
                                    }
                                ?>
                                
                                <div class="form__div">
                                    <textarea class="form__input" name="txtDescription" required><?php echo $description ?></textarea>
                                    <label for="" class="form__label">Description</label>
                                </div> 
                                <button class="btn bg-primary" name="btnUpdate">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
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
