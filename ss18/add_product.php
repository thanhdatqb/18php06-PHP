<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php'; ?>
<div class="content-wrapper">
   <?php include 'connect_db.php';?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">ADD</a></li>
        <li class="active">PRODUCT</li>
      </ol>
    </section>
<?php 
    if (isset($_POST['add_product'])) {
      $name        = $_POST['name'];
      $description = $_POST['description'];
      $price       = $_POST['price'];
      $amount       = $_POST['amount'];
      $images       = $_FILES['images'] ;
      $imageName   = uniqid().'_'.$images['name'];
      // xu ly upload anh
      $targetUpload = 'uploads/'.$imageName;
      move_uploaded_file($images['tmp_name'], $targetUpload);
      // ket thuc xu ly upload anh
      $sql = "INSERT INTO product(name, description, price, images,amount) VALUES ('$name', '$description', $price, '$imageName','$amount')";
       if (mysqli_query($conn, $sql) === TRUE) {
        header("Location: list_product.php");
      }
    }
  ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ADD PRODUCT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label >Images</label>
                  <input type="file" name="images">
                </div>
                <div class="form-group">
                  <label>Product description: <br> <textarea name="description" rows="3" cols="30"></textarea></label>
                </div>
               <div class="form-group">
                  <label >Price</label>
                  <input type="text" class="form-control" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                  <label >Amount</label>
                  <input type="text" class="form-control" name="amount" placeholder="amount">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="add_product" ">ADD NEWS</button>
              </div>
          </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include'admin_footer.php'; ?>