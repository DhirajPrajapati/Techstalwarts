<?php 

include('includes/header.php');
include('includes/navbar.php');

?>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../Admin_modules/reg_code.php" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="username" name="username" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">CONFORM Password</label>
                    <input type="password" name="c_pass" class="form-control" id="exampleInputPassword1">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="adm_registration">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
    <!-- Data Table Example-->
    <div class="card shadow mb-4 p-2">
        <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addadminprofile">
                Add Admin Profile
            </button>
        </h6>
    </div>
    <div class="card-body">
        <?php
        
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            echo '<h2>'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }
        
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo '<h2>'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }


        ?>
        <div class="table-responsive">
            <?php
            
            $connection = mysqli_connect("localhost","root","","techstalwarts");

            $query = "SELECT * FROM `admin`";
            $query_run = mysqli_query($connection, $query);
            
            ?>
            <table class="table table-bordered " id="datatable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($data = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['name'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['password'] ?></td>
                                <td>
                                    <form action="reg_edit.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $data['id']; ?>">
                                        <center><button type="submit" name="edit" class="btn btn-success">Edit</button></center>
                                    </form>
                                </td>
                                <td>
                                    <form action="../Admin_modules/reg_code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $data['id']; ?>">
                                        <center><button type="submit" name="delete" class="btn btn-danger">Delete</button></center>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "No Record Found";
                    }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php 

include('includes/scripts.php');
include('includes/footer.php');

?>