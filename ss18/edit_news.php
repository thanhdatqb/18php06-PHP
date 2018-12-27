<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php' ; ?>
<div class="content-wrapper">
	<?php include 'connect_db.php';?>
	<?php 
		$id = $_GET['idEdit'];
		// Lay thong tin cu cua san pham can edit theo ID
		$sql = "SELECT * FROM news WHERE id = $id";
		$oldNewsEdit = mysqli_query($conn, $sql);
		$oldNews = $oldNewsEdit->fetch_assoc();
		$title        = $oldNews['title'];
		$description = $oldNews['description'];
		$content       = $oldNews['content'];
		$imagesName   = $oldNews['images'];
		if (isset($_POST['edit_news'])) {
			$title        = $_POST['title'];
			$description = $_POST['description'];
			$content       = $_POST['content'];
			if (!$_FILES['images']['error']) {
				// xu ly upload anh
				$images = $_FILES['images'];
				$imagesName   = uniqid().'_'.$images['name'];
				$targetUpload = 'uploads/'.$imagesName;
				move_uploaded_file($images['tmp_name'], $targetUpload);
			// ket thuc xu ly upload anh
			}
			$sql = "UPDATE news SET title = '$title', description = '$description', content = '$content', images = '$imagesName' WHERE id = $id";
			if (mysqli_query($conn, $sql) === TRUE) {
				header("Location: list_news.php");
			}
		}
	?>
	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">EDIT NEWS</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    	</section>
	   	<section class="content">
	   	<div class="row">
	     <!-- left column -->
	    	<div class="col-md-4">
	       <!-- general form elements -->
	       	<div class="box box-primary">
	        <div class="box-header with-border">
	        	<form role="form" action="#" method="POST" enctype="multipart/form-data">
			      	<div class="box-body">
			        <div class="form-group">
			          <label >Title</label>
			          <input style="width: 236px;" type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Title">
			        </div>
			        <div class="form-group">
			          <label >Images </label>
			          <img style="width: 150px; padding-bottom: 20px;" src="uploads/<?php echo $imagesName?>" >
			          <input type="file" name="images">
			        </div>
			        <div class="form-group">
			          <label>Product description: <br> <textarea name="description" rows="3" cols="30"> <?php echo $description; ?></textarea></label>
			        </div>
			       <label>Product Content: <br><textarea name="content" rows="3" cols="30"> <?php echo $content; ?></textarea></label>
			      </div>
			      <div class="box-footer">
			        <button type="submit" name="edit_news" ">EDIT NEWS</button>
			      </div>
	</form>	
	       	</div>
	       	
	       <!-- /.box -->
	     	</div>
	     <!--/.col (right) -->
	   		</div>
	 	</div>
	   <!-- /.row -->
	 </section>
  </div>
</div>
<?php include 'admin_footer.php' ?>

