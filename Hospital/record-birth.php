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

                        <?php
                        
                        require_once("./config.php");
                        require_once("./auxiliaries.php");

                        if(isset($_POST['submit'])){
                            $nameofhospital = sterilize($_POST['nameofhospital']);
                            $nameofmother = sterilize($_POST['nameofmother']);
                            $nameoffather = sterilize($_POST['nameoffather']);
                            $nameofbaby = sterilize($_POST['nameofbaby']);
                            $dateofbirth = sterilize($_POST['dateofbirth']);
                            $gender = sterilize($_POST['gender']);
                            $contactofparents = sterilize($_POST['contactofparents']);
                            $addressofparents = sterilize($_POST['addressofparents']);
                            $placeofbirth = sterilize($_POST['placeofbirth']);

                            if(!empty($nameofhospital) && !empty($nameofmother) && !empty($nameoffather) && !empty($nameofbaby) && !empty($dateofbirth) && !empty($gender) && !empty($contactofparents) 
                            && !empty($addressofparents) && !empty($placeofbirth)) {
                                //check if data already exist
                                $slq = "SELECT * FROM birth WHERE nameofhospital = '$nameofhospital' AND nameofmother = '$nameofmother' AND
                                nameoffather = '$nameoffather' AND nameofbaby = '$nameofbaby' AND dateofbirth = '$dateofbirth' AND gender = '$gender'";
                                $statement = $conn->prepare($slq);
                                $results = $statement->execute();
                                $rows = $statement->rowCount();

                                if($rows > 0){
                                    $_SESSION['message'] = "Child Data Already Exist!!";
                                    $_SESSION['alert'] = "alert alert-danger";
                                } else{
                                    $insertInfo = "INSERT INTO birth(nameofhospital, nameofmother, nameoffather, nameofbaby, dateofbirth, gender, contactofparents, addressofparents, placeofbirth) 
                                    VALUES('$nameofhospital', '$nameofmother', '$nameoffather', '$nameofbaby', '$dateofbirth', '$gender', '$contactofparents', '$addressofparents', '$placeofbirth')";
                                    $statement = $conn->prepare($insertInfo);
                                    $results = $statement->execute();
                                    $rows = $statement->rowCount();

                                    if($results){
                                        $_SESSION['message'] = "New Birth Data Inserted!!";
                                        $_SESSION['alert'] = "alert alert-success";
                                        header("location: dashboard.php");
                                    } else{
                                        $_SESSION['message'] = "Oops Something Went Wrong!!";
                                        $_SESSION['alert'] = "alert alert-danger";
                                    }

                                }
                            } else{
                                $_SESSION['message'] = "All Fields Are Required!!";
                                $_SESSION['alert'] = "alert alert-danger";
                            }
                        }

                        
                        ;?>
                        
                        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Hospital</label>
                            <input name="nameofhospital" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Name of Mother</label>
                            <input name="nameofmother" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Name of Father</label>
                            <input name="nameoffather" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Name of Baby</label>
                            <input name="nameofbaby" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Date of Birth</label>
                            <input name="dateofbirth" class="form-control" id="validationServer02" type="date" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Gender</label>
                            <input name="gender" class="form-control"   id="validationServer01" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Contact Number of Parents</label>
                            <input name="contactofparents" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Address of Parents</label>
                            <input name="addressofparents" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Place of Birth</label>
                            <input name="placeofbirth" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                         
                        
                          <div class="col-12">
                            <input name="submit" value="Submit" class="btn btn-primary" type="submit" role="button">
                          </div>
                        </form>
                      </div>
                    </div>




                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>