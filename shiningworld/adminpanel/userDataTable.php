<?php 
  session_start();
  include('adminSession.php');

  $select="SELECT * FROM customer";
  $ret= mysqli_query($connect,$select);
  $count= mysqli_num_rows($ret);

  $select2="SELECT * FROM admin";
  $ret2= mysqli_query($connect,$select2);
  $count2= mysqli_num_rows($ret2);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lighting and Electronics | Shining World - Data tables</title>
  <link rel="shortcut icon" href="dist/img/logo/SWlogo2.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shining</b>World</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $profileImage ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $fullName ?>
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
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
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="userDataTable.php"><i class="fa fa-circle-o"></i> User tables</a></li>
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
        User Tables
        <small>Customers & Admins</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin-dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">User tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Data Table</h3>
              <div class="box-tools">
                <form action="userDataTable.php" method="POST"> 
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="txtCustomerSearch" class="form-control pull-right" placeholder="Search Customer Name">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default" name="btnSearchCustomer"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php 
                if ($count == 0)
                {
                  echo "<p>No record.</p>";
                  exit();
                } 
              ?>
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Address</th>
                  <th>Township</th>
                  <th>City</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>
              <?php 
                if (isset($_POST['btnSearchCustomer'])) 
                {
                  $customerSearch = $_POST['txtCustomerSearch'];
                  $select4 = "SELECT * FROM customer WHERE fullName LIKE '%$customerSearch%'";
                  $result4 = mysqli_query($connect, $select4);
                  $count4 = mysqli_num_rows($result4);
                  if ($count4>0)  
                  { 
                    for ($i=0; $i < $count4; $i++)
                    {
                      $row=mysqli_fetch_array($result4);
                      $customerID=$row['customerID'];
                      $fullName=$row['fullName'];
                      $address=$row['address'];
                      $township=$row['township'];
                      $city=$row['city'];
                      $phone=$row['phone'];
                      $email=$row['email'];
                      echo "<tr>";
                      echo "<td>$customerID</td>";
                      echo "<td>$fullName</td>";
                      echo "<td>$address</td>";
                      echo "<td>$township</td>";
                      echo "<td>$city</td>";
                      echo "<td>$phone</td>";
                      echo "<td>$email</td>";
                    }
                  }
                }
                else
                {           
                  for ($i=0; $i < $count; $i++) 
                  { 
                    $row=mysqli_fetch_array($ret);
                    $customerID=$row['customerID'];
                    $fullName=$row['fullName'];
                    $address=$row['address'];
                    $township=$row['township'];
                    $city=$row['city'];
                    $phone=$row['phone'];
                    $email=$row['email'];
                    echo "<tr>";
                    echo "<td>$customerID</td>";
                    echo "<td>$fullName</td>";
                    echo "<td>$address</td>";
                    echo "<td>$township</td>";
                    echo "<td>$city</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$email</td>";
                  }
                }
              ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admin Data Table</h3>
              
              <div class="box-tools">
                <form action="userDataTable.php" method="POST">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="txtAdminSearch" class="form-control pull-right" placeholder="Search Admin Name">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default" name="btnSearchAdmin"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php 
                if ($count2 == 0)
                {
                  echo "<p>No record.</p>";
                  exit();
                }
              ?>
                  <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Profile Image</th>
                    <th>Action</th>
                  </tr>
            <?php 
              if (isset($_POST['btnSearchAdmin'])) 
              {
                $adminSearch=$_POST['txtAdminSearch'];
                $select3="SELECT * FROM admin WHERE fullName LIKE '%$adminSearch%'";
                $result3=mysqli_query($connect,$select3);
                $count3=mysqli_num_rows($result3);
                if($count3>0)
                {
                  for ($i=0; $i < $count3; $i++)
                  {
                    $data=mysqli_fetch_array($result3);
                    $adminID=$data['adminID'];
                    $fullName=$data['fullName'];
                    $address=$data['address'];
                    $phone=$data['phone'];
                    $email=$data['email'];
                    $profileImage=$data['profileImage'];
            ?>
                    <tr>
                    <td><?php echo $adminID ?></td>
                    <td><?php echo $fullName ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $phone ?></td>
                    <td><?php echo $email ?></td>
                    <td><img src="<?php echo $profileImage ?>" width="30px" height="30px" alt="User Image"><a href="fullImage.php?adminID=<?php echo $adminID ?>">View full size</a></td>
                    <td>
                      <a href="adminUpdate.php?adminID=<?php echo $adminID ?>">Update /</a>
                      <a href='adminDelete.php?adminID=<?php echo $adminID ?>'>Delete</a>
                    </td>
                  </tr>  
            <?php  


                  }
                }
                else
                {
                  echo "<h1><b>Search Record Not Found</b></h1>";
                }
              }
              else
              {  
                  for ($i=0; $i < $count2; $i++) 
                  { 
                    $row2=mysqli_fetch_array($ret2);
                    $adminID=$row2['adminID'];
                    $fullName=$row2['fullName'];
                    $address=$row2['address'];
                    $phone=$row2['phone'];
                    $email=$row2['email'];
                    $profileImage=$row2['profileImage'];                    
                ?>
                  <tr>
                    <td><?php echo $adminID ?></td>
                    <td><?php echo $fullName ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $phone ?></td>
                    <td><?php echo $email ?></td>
                    <td><img src="<?php echo $profileImage ?>" width="30px" height="30px" alt="User Image"><a href="fullImage.php?adminID=<?php echo $adminID ?>">View full size</a></td>
                    <td>
                      <a href="adminUpdate.php?adminID=<?php echo $adminID ?>">Update /</a>
                      <a href='adminDelete.php?adminID=<?php echo $adminID ?>'>Delete</a>
                    </td>
                  </tr>  
                  <?php 
                }   
              }
             ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    <strong>Copyright &copy; 2014-2018 <a href="https://templatespoint.net">TemplatesPoint</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
