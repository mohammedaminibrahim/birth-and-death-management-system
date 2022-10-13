<?php 
session_start();
require_once("./includes/dashboard-head.php");?>

       <?php
       
        require_once("./includes/dashboard-side-bar.php");
       
       ;?>
        
        <main class="content">

            <?php require_once("./includes/dashboard-top-nav-bar.php");?>
           
            <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
        <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
            <div class="card-body">     
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <!-- Form -->

                        <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">All Districts</h2>
                                        </div>
                                        <!-- <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="border-bottom" scope="col">#</th>
                                            <th class="border-bottom" scope="col">District Names</th>
                                            <th class="border-bottom" scope="col">Region</th>
                                            <th class="border-bottom" scope="col">Date Added</th>
                                            <th class="border-bottom" scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("./config.php");
                                                $sql = "SELECT * FROM districts";
                                                $statement = $conn->prepare($sql);
                                                $results = $statement->execute();
                                                $columns = $statement->fetchAll();
                                                $rows = $statement->rowCount();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id'];                                                        $districtname = $column['district'];
                                                        $regionname = $column['regionname'];
                                                        $createdat = $column['createdat'];

                                                        echo "
                                                        <tr>
                                                            <td>{$id}</td>
                                                            <td>{$districtname}</td>
                                                            <td>{$regionname}</td>
                                                            <td>{$createdat}</td>
                                                            <td>
                                                            <a href='edit-districts.php?id={$id}' role='button' class='btn btn-primary'>Edit</a>
                                                            <a href='delete-districts.php?id={$id}' role='button' class='btn btn-danger'>Delete</a>
                                                            </td>
                                                        </tr>
                                                        ";
                                                    }
                                                } else{
                                                    $_SESSION['message'] = "Something Went Wrong";
                                                    $_SESSION['alert'] = "alert alert-warning";
                                                }
                                            
                                            
                                            ;?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>