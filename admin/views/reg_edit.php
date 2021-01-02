<?php 

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Admin Profile Edit</h5>
    </div>
        <div class="modal-body">
            <?php

            $connection = mysqli_connect("localhost","root","","techstalwarts");

            if(isset($_POST['edit']))
            {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM `admin` WHERE id='$id' ";
                $run_query = mysqli_query($connection, $query);
                foreach($run_query as $row)
                {
                    ?>
                    <form action="../Admin_modules/reg_code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="username" name="edit_username" value="<?php echo $row['name'] ?>" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="edit_pass" value="<?php echo $row['password'] ?>" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <a href="register.php" class="btn btn-outline-danger">Cancel</a>
                    </form>
                    <?php
                }
            }
            else{
                echo "unsuccesfull";
            }
            ?>   
        </div>
</div>


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>