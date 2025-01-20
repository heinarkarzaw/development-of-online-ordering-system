<?php 
    session_start();
    include('connection.php');
    if (isset($_POST['btnSignUp'])) 
    {
        $fullName = $_POST['txtAdminFullName'];
        $address = $_POST['txtAdminAddress'];
        $phone = $_POST['txtAdminPhone'];
        $email = $_POST['txtAdminEmail'];
        $password = $_POST['txtAdminPassword'];
        $repeatPassword = $_POST['txtAdminRepeatPassword'];
        $profileImage = $_FILES['txtAdminProfileImage']['name'];
        $folder = "dist/img/admin/";
        $filename = $folder.'_'.$profileImage;
        $profileImage = copy($_FILES['txtAdminProfileImage']['tmp_name'],$filename);
        if (!$profileImage) 
        {
            echo"<p> Cannot Upload Profile Image </p>";
            exit();
        } 

        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) 
        {
            echo "<script>alert('Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.')</script>";
        } 
        else
        {
            if ($password == $repeatPassword) 
            {
                if ( isset($_POST['captcha']) && ($_POST['captcha']!="") )
                {
                // Validation: Checking entered captcha code with the generated captcha code
                    if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0)
                    {
                    // Note: the captcha code is compared case insensitively.
                    // if you want case sensitive match, check above with strcmp()
                        echo "<script>alert('Entered captcha code does not match! Kindly try again.')</script>";        
                    }
                    else
                    {  
                        $select = "SELECT * FROM customer where Email ='$email'";
                        $query = mysqli_query($connect,$select); 
                        $count = mysqli_num_rows($query); 
                        if ($count>0) 
                        {
                            echo "<script>alert('Email already exists')</script>";
                            echo "<script>window.location = 'adminAccount.php'</script>";
                        }
                        else
                        {    
                            $insert = "INSERT INTO admin(fullName,address,phone,email,password,profileImage)
                            values('$fullName','$address','$phone','$email','$password', '$filename')";

                            $query=mysqli_query($connect,$insert);
                            if ($query) 
                            {
                                echo "<script> alert('Your account creation success! You can sign in now.')</script>";
                                echo "<script>window.location = 'adminAccount.php'</script>";
                            }
                        }
                    }
                }   
            } 
            else
            {
                echo "<script> alert('Passwords do not match.')</script>";
            }
        }
    }
    if(isset($_SESSION['count'])) 
    {
        $count=$_SESSION['count'];
        if ($count==3) 
        {
            echo "<script>alert('3 Time Login Fail')</script>";
            echo "<script>window.location = 'loginTimer.php'</script>";
        }
    }
    if (isset($_POST['btnSignIn'])) 
    {
        $email = $_POST['txtAdminEmail'];
        $password = $_POST['txtAdminPassword'];

        $insert = "SELECT * FROM admin where email = '$email' and password = '$password'";
        $query = mysqli_query($connect, $insert);
        $count = mysqli_num_rows($query); 
        if ($count>0) 
        {
            $row=mysqli_fetch_array($query);
            $_SESSION['adminID']=$row['adminID'];
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
            $_SESSION['fullName']=$row['fullName'];
            echo "<script>alert('Welcome to Shining World!')</script>";
            echo "<script>window.location = 'admin-dashboard.php'</script>";
        }
        else
        {
            if(isset($_SESSION['count']))
            {
                $_SESSION['count']++;

             }
            else
            {
                $_SESSION['count']=1;
            }
        }
        {
            echo "<script>window.alert('Wrong username or password!')</script>";
            echo "<script>window.location='adminAccount.php'</script>";
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
        function showPassword2() 
        {
          var z = document.getElementById("sPassID");
          if (z.type === "password") 
          {
            z.type = "text";
          } 
          else 
          {
            z.type = "password";
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
                            <h5 class="text-center">Sign In</h5>
                            <form action="adminAccount.php" method="POST" enctype="multipart/form-data">
                                <div class="form__div">
                                    <input type="email" class="form__input" name="txtAdminEmail" placeholder=" " required>
                                    <label for="" class="form__label">Email Address</label>
                                </div>
                                <div class="form__div mb-0">
                                    <input type="password" id="sPassID" class="form__input" name="txtAdminPassword" placeholder=" " required>
                                    <label for="" class="form__label">Password</label>
                                </div>
                                <div class="password-info d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="password-info-left">
                                        <input type="checkbox" id="showpass" class="mb-0" onclick="showPassword2()">
                                        <label for="showpass" class="mb-0">Show Password</label>
                                    </div>
                                    <div class="password-info-right">
                                        <a href="forget-password.html">Forget Password</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-primary" name="btnSignIn">Sign In</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-sign-up">
                            <h5 class="text-center">Sign Up</h5>
                            <form action="adminAccount.php" method="POST" enctype="multipart/form-data">
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminFullName" placeholder=" " required>
                                    <label for="" class="form__label">Full Name</label>
                                </div>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminAddress" placeholder=" " required>
                                    <label for="" class="form__label">Address Line</label>
                                </div>
                                
                                <div class="form__div">
                                    <input type="text" class="form__input" name="txtAdminPhone" pattern="[0-9]{11}" placeholder=" " required>
                                    <label for="" class="form__label">Phone (09XXXXXXXXX - 11 digit numbers)</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" class="form__input" name="txtAdminEmail" placeholder=" " required>
                                    <label for="" class="form__label">Email Address</label>
                                </div>
                                <p><small>&#8226 Password must be at least 8 characters in length</small></p>
                                <p><small>&#8226 At least one number,</small></p>
                                <p><small>&#8226 One upper case letter,</small></p>
                                <p><small>&#8226 One lower case letter and one special character.</small></p>
                                <div class="form__div">
                                    <input type="password" id="passID" class="form__input" name="txtAdminPassword" placeholder=" " required>
                                    <label for="" class="form__label">Account Password</label>
                                </div>
                                <div class="form__div mb-0">
                                    <input type="password" id="rPassID" class="form__input" name="txtAdminRepeatPassword" placeholder=" " required>
                                    <label for="" class="form__label">Repeat Password</label>
                                </div>
                                <div class="password-info-show">
                                    <input type="checkbox" id="showpassagain" class="mb-0" onclick="showPassword()">
                                    <label for="showpassagain" class="mb-0">Show Password</label>
                                </div>
                                    <table border="0" width="100%">
                                        <tr>
                                            <td><p>Profile Image:</p></td>
                                            <td><input type="file" name="txtAdminProfileImage" placeholder=" " required></td>
                                        </tr>
                                    </table>  
                                    <br>
                                <img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>
                                <p>Can't read the image?<a href='javascript: refreshCaptcha();'>click here </a>to refresh</p>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="captcha" placeholder=" " required>
                                    <label for="" class="form__label">Enter Captcha</label>
                                </div>
                                <button class="btn bg-primary" name="btnSignUp">Sign Up</button>
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
