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
                                            <h2 class="fs-5 fw-bold mb-0">All Hospitals</h2>
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
                                            <th class="border-bottom" scope="col">Hospital ID</th>
                                            <th class="border-bottom" scope="col">Hospital Names</th>
                                            <th class="border-bottom" scope="col">Address</th>
                                            <th class="border-bottom" scope="col">District</th>
                                            <th class="border-bottom" scope="col">Region</th>
                                            <th class="border-bottom" scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("./config.php");
                                                $sql = "SELECT * FROM hospitals";
                                                $statement = $conn->prepare($sql);
                                                $results = $statement->execute();
                                                $columns = $statement->fetchAll();
                                                $rows = $statement->rowCount();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id']; 
                                                        $hospital_id = $column['hospital_id'];
                                                       $hospitalname = $column['hospitalname'];
                                                       $locationaddress	= $column['locationaddress'];
                                                       $region_id = $column['region_id'];
                                                       $district_id = $column['district_id'];

                                                        echo "
                                                        <tr>
                                                            <td>{$id}</td>
                                                            <td>{$hospital_id}</td>
                                                            <td>{$hospitalname}</td>
                                                            <td>{$locationaddress}</td>
                                                            <td>{$district_id}</td>
                                                            <td>{$region_id}</td>
                                                           
                                                            <td>
                                                            <a href='edit-districts.php?id={$id}' role='button' class='btn btn-primary'>Edit</a>
                                                            <a href='delete-hospital.php?id={$id}' role='button' class='btn btn-danger'>Delete</a>
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