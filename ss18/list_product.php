<?php include 'admin_header.php' ;?>
<?php include 'sidebar.php' ; ?>
<div class="content-wrapper">
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
      <button ><a style="padding: 20px;" href="add_product.php"> ADD PRODUCT</a></button>
  <?php include 'connect_db.php';?>
  <?php 
    $sql = "SELECT * FROM product";
    $listproduct = mysqli_query($conn, $sql);
  ?>
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
                      <th></th>
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
                          <td>
                            <a href="edit_product.php?idEdit=<?php echo $product['id']?>">EDIT</a> 
                            | <a href="del_product.php?id=<?php echo $product['id']?>">DELETE</a> 

                          </td>
                        </tr>
                    <?php 
                        }
                      } else {?>
                      <tr>
                        <td colspan="8" style="text-align: center;">No product</td>
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

