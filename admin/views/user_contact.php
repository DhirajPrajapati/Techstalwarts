<?php 

include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">
    <!-- Data Table Example-->
    <div class="card shadow mb-4 p-2">
        <h6 class="m-0 font-weight-bold text-primary">User Contact
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

            $query = "SELECT * FROM `contact`";
            $query_run = mysqli_query($connection, $query);
            
            ?>
            <table class="table table-bordered " id="datatable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
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
                                <td><?php echo $data['number'] ?></td>
                                <td><?php echo $data['message'] ?></td>
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