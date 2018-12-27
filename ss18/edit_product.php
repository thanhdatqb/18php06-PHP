<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php' ; ?>
<div class="content-wrapper">
	<?php include 'connect_db.php';?>
	<?php 
		$id = $_GET['idEdit'];
		// Lay thong tin cu cua san pham can edit theo ID
		$sql = "SELECT * FROM product WHERE id = $id";
		$oldProductEdit = mysqli_query($conn, $sql);
		$oldProduct = $oldProductEdit->fetch_assoc();
		$name        = $oldProduct['name'];
		$description = $oldProduct['description'];
		$price       = $oldProduct['price'];
		$amount       = $oldProduct['amount'];
		$created       = $oldProduct['created'];
		$imagesName   = $oldProduct['images'];
		if (isset($_POST['edit_product'])) {
			$name 			= $_POST['name'];
			$price        = $_POST['price'];
			$amount        = $_POST['amount'];
			$description = $_POST['description'];
			if (!$_FILES['images']['error']) {
				// xu ly upload anh
				$images = $_FILES['images'];
				$imagesName   = uniqid().'_'.$images['name'];
				$targetUpload = 'uploads/'.$imagesName;
				move_uploaded_file($images['tmp_name'], $targetUpload);
			// ket thuc xu ly upload anh
			}
			$sql = "UPDATE product SET name = '$name', description = '$description', price = $price,amount=$amount, images = '$imagesName' WHERE id = $id";
			if (mysqli_query($conn, $sql) === TRUE) {
				header("Location: list_product.php");
			}
		}
	?>
	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">EDIT PRODUCT</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    </section>
	   	<section class="content">
	   	<div class="row">
	     <!-- left column -->
	    	<div class="col-md-11">
	       <!-- general form elements -->
	       	<div class="box box-primary">
	        <div class="box-header with-border">
	        	<form role="form" action="#" method="POST" enctype="multipart/form-data">
      	<div class="box-body">
        <div class="form-group">
	          <label >Name</label>
	          <input style="width: 236px;" type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Name">
	        </div>
	        <div class="form-group">
	          <label >Images </label>
	          <img style="width: 150px; padding-bottom: 20px;" src="uploads/<?php echo $imagesName?>" >
	          <input type="file" name="images">
	        </div>
	        <div class="form-group">
	          <label>Product description: <br> <textarea name="description" rows="3" cols="30"> <?php echo $description; ?></textarea></label>
	        </div>
	        <div class="form-group">
	          <label >Price</label>
	          <input style="width: 236px;" type="text" class="form-control" name="price" value="<?php echo $price; ?>" placeholder="Price">
	        </div>
	        <div class="form-group">
	          <label >Amount</label>
	          <input style="width: 236px;" type="text" class="form-control" name="amount" value="<?php echo $amount; ?>" placeholder="Amount">
	        </div>
	      </div>
	       
	      <div class="box-footer">
	        <button type="submit" name="edit_product" ">EDIT product</button>
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

