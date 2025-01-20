<?php 
    session_start();
    include('adminSession.php');
    if (isset($_GET['adminID'])) 
    {
        $adminID=$_REQUEST['adminID'];
        $select="SELECT * FROM admin
                where adminID = '$adminID'";    
        $ret=mysqli_query($connect,$select);
        $row=mysqli_fetch_array($ret);
        $adminID = $row['adminID'];
        $fullName = $row['fullName'];
        $address = $row['address'];
        $phone = $row['phone'];
        $email = $row['email'];
        $profileImage = $row['profileImage'];
                
    }
    if (isset($_POST['btnUpdate'])) 
    {
        $uAdminID=$_POST['txtAdminID'];
        $uFullName=$_POST['txtAdminFullName'];
        $uAddress=$_POST['txtAdminAddress'];
        $uPhone=$_POST['txtAdminPhone'];
        $uEmail=$_POST['txtAdminEmail'];
        $update = "UPDATE admin SET fullName = '$uFullName',
                                    address = '$uAddress',
                                    phone = '$uPhone',
                                    email = '$uEmail'
                                    WHERE adminID='$uAdminID'";

        $query=mysqli_query($connect,$update);
        if ($query) 
        {
            echo "<script> alert('Update success!')</script>";
            echo "<script>window.location = 'userDataTable.php'</script>";
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
            <h5 class="text-center"><img src="dist/img/logo/SWlogo.png" alt="SWlogo"> | Admin Site</h5>
            <br>
            <div class="container">
                <div class="row">
                <div class="col-lg-6 col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center">Admin details</h5>
                            <img src="<?php echo $profileImage ?>" class="user-image" alt="User Image">
                            <h6> Full Name - <b><?php echo $fullName ?></b></h6>
                            <h6> Address Line - <b><?php echo $address ?></b></h6>
                            <h6> Phone - <b><?php echo $phone ?></b></h6>
                            <h6> Email address - <b><?php echo $email ?></b></h6> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">Update Form</h5>
                            <form action="adminUpdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="txtAdminID" value="<?php echo $adminID; ?>" />
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminFullName" placeholder=" " value="<?php echo $fullName; ?>" required>
                                    <label for="" class="form__label">Full Name</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminAddress" placeholder=" " value="<?php echo $address; ?>" required>
                                    <label for="" class="form__label">Address Line</label>
                                </div>             
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminPhone" pattern="[0-9]{11}" placeholder=" " value="<?php echo $phone; ?>" required>
                                    <label for="" class="form__label">Phone (09XXXXXXXXX - 11 digit numbers)</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" class="form__input" name="txtAdminEmail" placeholder=" " value="<?php echo $email; ?>" required>
                                    <label for="" class="form__label">Email Address</label>
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
