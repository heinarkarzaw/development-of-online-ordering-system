<?php 
  session_start();
  include('adminSession.php');

    if (isset($_POST['btnSavePassword'])) 
    {
        $uAdminID = $_POST['txtAdminID'];
        $uCurrentPassword = $_POST['txtCurrentPassword'];
        $uNewPassword = $_POST['txtNewPassword'];
        $uConfirmPassword = $_POST['txtConfirmPassword'];

        if ($password === $uCurrentPassword) 
        {
            if ($uNewPassword === $uConfirmPassword) 
            {
                $update = "UPDATE admin SET  password = '$uNewPassword' WHERE adminID='$uAdminID'";
                $query=mysqli_query($connect,$update);
                if ($query) 
                {
                    echo "<script> alert('Your password has been changed successfully!')</script>";
                    echo "<script>window.location = 'adminProfile.php'</script>";
                }
            }
            else
            {
                echo "<script> alert('Your new password and confirmation password do not match!')</script>";
            }
        }
        else
        {
            echo "<script> alert('Your current password does not match with the password you provided. Please Try again.')</script>";
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lighting and Electronics | Shining World - Admin Profile</title>
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
            <li class="active"><a href="admin-dashboard.php"><i class="fa fa-circle-o"></i>Admin Dashboard</a></li>
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
            <li><a href="productDataTable.php"><i class="fa fa-circle-o"></i> Product & Category</a></li>
            <li><a href="orderDataTable.php"><i class="fa fa-circle-o"></i> Order tables</a></li>
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
              <img src="<?php echo $profileImage ?>" class="user-image" alt="User Image">
            <?php 
                echo "<h4> Full Name - <b>".$fullName."</b></h4>";
                echo "<h4> Address Line - <b>".$address."</b></h4>";
                echo "<h4> Phone - <b>".$phone."</b></h4>";
                echo "<h4> Email address - <b>".$email."</b></h4>";
            ?>
            </div>
            <div class="box-header with-border">
              <h3 class="box-title">Change password</h3>
            </div>
            <form role="form" action="adminProfile.php" method="POST">
              <input type="hidden" name="txtAdminID" value="<?php echo $adminID; ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Current password</label>
                  <input type="password" name="txtCurrentPassword" class="form-control" id="exampleInputPassword1" placeholder="Current password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">New Password</label>
                  <input type="password" name="txtNewPassword" class="form-control" id="exampleInputPassword2" placeholder="New Password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">Confirm Password</label>
                  <input type="password" name="txtConfirmPassword" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password" required>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="btnSavePassword" class="btn btn-primary">Save changes</button>
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
