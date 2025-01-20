<?php 
  session_start();
  include('adminSession.php');

  $select="SELECT * FROM product";
  $ret= mysqli_query($connect,$select);
  $count= mysqli_num_rows($ret);

  $select2="SELECT * FROM category";
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
            <li><a href="userDataTable.php"><i class="fa fa-circle-o"></i> User tables</a></li>
            <li class="active"><a href="productDataTable.php"><i class="fa fa-circle-o"></i> Product & Category</a></li>
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
        Product & Category
        <small>Product and Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin-dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Product & Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Data Table</h3>
              <div class="box-tools">
                <form action="productDataTable.php" method="POST"> 
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="txtProductSearch" class="form-control pull-right" placeholder="Search Product Name">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default" name="btnSearchProduct"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-footer">
              <a href="productEntry.php"><button type="submit" class="btn btn-primary">Add Product</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Brand</th>
                  <th>Stock</th>
                  <th>Image - 1</th>
                  <th>Image - 2</th>
                  <th>Image - 3</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              <?php 
                if (isset($_POST['btnSearchProduct'])) 
                {
                  $productSearch = $_POST['txtProductSearch'];
                  $select4 = "SELECT * FROM product WHERE productName LIKE '%$productSearch%'";
                  $result4 = mysqli_query($connect, $select4);
                  $count4 = mysqli_num_rows($result4);
                  if ($count4>0)  
                  { 
                    for ($i=0; $i < $count4; $i++)
                    {
                      $row=mysqli_fetch_array($result4);
                      $productID=$row['productID'];
                      $productName=$row['productName'];
                      $productBrand=$row['productBrand'];
                      $stock=$row['stock'];
                      $productImage1=$row['productImage1'];
                      $productImage2=$row['productImage2'];
                      $productImage3=$row['productImage3'];
                      $description=$row['description'];
                      echo "<tr>";
                      echo "<td>$productID</td>";
                      echo "<td>$productName</td>";
                      echo "<td>$productBrand</td>";
                      echo "<td>$stock</td>"; 
                    ?>
                      <td><img src="<?php echo $productImage1 ?>" width="30px" height="30px" alt="Product Image 1"></td>
                      <td><img src="<?php echo $productImage2 ?>" width="30px" height="30px" alt="Product Image 2"></td>
                      <td><img src="<?php echo $productImage3 ?>" width="30px" height="30px" alt="Product Image 3"></td>
                      <td>
                        <a href="productUpdate.php?productID=<?php echo $productID ?>">Update /</a>
                        <a href="productDelete.php?productID=<?php echo $productID ?>">Delete</a>
                      </td>
                    <?php 
                      echo "<td>$description</td>"; 
                    }
                  }
                }
                else
                {           
                  for ($i=0; $i < $count; $i++) 
                  { 
                    $row=mysqli_fetch_array($ret);
                    $productID=$row['productID'];
                    $productName=$row['productName'];
                    $productBrand=$row['productBrand'];
                    $stock=$row['stock'];
                    $productImage1=$row['productImage1'];
                    $productImage2=$row['productImage2'];
                    $productImage3=$row['productImage3'];
                    $description=$row['description'];
                    echo "<tr>";
                    echo "<td>$productID</td>";
                    echo "<td>$productName</td>";
                    echo "<td>$productBrand</td>";
                    echo "<td>$stock</td>";
                  ?>
                    <td><img src="<?php echo $productImage1 ?>" width="30px" height="30px" alt="Product Image 1"></td>
                    <td><img src="<?php echo $productImage2 ?>" width="30px" height="30px" alt="Product Image 2"></td>
                    <td><img src="<?php echo $productImage3 ?>" width="30px" height="30px" alt="Product Image 3"></td>
                    
                  <?php  
                    echo "<td>$description</td>";  
                    ?>
                    <td>
                      <a href="productUpdate.php?productID=<?php echo $productID ?>">Update /</a>
                      <a href='productDelete.php?productID=<?php echo $productID ?>'>Delete</a>
                    </td>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Data Table</h3>
              
              <div class="box-tools">
                <form action="productDataTable.php" method="POST">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="txtCategorySearch" class="form-control pull-right" placeholder="Search Category Name">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default" name="btnSearchCategory"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <div class="box-footer">
              <a href="categoryEntry.php"><button type="submit" class="btn btn-primary">Add Category</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Parent ID</th>
                    <th>Category Name</th>
                    <th>Description </th>
                    <th>Action</th>
                  </tr>
            <?php 
              if (isset($_POST['btnSearchCategory'])) 
              {
                $categorySearch=$_POST['txtCategorySearch'];
                $select3="SELECT * FROM category WHERE categoryName LIKE '%$categorySearch%'";
                $result3=mysqli_query($connect,$select3);
                $count3=mysqli_num_rows($result3);
                if($count3>0)
                {
                  for ($i=0; $i < $count3; $i++)
                  {
                    $data=mysqli_fetch_array($result3);
                    $categoryID=$data['categoryID'];
                    $parentID=$row2['parentID'];
                    $categoryName=$data['categoryName'];
                    $description=$data['description'];
            ?>
                    <tr>
                    <td><?php echo $categoryID ?></td>
                    <td><?php echo $parentID ?></td>
                    <td><?php echo $categoryName ?></td>
                    <td><?php echo $description ?></td>
                    <td>
                      <a href="categoryUpdate.php?categoryID=<?php echo $categoryID ?>">Update /</a>
                      <a href='categoryDelete.php?categoryID=<?php echo $categoryID ?>'>Delete</a>
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
                    $categoryID=$row2['categoryID'];
                    $parentID=$row2['parentID'];
                    $categoryName=$row2['categoryName'];
                    $description=$row2['description'];                   
                ?>
                  <tr>
                    <td><?php echo $categoryID ?></td>
                    <td><?php echo $parentID ?></td>
                    <td><?php echo $categoryName ?></td>
                    <td><?php echo $description ?></td>
                    <td>
                      <a href="categoryUpdate.php?categoryID=<?php echo $categoryID ?>">Update /</a>
                      <a href='categoryDelete.php?categoryID=<?php echo $categoryID ?>'>Delete</a>
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
      <!-- <b>www.shiningworld.com.mm</b> -->
    </div>
    <strong>Copyright &copy; 2022-2023 <a href="">Shining World</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
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
