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
                                            <h2 class="fs-5 fw-bold mb-0">Most Recent Birth</h2>
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
                                            <th class="border-bottom" scope="col">Fullname</th>
                                            <th class="border-bottom" scope="col">Date of Birth</th>
                                            <th class="border-bottom" scope="col">Parents Name</th>
                                            <th class="border-bottom" scope="col">Parents Address</th>
                                            <th class="border-bottom" scope="col">Parents Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                require_once("././config.php");

                                                $sqlSelectMostRecentBirth = "SELECT * FROM birth";
                                                $statement = $conn->prepare($sqlSelectMostRecentBirth);
                                                $results = $statement->execute();
                                                $rows = $statement->rowCount();
                                                $columns = $statement->fetchAll();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id'];
                                                        $nameofbaby = $column['nameofbaby'];
                                                        $nameofmother = $column['nameofmother'];
                                                        $dateofbirth = $column['dateofbirth'];
                                                        $nameoffather = $column['nameoffather'];
                                                        $addressofparents = $column['addressofparents'];
                                                        $contactofparents = $column['contactofparents'];

                                                        echo "
                                                        <tr>
                                                        <th class='text-gray-900' scope='row'>
                                                            {$id}
                                                        </th>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$nameofbaby}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$dateofbirth}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                          Mr. & Mrs. {$nameoffather} {$nameofmother}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$addressofparents}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$contactofparents}
                                                        </td>
                                                      
                                                        </tr>
                                                        ";

                                                    }
                                                } else{ 
                                                    $_SESSION['message'] = "Oooops Something went wrong!!";
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