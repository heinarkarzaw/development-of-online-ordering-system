<?php 
  session_start();
  include('adminSession.php');

  if(isset($_POST['btnAddProduct']))
  {
    $productName=$_POST['txtProductName'];
    $productBrand=$_POST['txtProductBrand'];
    $category=$_POST['txtCategory'];
    $stock=$_POST['txtStock'];
    $price=$_POST['txtPrice'];
    $image1 = $_FILES['txtProductImage1']['name'];
    $folder = "dist/img/product/";
    $filename1 = $folder.'_'.$image1;
    $copy = copy($_FILES['txtProductImage1']['tmp_name'],$filename1);

    if (!$copy) {
      echo"<p> Cannot Upload Product Image </p>";
      exit();
     } 

    $image2 = $_FILES['txtProductImage2']['name'];
    $folder = "dist/img/product/";
    $filename2 = $folder.'_'.$image2;
    $copy = copy($_FILES['txtProductImage2']['tmp_name'],$filename2);

    if (!$copy) 
    {
      echo"<p> Cannot Upload Product Image </p>";
      exit();
    }

    $image3 = $_FILES['txtProductImage3']['name'];
    $folder = "dist/img/product/";
    $filename3 = $folder.'_'.$image3;
    $copy = copy($_FILES['txtProductImage3']['tmp_name'],$filename3);

    if (!$copy) 
    {
      echo"<p> Cannot Upload Product Image </p>";
      exit();
    }
    $featured=$_POST['txtFeatured'];
    $description=$_POST['txtDescription'];


    $select="SELECT * FROM product where productName='$productName'";
    $ret= mysqli_query($connect,$select);
    $count= mysqli_num_rows($ret);

    if ($count>0) 
    {
      $row= mysqli_fetch_array($ret);
      echo"<script>window.alert('Product cannot register')</script>";
      echo"<script>window.location='productEntry.php'</script>";
      exit();

    }
    else
    {
      $query= "INSERT INTO product(productName, productBrand, categoryID, stock, price, productImage1, productImage2, productImage3, featured, description)Values('$productName', '$productBrand', '$category', '$stock', '$price', '$filename1', '$filename2','$filename3', '$featured', '$description')";
      $result= mysqli_query($connect,$query);

    }
    if ($result) 
    {
      echo"<script>window.alert('Product register complete')</script>";
      echo"<script>window.location='ProductEntry.php'</script>";
    }
    else
    {
      echo "<p>Error in Product Entry : " .mysqli_error($connect) ."</p>";
    }

  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lighting and Electronics | Shining World - Product Entry</title>
  <link rel="shortcut icon" href="dist/img/logo/SWlogo2.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shining</b>World</span>
    </div>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                  if (isset($_SESSION['adminID'])) 
                  {
              ?>
                    <img src="<?php echo $profileImage ?>" class="user-image" alt="User Image">
                           
              <?php  
                  }                      
              ?> 
              <span class="hidden-xs">
                <?php 
                    if (isset($_SESSION['adminID']))
                    {
                      echo $fullName;
                    }
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $profileImage ?>" class="img-circle" alt="User Image">         
                <p><?php echo $fullName ?> - Founder
                <small>since Nov. 2008</small></p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="adminProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $profileImage ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info"> 
          <?php echo "<p>".$fullName."</p>" ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin-dashboard.php"><i class="fa fa-circle-o"></i>Admin Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="userDataTable.php"><i class="fa fa-circle-o"></i> User tables</a></li>
            <li class="active"><a href="productDataTable.php"><i class="fa fa-circle-o"></i> Product & Category</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Personal information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
            </div>
            <div class="box-header with-border">
              <h3 class="box-title">Add product</h3>
            </div>
            <form role="form" action="productEntry.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" name="txtProductName" class="form-control" id="name" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                  <label for="brand">Product Brand</label>
                  <input type="text" name="txtProductBrand" class="form-control" id="brand" placeholder="Product Brand" required>
                </div>
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="txtCategory">
                    <?php 
                      $query= "SELECT * FROM category WHERE parentID>0";
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
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" name="txtStock" class="form-control" id="stock" placeholder="Stock" required>
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="txtPrice" class="form-control" id="price" placeholder="Price" required>
                </div>
                <div class="form-group">
                  <label for="productImage1">Product Image - 1</label>
                  <input type="file" name="txtProductImage1" id="productImage1" required>
                </div>
                <div class="form-group">
                  <label for="productImage2">Product Image - 2</label>
                  <input type="file" name="txtProductImage2" id="productImage2" required>
                </div>
                <div class="form-group">
                  <label for="productImage3">Product Image - 3</label>
                  <input type="file" name="txtProductImage3" id="productImage3" required>
                </div>
                <div class="form-group">
                  <div class="radio">
                    <p>Featured product?</p>
                    <label>
                      <input type="radio" name="txtFeatured" id="yes" value="yes" >
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="txtFeatured" id="no" value="no" checked>
                      No
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" rows="3" name="txtDescription" placeholder="Enter product description" required></textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="btnAddProduct" class="btn btn-primary">Add Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2018 <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
