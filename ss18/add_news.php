<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php'; ?>
<div class="content-wrapper">
	 <?php include 'connect_db.php';?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">ADD</a></li>
        <li class="active">NEWS</li>
      </ol>
    </section>
<?php 
		if (isset($_POST['add_news'])) {
			$title        = $_POST['title'];
			$description = $_POST['description'];
			$content       = $_POST['content'];
			$images       = $_FILES['images'] ;
			$imageName   = uniqid().'_'.$images['name'];
			// xu ly upload anh
			$targetUpload = 'uploads/'.$imageName;
			move_uploaded_file($images['tmp_name'], $targetUpload);
			// ket thuc xu ly upload anh
			$sql = "INSERT INTO news(title, description, content, images) VALUES ('$title', '$description', '$content', '$imageName')";
			 if (mysqli_query($conn, $sql) === TRUE) {
        header("Location: list_news.php");
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
              <h3 class="box-title">ADD NEWS</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label >Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                  <label >Images</label>
                  <input type="file" name="images">
                </div>
                <div class="form-group">
                  <label>News description: <br> <textarea name="description" rows="3" cols="30"></textarea></label>
                </div>
               <label>News Content: <br><textarea name="content" rows="3" cols="30"></textarea></label>
              </div>
              <div class="box-footer">
                <button type="submit" name="add_news" ">ADD NEWS</button>
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