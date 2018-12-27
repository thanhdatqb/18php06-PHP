<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php' ; ?>
<div class="content-wrapper">
	<?php include 'connect_db.php';?>
	<?php 
		$id = $_GET['idEdit'];
		// Lay thong tin cu cua san pham can edit theo ID
		$sql = "SELECT * FROM register WHERE id = $id";
		$olduserEdit 	= mysqli_query($conn, $sql);
		$olduser 		= $olduserEdit->fetch_assoc();
		$name        	= $olduser['name'];
		$userName 		= $olduser['userName'];
		$email 			= $olduser['email'];
		$password       = $olduser['password'];
		if (isset($_POST['edit_user'])) {
			$name       = $_POST['name'];
			$userName 	= $_POST['userName'];
			$email    = $_POST['email'];
			$password 		= $olduser['password'];
			$sql = "UPDATE register SET name = '$name', userName = '$userName', email = '$email', password = '$password' WHERE id = $id";
			if (mysqli_query($conn, $sql) === TRUE) {
				header("Location: list_user.php");
			}
		}
	?>
	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">EDIT USER</h3>
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
			          <label >Name</label>
			          <input style="width: 236px;" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
			        </div>
			        <div class="form-group">
			          <label >User Name</label>
			          <input style="width: 236px;" type="text" class="form-control" name="userName" value="<?php echo $userName; ?>">
			        </div><div class="form-group">
			          <label >Email</label>
			          <input style="width: 236px;" type="email" class="form-control" name="email" value="<?php echo $email; ?>">
			        </div><div class="form-group">
			          <label >Password</label>
			          <input style="width: 236px;" type="password" class="form-control" name="password" value="<?php echo $password; ?>">
			        </div>
			      </div>
			      <div class="box-footer">
			        <button type="submit" name="edit_user" ">EDIT user</button>
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

