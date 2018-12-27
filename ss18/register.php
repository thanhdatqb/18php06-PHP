<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php'; ?>
<div class="content-wrapper">
   <?php include 'connect_db.php';?>
   <?php 
    if (isset($_POST['register'])) {
      $name        = $_POST['name'];
      $userName    = $_POST['userName'];
      $email       = $_POST['email'];
      $password    = $_POST['password'];
      $sql = "INSERT INTO register(name, userName, email, password) 
              VALUES ('$name', '$userName', '$email','$password')";
       if (mysqli_query($conn, $sql) === TRUE) {
        header("Location: index.php");
      }
    }
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Register</a></li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
       <!-- left column -->
         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Register Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="userName" placeholder="UserName">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="register" class="btn btn-info pull-right">Register</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
   <!--/.col (right) -->
        </div>
 <!-- /.row -->
      </section>
</div>
<?php include 'admin_footer.php' ?>

