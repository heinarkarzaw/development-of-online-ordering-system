<?php 
    session_start();
    include('adminSession.php');
    if (isset($_GET['categoryID'])) 
    {
        $categoryID=$_REQUEST['categoryID'];
        $select="SELECT * FROM category
                where categoryID = '$categoryID'";    
        $ret=mysqli_query($connect,$select);
        $row=mysqli_fetch_array($ret);
        $parentID = $row['parentID'];
        $categoryID = $row['categoryID'];
        $categoryName = $row['categoryName'];
        $description = $row['description'];
                
    }
    if (isset($_POST['btnUpdate'])) 
    {
        $uParentID=$_POST['txtParentID'];
        $uCategoryID=$_POST['txtCategoryID'];
        $uCategoryName=$_POST['txtCategoryName'];
        $uDescription=$_POST['txtDescription'];

        $update = "UPDATE category SET parentID = '$uParentID',
                                       categoryName = '$uCategoryName',
                                       description = '$uDescription'
                                       WHERE categoryID='$uCategoryID'";

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
    <title>Lighting and Electronics | Shining World - Category Update</title>
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
                            <h5 class="text-center">Category details</h5>
                            <h6> Category Name - <b><?php echo $categoryName ?></b></h6>
                            <h6> Description - <b><?php echo $description ?></b></h6> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">Update product details</h5>
                            <form action="categoryUpdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="txtCategoryID" value="<?php echo $categoryID; ?>" />
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtCategoryName" placeholder=" " value="<?php echo $categoryName; ?>" required>
                                    <label for="" class="form__label">Category Name</label>
                                </div>
                                 <div class="form__div">
                                    <input type="text" class="form__input" name="txtDescription" placeholder=" " value="<?php echo $description; ?>" required>
                                    <label for="" class="form__label">Description</label>
                                </div> 
                                <div class="form__div">
                                  <label class="form__label">Select</label>
                                  <select name="txtParentID">
                                    <option value="0">Parent category</option>
                                    <?php 
                                      $query= "SELECT * FROM category where parentID=0";
                                      $ret=mysqli_query($connect,$query);
                                      $count=mysqli_num_rows($ret);

                                      for ($i=0; $i < $count; $i++) 
                                      { 
                                        $row= mysqli_fetch_array($ret);
                                        $Type_ID=$row['categoryID'];
                                        $Type_Name=$row['categoryName'];
                                        echo "<option value='$Type_ID'>$Type_ID - $Type_Name</option>";
                                      }
                                    ?>
                                  </select>
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
</html>
