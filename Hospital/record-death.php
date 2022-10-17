<?php 
session_start();
ob_start();
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
                            $nameofinformant = sterilize($_POST['nameofinformant']);
                            $nameofdeased = sterilize($_POST['nameofdeased']);
                            $dateofdeath = sterilize($_POST['dateofdeath']);
                            $gender = sterilize($_POST['gender']);
                            $contactofinformant = sterilize($_POST['contactofinformant']);
                            $placeofdeath = sterilize($_POST['placeofdeath']);
                            $ageofdeseased = sterilize($_POST['ageofdeseased']);
                            $causeofdeath = sterilize($_POST['causeofdeath']);

                            if(!empty($nameofhospital) && !empty($nameofdeased) && !empty($nameofinformant) && !empty($dateofdeath) 
                            && !empty($gender) && !empty($contactofinformant) && !empty($placeofdeath) && 
                            !empty($ageofdeseased) && !empty($causeofdeath)){
                                //check if deseased data already exist
                                $slqCheckIfDataExist = "SELECT * FROM death WHERE nameofhospital = '$nameofhospital'  AND nameofdeased = '$nameofdeased' AND dateofdeath = '$dateofdeath'";
                                $statement = $conn->prepare($slqCheckIfDataExist);
                                $results = $statement->execute();
                                $rows = $statement->rowCount();

                                if($rows > 0){
                                    $_SESSION['message'] = "Deseased Data Already Exist!!";
                                    $_SESSION['alert'] = "alert alert-danger";
                                } else{
                                    //insert new data into the database
                                    $sqlInsert = "INSERT INTO death(nameofhospital, nameofinformant, nameofdeased, dateofdeath, gender, contactofinformant,
                                      placeofdeath, ageofdeseased, causeofdeath) VALUES(:nameofhospital, :nameofinformant, :nameofdeased, :dateofdeath, :gender, :contactofinformant,
                                      :placeofdeath, :ageofdeseased, :causeofdeath)";
                                    $statement = $conn->prepare($sqlInsert);
                                    $results = $statement->execute(array(
                                        ':nameofhospital' => $nameofhospital,
                                        ':nameofinformant' => $nameofinformant,
                                        ':nameofdeased' => $nameofdeased, 
                                        ':dateofdeath' => $dateofdeath,
                                        ':gender'  => $gender,
                                        ':contactofinformant' => $contactofinformant,
                                        ':placeofdeath' => $placeofdeath, 
                                       ':ageofdeseased' => $ageofdeseased, 
                                       ':causeofdeath'  => $causeofdeath
                                    ));
                                    $rows = $statement->rowCount();

                                    if($results){
                                        $_SESSION['message'] = "Deseased Data Inserted Successfully!!";
                                        $_SESSION['alert'] = "alert alert-success";
                                        header("location: dashboard.php");
                                        ob_end_flush();
                                    } else{
                                        $_SESSION['message'] = "Oooopss!! Something went wrong!!";
                                        $_SESSION['alert'] = "alert alert-warning";
                                    }
                                }
                            } else{
                                $_SESSION['message'] = "Oooopss!! Something went wrong!!";
                                $_SESSION['alert'] = "alert alert-warning";
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
                            <label class="form-label" for="validationServer02">Name of Deased</label>
                            <input name="nameofdeased" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Name of Informant</label>
                            <input name="nameofinformant" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Date of Death</label>
                            <input name="dateofdeath" class="form-control" id="validationServer02" type="date" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer01">Gender</label>
                            <input name="gender" class="form-control"   id="validationServer01" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Contact Number of Informant</label>
                            <input name="contactofinformant" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Place of Death</label>
                            <input name="placeofdeath" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Age of the Dead</label>
                            <input name="ageofdeseased" class="form-control" id="validationServer02" type="number" required="">
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="validationServer02">Cause of Death</label>
                            <input type="text" name="causeofdeath" class="form-control" id="validationServer02" required="">
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