<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php' ; ?>
      <style type="text/css">
    table {
      text-align: center;
      border-collapse: collapse;
      width: 80%;
      margin: 0 auto;
    }
    table, th, td {
      border: 1px solid gray;
      text-align: center;
    }
    img {
      width: 100px;
    }
    h1 {
      text-align: center;
      color: red;
    }
  </style>
<div class="content-wrapper">
	<?php include 'connect_db.php';?>
	  <?php 
	    $sql = "SELECT * FROM product";

	    $listproduct = mysqli_query($conn, $sql);
	  ?>
	 <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
       <!-- left column -->
        <div class="col-md-11">
         <!-- general form elements -->
          <div class="box box-primary">
          <div class="box-header with-border">
              <h1 >Product LIST</h1>
                  <table>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Amount</th>
                      <th>Created</th>
                    </tr>
                    <?php if ($listproduct->num_rows > 0){?>
                    <?php while($product = $listproduct->fetch_assoc()) {
                      $images = $product['images'];
                      ?>
                        <tr>
                          <td><?php echo $product['id']; ?></td>
                          <td><?php echo $product['name']; ?></td>
                          <td><img src="<?php echo 'uploads/'.$images; ?>"></td>
                          <td><?php echo $product['description']; ?></td>
                          <td><?php echo $product['price']; ?></td>
                          <td><?php echo $product['amount']; ?></td>
                          <td><?php echo $product['created']; ?></td>
                        </tr>
                    <?php 
                        }
                      } else {?>
                      <tr>
                        <td colspan="" style="text-align: center;">No product</td>
                      </tr>
                    <?php }?>
                  </table>
          </div>
          
         <!-- /.box -->
        </div>
       <!--/.col (right) -->
        </div>
    </div>
     <!-- /.row -->
   </section>
    <!-- /.content -->
     </section>
      <section class="content">
      <div class="row">
       <!-- left column -->
        <div class="col-md-11">
         <!-- general form elements -->
          <div class="box box-primary">
          <div class="box-header with-border">
          	<?php 
				$sql = "SELECT * FROM news";
				$listnews = mysqli_query($conn, $sql);
			?>
              <h1 >NEWS LIST</h1>
              <table>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Content</th>
                  <th>Created</th>
                </tr>
                <?php if ($listnews->num_rows > 0){?>
                <?php while($news = $listnews->fetch_assoc()) {
                  $images = $news['images'];
                  ?>
                    <tr>
                      <td><?php echo $news['id']; ?></td>
                      <td><?php echo $news['title']; ?></td>
                      <td><img src="<?php echo 'uploads/'.$images; ?>"></td>
                      <td><?php echo $news['description']; ?></td>
                      <td><?php echo $news['content']; ?></td>
                      <td><?php echo $news['created']; ?></td>
                    </tr>
                <?php 
                    }
                  } else {?>
                  <tr>
                    <td colspan="7" style="text-align: center;">No product</td>
                  </tr>
                <?php }?>
              </table>
          </div>
          
         <!-- /.box -->
        </div>
       <!--/.col (right) -->
        </div>
    </div>
     <!-- /.row -->
   </section>
</div>
<?php include 'admin_footer.php' ?>