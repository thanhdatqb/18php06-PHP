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
  <?php include 'connect_db.php';?>
  <?php 
    $sql = "SELECT * FROM register";
    $listUser = mysqli_query($conn, $sql);
  ?>
    </section>
      <section class="content">
      <div class="row">
       <!-- left column -->
        <div class="col-md-11">
         <!-- general form elements -->
          <div class="box box-primary">
          <div class="box-header with-border">
              <h1 >USER LIST</h1>
              <table>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th></th>
                </tr>
                <?php if ($listUser->num_rows > 0){?>
                <?php while($user = $listUser->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $user['id']; ?></td>
                      <td><?php echo $user['name']; ?></td>
                      <td><?php echo $user['userName']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td>
                        <a href="edit_user.php?idEdit=<?php echo $user['id']?>">EDIT</a> 
                        | <a href="del_user.php?id=<?php echo $user['id']?>">DELETE</a> 

                      </td>
                    </tr>
                <?php 
                    }
                  } else {?>
                  <tr>
                    <td colspan="6" style="text-align: center;">No product</td>
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

